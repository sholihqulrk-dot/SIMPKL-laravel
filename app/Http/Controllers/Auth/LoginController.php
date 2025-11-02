<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /**
     * Show the login form
     */
    public function showLoginForm()
    {
        // Redirect to dashboard if already authenticated
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        return view('auth.login');
    }

    /**
     * Handle login request
     */
    public function login(Request $request)
    {
        // Validate the input
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $remember = $request->filled('remember');

        // Attempt to authenticate
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            $user = Auth::user();
            
            // Redirect based on role
            return $this->redirectBasedOnRole($user);
        }

        // If authentication fails
        throw ValidationException::withMessages([
            'email' => ['The provided credentials do not match our records.'],
        ]);
    }

    /**
     * Redirect user based on their role
     */
    protected function redirectBasedOnRole($user)
    {
        $intended = session()->pull('url.intended', route('dashboard'));

        return match($user->role_id) {
            'student' => redirect()->intended($intended)->with('success', 'Welcome back, ' . $user->name . '!'),
            'teacher' => redirect()->intended($intended)->with('success', 'Welcome back, Teacher ' . $user->name . '!'),
            'admin' => redirect()->intended($intended)->with('success', 'Welcome back, Admin ' . $user->name . '!'),
            'companies' => redirect()->intended($intended)->with('success', 'Welcome back, ' . $user->name . '!'),
            default => redirect()->route('dashboard')->with('success', 'Welcome back!'),
        };
    }

    /**
     * Handle logout request
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'You have been logged out successfully.');
    }
}