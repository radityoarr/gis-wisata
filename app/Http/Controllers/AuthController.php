<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        // Validasi data login
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('email', 'password');
        Log::info('Login attempt', ['credentials' => $credentials]);

        // Cek kredensial
        if (Auth::attempt($credentials)) {
            Log::info('Login successful', ['user' => Auth::user()]);
            $request->session()->regenerate(); // Regenerasi sesi untuk keamanan
            Log::info('Session regenerated successfully.');
            return redirect()->route('admin.dashboard');
        }

        // Gagal login
        Log::error('Login failed', ['email' => $request->email]);
        return back()->withErrors(['email' => 'Email atau password salah.']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}

