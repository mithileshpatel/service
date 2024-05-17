<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('login');
    }

    // Handle the login form submission
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            // Start session for the authenticated user
            $request->session()->regenerate();

            return redirect()->intended('admin'); // Change the redirect path to your admin panel URL
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    // Logout the user
    public function logout(Request $request)
    {
        // Invalidate current session
        $request->session()->invalidate();

        // Logout the user
        Auth::logout();

        return redirect('/login');
    }
}
