<?php

namespace App\Http\Controllers\ConventionCenter\auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(){
              return view('conventions.auth.login');
    }

     public function handleLogin(Request $request)
    {
  
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = [
            'email' => $validated['email'],
            'password' => $validated['password'],
            'status' => 'active',
        ];

        if (!Auth::guard('convention')->attempt($credentials)) {
            return back()
                ->withErrors([
                    'email' => 'Invalid email or password, or your account is inactive.',
                ])
                ->onlyInput('email');
        }
               
        $request->session()->regenerate();  

        return redirect()->intended(route('conventions.dashboard'));
    }

    public function logout(Request $request)
    {
        Auth::guard('conventions')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('superadmin.login')
            ->with('success', 'You have logged out successfully.');
    }
}
