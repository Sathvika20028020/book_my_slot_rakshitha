<?php

namespace App\Http\Controllers\ConventionCenter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ConventionController extends Controller
{
    /**
     * Display only the logged-in user's convention centres.
     */
    public function index(Request $request)
    {
        $user = Auth::guard('convention')->user();
        abort_if(!$user, 401);

        $facilitySummary = DB::table('convention_facilities')
            ->select(
                'convention_center_login_id',
                DB::raw('COUNT(*) as facilities_count'),
                DB::raw('COALESCE(MAX(seating_capacity), 0) as max_capacity')
            )
            ->groupBy('convention_center_login_id');

        $query = DB::table('convention_center_logins')
            ->leftJoinSub($facilitySummary, 'facility_summary', function ($join) {
                $join->on(
                    'convention_center_logins.id',
                    '=',
                    'facility_summary.convention_center_login_id'
                );
            })
            ->select(
                'convention_center_logins.*',
                DB::raw('COALESCE(facility_summary.facilities_count, 0) as facilities_count'),
                DB::raw('COALESCE(facility_summary.max_capacity, 0) as max_capacity')
            )
            ->where('convention_center_logins.convention_user_id', $user->id);

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('convention_center_logins.venue_id', 'like', "%{$search}%")
                    ->orWhere('convention_center_logins.convention_name', 'like', "%{$search}%")
                    ->orWhere('convention_center_logins.address', 'like', "%{$search}%")
                    ->orWhere('convention_center_logins.phone', 'like', "%{$search}%")
                    ->orWhere('convention_center_logins.email', 'like', "%{$search}%");
            });
        }

        if ($request->filled('type')) {
            $query->where('convention_center_logins.centre_type', $request->type);
        }

        if ($request->filled('status')) {
            $query->whereRaw(
                'LOWER(convention_center_logins.status) = ?',
                [strtolower($request->status)]
            );
        }

        $conventions = $query
            ->orderByDesc('convention_center_logins.id')
            ->paginate(15)
            ->withQueryString();

        return view('conventions.venues.index', compact('conventions'));
    }

    /**
     * Show create form.
     */
    public function create()
    {
        $user = Auth::guard('convention')->user();
        abort_if(!$user, 401);

        return view('conventions.venues.create', compact('user'));
    }

    /**
     * Store a new convention centre for the logged-in user.
     */
    public function store(Request $request)
    {
        $user = Auth::guard('convention')->user();
        abort_if(!$user, 401);

        $request->validate([
            'convention_name' => 'required|string|min:3|max:255',
            'centre_type' => 'required|string|max:255',
            'status' => 'required|in:Active,Inactive',

            'address' => 'required|string|min:5',
            'pincode' => 'required|digits:6',

            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',

            'incharge_name' => 'required|string|max:255',
            'phone' => 'required|digits:10|unique:convention_center_logins,phone',
            'email' => 'required|email|unique:convention_center_logins,email',

            'convention_images' => 'nullable|array',
            'convention_images.*' => 'image|mimes:jpg,jpeg,png,webp|max:10240',

            'video_url' => 'nullable|url',
            'convention_video_file' => 'nullable|file|mimes:mp4,webm|max:51200',

            'policy_document' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:10240',

            'facilities' => 'required|array|min:1',
            'facilities.*.name' => 'required|string|max:255',
            'facilities.*.type' => 'required|string|max:255',
            'facilities.*.capacity' => 'required|integer|min:1',
            'facilities.*.area' => 'nullable|numeric|min:0',
            'facilities.*.status' => 'required|string|max:255',
        ]);

        DB::beginTransaction();

        try {
            // Upload convention image
            $imagePath = null;

            if ($request->hasFile('convention_images')) {
                $imagePath = $request->file('convention_images')[0]
                    ->store('convention-centres/images', 'public');
            }

            // Upload video or store video URL
            $videoPath = $request->video_url;

            if ($request->hasFile('convention_video_file')) {
                $videoPath = $request->file('convention_video_file')
                    ->store('convention-centres/videos', 'public');
            }

            // Upload NOC / supporting document
            $documentPath = null;

            if ($request->hasFile('policy_document')) {
                $documentPath = $request->file('policy_document')
                    ->store('convention-centres/documents', 'public');
            }

            // Save convention centre with logged-in user's ID
            $conventionId = DB::table('convention_center_logins')
                ->insertGetId([
                    'convention_user_id' => $user->id,

                    'incharge_name' => $request->incharge_name,
                    'convention_name' => $request->convention_name,
                    'convention_image' => $imagePath,
                    'convention_video' => $videoPath,
                    'centre_type' => $request->centre_type,
                    'pincode' => $request->pincode,
                    'address' => $request->address,
                    'latitude' => $request->latitude,
                    'longitude' => $request->longitude,
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'password' => null,
                    'status' => $request->status,
                    'noc_document' => $documentPath,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

            // Generate unique Convention Centre ID
            $venueId = 'CC-' . date('Y') . '-' .
                str_pad($conventionId, 4, '0', STR_PAD_LEFT);

            DB::table('convention_center_logins')
                ->where('id', $conventionId)
                ->where('convention_user_id', $user->id)
                ->update([
                    'venue_id' => $venueId
                ]);

            // Save multiple facilities
            foreach ($request->facilities as $facility) {
                DB::table('convention_facilities')->insert([
                    'convention_center_login_id' => $conventionId,
                    'facility_name' => $facility['name'],
                    'type' => $facility['type'],
                    'seating_capacity' => $facility['capacity'],
                    'area' => $facility['area'] ?? null,
                    'available_status' => $facility['status'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            DB::commit();

            return redirect()
                ->route('admin.convention-centres.index')
                ->with('success', 'Convention Centre created successfully!');

        } catch (\Throwable $e) {
            DB::rollBack();

            report($e);

            return back()
                ->withInput()
                ->with('error', 'Unable to save convention centre. Please try again.');
        }
    }

    /**
     * Edit only the logged-in user's convention centre.
     */
    public function edit($id)
    {
        $user = Auth::guard('convention')->user();
        abort_if(!$user, 401);

        $convention = DB::table('convention_center_logins')
            ->where('id', $id)
            ->where('convention_user_id', $user->id)
            ->first();

        abort_if(!$convention, 404);

        $facilities = DB::table('convention_facilities')
            ->where('convention_center_login_id', $convention->id)
            ->get();

        return view(
            'conventions.venues.edit',
            compact('convention', 'facilities')
        );
    }

    /**
     * Update only the logged-in user's convention centre.
     */
    public function update(Request $request, $id)
    {
        $user = Auth::guard('convention')->user();
        abort_if(!$user, 401);

        $convention = DB::table('convention_center_logins')
            ->where('id', $id)
            ->where('convention_user_id', $user->id)
            ->first();

        abort_if(!$convention, 404);

        $request->validate([
            'convention_name' => 'required|string|min:3|max:255',
            'centre_type' => 'required|string|max:255',
            'status' => 'required|in:Active,Inactive',

            'address' => 'required|string|min:5',
            'pincode' => 'required|digits:6',

            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',

            'incharge_name' => 'required|string|max:255',

            'phone' => [
                'required',
                'digits:10',
                Rule::unique('convention_center_logins', 'phone')->ignore($id),
            ],

            'email' => [
                'required',
                'email',
                Rule::unique('convention_center_logins', 'email')->ignore($id),
            ],

            'convention_images' => 'nullable|array',
            'convention_images.*' => 'image|mimes:jpg,jpeg,png,webp|max:10240',

            'video_url' => 'nullable|url',
            'convention_video_file' => 'nullable|file|mimes:mp4,webm|max:51200',

            'policy_document' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:10240',

            'facilities' => 'required|array|min:1',
            'facilities.*.name' => 'required|string|max:255',
            'facilities.*.type' => 'required|string|max:255',
            'facilities.*.capacity' => 'required|integer|min:1',
            'facilities.*.area' => 'nullable|numeric|min:0',
            'facilities.*.status' => 'required|string|max:255',
        ]);

        DB::beginTransaction();

        try {
            $imagePath = $convention->convention_image;

            if ($request->hasFile('convention_images')) {
                if ($imagePath) {
                    Storage::disk('public')->delete($imagePath);
                }

                $imagePath = $request->file('convention_images')[0]
                    ->store('convention-centres/images', 'public');
            }

            $videoPath = $convention->convention_video;

            if ($request->filled('video_url')) {
                $videoPath = $request->video_url;
            }

            if ($request->hasFile('convention_video_file')) {
                if ($videoPath && !filter_var($videoPath, FILTER_VALIDATE_URL)) {
                    Storage::disk('public')->delete($videoPath);
                }

                $videoPath = $request->file('convention_video_file')
                    ->store('convention-centres/videos', 'public');
            }

            $documentPath = $convention->noc_document;

            if ($request->hasFile('policy_document')) {
                if ($documentPath) {
                    Storage::disk('public')->delete($documentPath);
                }

                $documentPath = $request->file('policy_document')
                    ->store('convention-centres/documents', 'public');
            }

            DB::table('convention_center_logins')
                ->where('id', $id)
                ->where('convention_user_id', $user->id)
                ->update([
                    'incharge_name' => $request->incharge_name,
                    'convention_name' => $request->convention_name,
                    'convention_image' => $imagePath,
                    'convention_video' => $videoPath,
                    'centre_type' => $request->centre_type,
                    'pincode' => $request->pincode,
                    'address' => $request->address,
                    'latitude' => $request->latitude,
                    'longitude' => $request->longitude,
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'status' => $request->status,
                    'noc_document' => $documentPath,
                    'updated_at' => now(),
                ]);

            // Replace existing facilities for this convention only
            DB::table('convention_facilities')
                ->where('convention_center_login_id', $convention->id)
                ->delete();

            foreach ($request->facilities as $facility) {
                DB::table('convention_facilities')->insert([
                    'convention_center_login_id' => $convention->id,
                    'facility_name' => $facility['name'],
                    'type' => $facility['type'],
                    'seating_capacity' => $facility['capacity'],
                    'area' => $facility['area'] ?? null,
                    'available_status' => $facility['status'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            DB::commit();

            return redirect()
                ->route('admin.convention-centres.index')
                ->with('success', 'Convention Centre updated successfully!');

        } catch (\Throwable $e) {
            DB::rollBack();

            report($e);

            return back()
                ->withInput()
                ->with('error', 'Unable to update convention centre.');
        }
    }
}
