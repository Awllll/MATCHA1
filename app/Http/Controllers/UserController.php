<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // Mulai query khusus karyawan
        $query = User::where('role', 'karyawan');

        // FITUR CARI KARYAWAN
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('username', 'like', "%{$search}%");
            });
        }

        $users = $query->get();
        return view('admin.karyawan.index', compact('users'));
    }

    public function create()
    {
        return view('admin.karyawan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'username'   => 'required|string|max:255|unique:users',
            'email'      => 'required|email|unique:users',
            'password'   => 'required|min:6',
            'no_telepon' => 'nullable|string|max:15',
            'status'     => 'required|in:aktif,nonaktif',
        ]);

        User::create([
            'name'       => $request->name,
            'username'   => $request->username,
            'email'      => $request->email,
            'password'   => Hash::make($request->password),
            'role'       => 'karyawan',
            'no_telepon' => $request->no_telepon,
            'status'     => $request->status,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Karyawan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.karyawan.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name'       => 'required|string|max:255',
            'username'   => 'required|string|max:255|unique:users,username,' . $id,
            'email'      => 'required|email|unique:users,email,' . $id,
            'no_telepon' => 'nullable|string|max:15',
            'status'     => 'required|in:aktif,nonaktif',
        ]);

        $user->name       = $request->name;
        $user->username   = $request->username;
        $user->email      = $request->email;
        $user->no_telepon = $request->no_telepon;
        $user->status     = $request->status;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'Data karyawan diperbarui.');
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('admin.users.index')->with('success', 'Karyawan dihapus.');
    }
}
