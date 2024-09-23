<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function handleLogin(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        // $credentials = $request->only('email', 'password');
        $isLogin = Auth::attempt(['email' => $data['email'], 'password' => $data['password']]);
        if (!$isLogin) {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }
        // $request->session()->regenerate();
        // return redirect()->route('site.index');

        if (Auth::user()->role == 'admin' || Auth::user()->role == 'owner') {
            return redirect()->route('admin.home');
        } else {
             return redirect()->route('site.index');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
