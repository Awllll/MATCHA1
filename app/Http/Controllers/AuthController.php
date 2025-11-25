<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
     public function loginAdmin()
    {
        return view('auth.login-admin');
    }

    public function loginKaryawan()
    {
        return view('auth.login-karyawan');
    }

     public function loginProcess(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {

            $user = Auth::user();

            if ($user->role === 'owner') {
                return redirect()->route('admin.dashboard');
            }

            if ($user->role === 'karyawan') {
                return redirect()->route('karyawan.dashboard');
            }

            Auth::logout();
            return back()->with('error', 'Role tidak valid');
        }

        return back()->with('error', 'Email atau password salah');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
