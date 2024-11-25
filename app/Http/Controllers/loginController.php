<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function auth(Request $request)
    {
        $cred = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($cred)) {
            $request->session()->regenerate();

            if (Auth::user()->level === 'admin') {
                return redirect()->intended('admin-dashboard');
            } else {
                return redirect()->intended('/');
            }
        }

        return back()->withErrors([
            'username' => 'Anda Belum Terdaftar!',
        ])->onlyInput('username');
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
