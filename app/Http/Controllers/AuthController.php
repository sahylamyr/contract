<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authLogin(Request $request)
    {
        $request->validate([
            'email' => ['required', 'min:3', 'string', 'email'],
            'password' => ['required', 'min:3', 'string']
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, true)) {
            $request->session()->regenerate();
            return redirect()->route('admin.home');
        } else {
            return redirect()->back()->with('error', 'Email və ya şifrə yanlışdır!');
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('auth.login');
    }
}
