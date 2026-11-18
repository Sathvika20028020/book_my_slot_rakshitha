<?php

namespace App\Http\Controllers\User\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
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


     public function login()
    {
        if (Auth::guard('user')->check()) {
            return redirect()->route('user.dashboard');
        }

        return view('user.auth.login');
    }

    public function handleLogin(Request $request)
    {
      
        $validated = $request->validate([
            'phone' => 'required|phone',
            'password' => 'required|string',
        ]);

        $credentials = [
            'phone' => $validated['phone'],
            'password' => $validated['password'],
            'status' => 'active',
        ];

        if (!Auth::guard('user')->attempt($credentials)) {
            return back()
                ->withErrors([
                    'phone' => 'Invalid phone or password, or your account is inactive.',
                ])
                ->onlyInput('phone');
        }

        $request->session()->regenerate();

        return redirect()->intended(route('user.dashboard'));
    }

    public function logout(Request $request)
    {
        Auth::guard('user')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('user.login')
            ->with('success', 'You have logged out successfully.');
    }
}
