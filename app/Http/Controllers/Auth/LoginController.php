<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|string|min:8',
    ]);

    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        if (Auth::user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('user.dashboard');
        }
    }

    // Redirect back with error
    return back()->withErrors(['error' => 'Invalid email or password.']);
}


    public function logout(Request $request)
    {
        Auth::logout();  // Logout user
        
        // Invalidate session dan regenerate token untuk keamanan tambahan
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');  // Redirect ke halaman login setelah logout
    }
}
