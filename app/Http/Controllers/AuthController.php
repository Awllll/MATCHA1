<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan Halaman Login
    public function loginAdmin()
    {
        return view('login');
    }

    // PROSES LOGIN UTAMA
    public function loginProcess(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            // CEK JABATAN & ARAHKAN
            if ($user->role === 'admin') {
                return redirect()->intended('admin/dashboard');
            }

            if ($user->role === 'karyawan') {
                return redirect()->intended('karyawan/dashboard');
            }

            // Jika role aneh, tendang keluar
            Auth::logout();
            return back()->withErrors(['username' => 'Akun tidak valid.']);
        }

        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login'); // Kembali ke halaman login umum
    }
}
