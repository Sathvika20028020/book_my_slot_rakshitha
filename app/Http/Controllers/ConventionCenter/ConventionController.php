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

    $login = DB::table('convention_center_logins')
        ->where('id', $user->id)
        ->first();

    abort_if(!$login, 404);

    // Prevent duplicate centre detail submissions for the same login.
    $alreadyExists = DB::table('convention_center_details')
        ->where('convention_user_id', (string) $login->id)
        ->exists();

    if ($alreadyExists) {
        return back()
            ->withInput()
            ->with('error', 'Centre details have already been submitted.');
    }

    $validated = $request->validate([

        // Centre details
        'name' => 'required|string|min:3|max:255',
        'type' => 'required|string|max:255',
        'address' => 'required|string|min:5',
        'pin_code' => 'required|digits:6',
        'latitude' => 'nullable|numeric',
        'longitude' => 'nullable|numeric',

        'contact_name' => 'required|string|max:255',
        'contact_mobile' => 'required|digits:10',
        'contact_email' => 'required|email|max:255',

        // Halls
        'halls' => 'required|array|min:1|max:30',
        'halls.*.name' => 'required|string|max:255',

        // Hall-wise gallery
        'halls.*.gallery_images' => 'nullable|array',
        'halls.*.gallery_images.*' =>
            'image|mimes:jpg,jpeg,png,webp|max:10240',

        // Hall-wise video
        'halls.*.video_url' => 'nullable|url',
        'halls.*.video_file' =>
            'nullable|file|mimes:mp4,webm|max:51200',

        // Hall-wise charges
        'halls.*.booking_fee' => 'required|numeric|min:0',
        'halls.*.security_deposit' => 'required|numeric|min:0',
        'halls.*.additional_charges' => 'required|numeric|min:0',
        'halls.*.gst_percentage' => 'required|in:0,5,12,18',

        // Facilities
        'facilities' => 'required|array|min:1',
        'facilities.*.hall_index' => 'required|integer|min:0',
        'facilities.*.name' => 'required|string|max:255',
        'facilities.*.type' => 'required|string|max:255',
        'facilities.*.capacity' => 'required|integer|min:1',
        'facilities.*.area' => 'nullable|numeric|min:0',
        'facilities.*.status' => 'required|string|max:255',

        // Booking policy
        'min_advance_days' => 'required|integer|min:1',
        'max_booking_duration' =>
            'required|in:1 Day,2 Days,3 Days,5 Days,7 Days',
        'cancellation_rules' => 'required|string',

        // Supporting document
        'policy_document' =>
            'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:10240',
    ]);

    // Summernote can submit HTML that looks non-empty but contains no text.
    if (trim(strip_tags($request->input('cancellation_rules', ''))) === '') {
        return back()
            ->withInput()
            ->withErrors([
                'cancellation_rules' => 'Please enter the cancellation rules and refund policy.'
            ]);
    }

    // Ensure every facility is assigned to a submitted hall.
    $hallIndexes = array_map('intval', array_keys($validated['halls']));

    foreach ($validated['facilities'] as $facility) {
        if (!in_array((int) $facility['hall_index'], $hallIndexes, true)) {
            return back()
                ->withInput()
                ->withErrors([
                    'facilities' => 'A facility is assigned to an invalid hall.'
                ]);
        }
    }

    DB::beginTransaction();

    $uploadedFiles = [];

    try {

        /*
        |--------------------------------------------------------------------------
        | 1. Generate / reuse venue ID from existing login
        |--------------------------------------------------------------------------
        */

        $venueId = $login->venue_id;

        if (!$venueId) {
            $venueId = 'CC-' . date('Y') . '-' .
                str_pad($login->id, 4, '0', STR_PAD_LEFT);

            DB::table('convention_center_logins')
                ->where('id', $login->id)
                ->update([
                    'venue_id' => $venueId,
                    'updated_at' => now(),
                ]);
        }

        /*
        |--------------------------------------------------------------------------
        | 2. Save NOC / Supporting Document
        |--------------------------------------------------------------------------
        */

        $documentPath = null;

        if ($request->hasFile('policy_document')) {
            $documentPath = $request->file('policy_document')
                ->store('convention-centres/documents', 'public');

            $uploadedFiles[] = $documentPath;
        }

        /*
        |--------------------------------------------------------------------------
        | 3. Create each hall, its media and its charges
        |--------------------------------------------------------------------------
        */

        $hallIds = [];

        // These are the first available items for the centre summary columns.
        $centreImagePath = null;
        $centreVideoPath = null;

        foreach ($validated['halls'] as $hallIndex => $hallData) {

            $hallId = DB::table('convention_halls')->insertGetId([
                'convention_center_login_id' => $login->id,
                'venue_id' => $venueId,
                'hall_name' => $hallData['name'],
                'sort_order' => (int) $hallIndex + 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Keep the mapping from Blade hall index to database hall ID.
            $hallIds[$hallIndex] = $hallId;

            /*
            |--------------------------------------------------------------------------
            | 3A. Save all images for this hall
            |--------------------------------------------------------------------------
            */

            $images = $request->file(
                "halls.{$hallIndex}.gallery_images",
                []
            );

            foreach ($images as $image) {

                $imagePath = $image->store(
                    'convention-centres/halls/images',
                    'public'
                );

                $uploadedFiles[] = $imagePath;

                DB::table('convention_hall_media')->insert([
                    'convention_hall_id' => $hallId,
                    'media_type' => 'image',
                    'file_path' => $imagePath,
                    'external_url' => null,
                    'original_name' => $image->getClientOriginalName(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                // Keep the first image as the centre cover image too.
                if (!$centreImagePath) {
                    $centreImagePath = $imagePath;
                }
            }

            /*
            |--------------------------------------------------------------------------
            | 3B. Save hall video file, if uploaded
            |--------------------------------------------------------------------------
            */

            $videoFile = $request->file(
                "halls.{$hallIndex}.video_file"
            );

            if ($videoFile) {

                $videoPath = $videoFile->store(
                    'convention-centres/halls/videos',
                    'public'
                );

                $uploadedFiles[] = $videoPath;

                DB::table('convention_hall_media')->insert([
                    'convention_hall_id' => $hallId,
                    'media_type' => 'video',
                    'file_path' => $videoPath,
                    'external_url' => null,
                    'original_name' => $videoFile->getClientOriginalName(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                if (!$centreVideoPath) {
                    $centreVideoPath = $videoPath;
                }
            }

            /*
            |--------------------------------------------------------------------------
            | 3C. Save hall video URL, if provided
            |--------------------------------------------------------------------------
            */

            $videoUrl = $hallData['video_url'] ?? null;

            if ($videoUrl) {

                DB::table('convention_hall_media')->insert([
                    'convention_hall_id' => $hallId,
                    'media_type' => 'video',
                    'file_path' => null,
                    'external_url' => $videoUrl,
                    'original_name' => null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                if (!$centreVideoPath) {
                    $centreVideoPath = $videoUrl;
                }
            }

            /*
            |--------------------------------------------------------------------------
            | 3D. Save charges for this hall
            |--------------------------------------------------------------------------
            */

            DB::table('convention_hall_charges')->insert([
                'convention_hall_id' => $hallId,
                'booking_fee' => $hallData['booking_fee'],
                'security_deposit' => $hallData['security_deposit'],
                'additional_charges' => $hallData['additional_charges'],
                'gst_percentage' => $hallData['gst_percentage'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | 4. Save overall convention centre details
        |--------------------------------------------------------------------------
        */

        DB::table('convention_center_details')->insert([

            'convention_user_id' => (string) $login->id,
            'venue_id' => $venueId,

            'convention_name' => $request->name,
            'incharge_name' => $request->contact_name,

            // Summary image/video; full hall media is in convention_hall_media.
            'convention_image' => $centreImagePath,
            'convention_video' => $centreVideoPath,

            'centre_type' => $request->type,
            'pincode' => $request->pin_code,
            'address' => $request->address,

            'latitude' => $request->latitude,
            'longitude' => $request->longitude,

            'phone' => $request->contact_mobile,
            'email' => $request->contact_email,

            'status' => $login->status ?: 'Active',
            'noc_document' => $documentPath,

            'created_at' => now(),
            'updated_at' => now(),
        ]);

        /*
        |--------------------------------------------------------------------------
        | 5. Save facilities and link each facility to its hall
        |--------------------------------------------------------------------------
        */

        foreach ($validated['facilities'] as $facility) {

            $hallId = $hallIds[$facility['hall_index']];

            DB::table('convention_facilities')->insert([

                // Existing convention login
                'convention_center_login_id' => $login->id,

                // Specific hall selected in the form
                'hall_id' => $hallId,

                'facility_name' => $facility['name'],
                'type' => $facility['type'],
                'seating_capacity' => $facility['capacity'],
                'area' => $facility['area'] ?? null,
                'available_status' => $facility['status'],

                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | 6. Save centre-level booking policy
        |--------------------------------------------------------------------------
        */

        DB::table('convention_booking_policies')->insert([

            'convention_center_login_id' => $login->id,

            'min_advance_days' => $request->min_advance_days,

            'max_booking_duration' => $request->max_booking_duration,

            'cancellation_rules' => $request->cancellation_rules,

            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::commit();

        return redirect()
            ->route('conventions.venue-lists.index')
            ->with('success', 'Convention centre, halls, facilities, media and charges saved successfully!');

    } catch (\Throwable $e) {

        DB::rollBack();

        if (!empty($uploadedFiles)) {
            Storage::disk('public')->delete($uploadedFiles);
        }

        report($e);

        return back()
            ->withInput()
            ->with('error', 'Unable to save convention centre details. Please try again.');
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
