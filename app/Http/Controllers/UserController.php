<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */


public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'phone' => 'required|string|max:20|unique:users,phone',
        'email' => 'required|email|max:255|unique:users,email',
        'password' => 'required|string|min:6',
        'city_id' => 'required|string|max:255',
    ]);

    // Generate a unique random registration ID
    do {
        $regId = 'BMS' . random_int(10000000, 99999999);
    } while (User::where('reg_id', $regId)->exists());

    // Create user
    $user = User::create([
        'name'     => $validated['name'],
        'phone'    => $validated['phone'],
        'email'    => $validated['email'],
        'password' => Hash::make($validated['password']),
        'city'     => $validated['city_id'],
        'reg_id'   => $regId,
    ]);

    return redirect()->back()->with(
        'success',
        'Registration completed successfully!'
    );
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => [
                'required',
                'string',
                'max:20',
                Rule::unique('users', 'phone')->ignore($user->id),
            ],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
            'password' => 'nullable|string|min:8',
            'city' => 'required|string|max:255',
            'reg_id' => [
                'required',
                'string',
                'max:255',
                Rule::unique('users', 'reg_id')->ignore($user->id),
            ],
        ]);

        $user->name = $validated['name'];
        $user->phone = $validated['phone'];
        $user->email = $validated['email'];
        $user->city = $validated['city'];
        $user->reg_id = $validated['reg_id'];

        // Update password only when provided.
        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        return redirect()->back()->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
