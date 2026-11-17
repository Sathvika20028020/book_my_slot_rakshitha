<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\ConventionAdmin\ConventionCenterLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Throwable;

class ConventionUserController extends Controller
{
    /**
     * Display all convention centre login credentials.
     */
    public function index()
    {
        $user = ConventionCenterLogin::orderByDesc('id')->get();

        return view('admin.centers.index', compact('user'));
    }

    /**
     * Show the form for creating convention centre credentials.
     */
    public function create()
    {
        return view('admin.centers.create');
    }

    /**
     * Store newly created convention centre credentials.
     * Form field "name" is stored in the existing incharge_name column.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'phone' => [
                'required',
                'digits:10',
                Rule::unique('convention_center_logins', 'phone'),
            ],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('convention_center_logins', 'email'),
            ],
            'password' => ['required', 'string', 'min:6', 'max:255'],
        ]);

        try {
            $user = new ConventionCenterLogin();
            $user->incharge_name = $validated['name'];
            $user->phone = $validated['phone'];
            $user->email = $validated['email'];
            $user->password = Hash::make($validated['password']);

            // The credential is enabled by default. Change this only if your
            // login table uses a different status convention.
            $user->status = 'Active';
            $user->save();

            return redirect()
                ->route('admin.centers.index')
                ->with('success', 'Convention Centre credentials created successfully.');
        } catch (Throwable $e) {
            report($e);

            return back()
                ->withInput($request->except('password'))
                ->with('error', 'Unable to create convention centre credentials. Please check the database fields and try again.');
        }
    }

    /**
     * Display a specific convention centre credential record.
     */
    public function show(string $id)
    {
        $user = ConventionCenterLogin::findOrFail($id);

        return view('admin.centers.show', compact('user'));
    }

    /**
     * Show the edit form for a convention centre credential record.
     */
    public function edit(string $id)
    {
        $user = ConventionCenterLogin::findOrFail($id);

        return view('admin.centers.edit', compact('user'));
    }

    /**
     * Update the convention centre credential record.
     * Password is optional while editing; it is re-hashed only when supplied.
     */
    public function update(Request $request, string $id)
    {
        $user = ConventionCenterLogin::findOrFail($id);

        $validated = $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'phone' => [
                'required',
                'digits:10',
                Rule::unique('convention_center_logins', 'phone')->ignore($user->getKey()),
            ],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('convention_center_logins', 'email')->ignore($user->getKey()),
            ],
            'password' => ['nullable', 'string', 'min:6', 'max:255'],
        ]);

        try {
            $user->incharge_name = $validated['name'];
            $user->phone = $validated['phone'];
            $user->email = $validated['email'];

            if (!empty($validated['password'])) {
                $user->password = Hash::make($validated['password']);
            }

            $user->save();

            return redirect()
                ->route('admin.centers.index')
                ->with('success', 'Convention Centre credentials updated successfully.');
        } catch (Throwable $e) {
            report($e);

            return back()
                ->withInput($request->except('password'))
                ->with('error', 'Unable to update convention centre credentials.');
        }
    }

    /**
     * Delete a convention centre credential record.
     */
    public function destroy(string $id)
    {
        $user = ConventionCenterLogin::findOrFail($id);
        $user->delete();

        return redirect()
            ->route('admin.centers.index')
            ->with('success', 'Convention Centre credentials deleted successfully.');
    }
}
