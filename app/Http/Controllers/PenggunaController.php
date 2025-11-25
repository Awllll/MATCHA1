<?php

namespace App\Http\Controllers;


use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengguna = Pengguna::where('role', 'karyawan')->get();
        return view('admin.karyawan.index',compact('pengguna'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.karyawan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'     => 'required|string|max:255',
            'email'    => 'required|email|unique:pengguna,email',
            'password' => 'required|min:6',
        ]);

        Pengguna::create([
            'nama'     => $request->nama,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'karyawan', // otomatis karyawan
        ]);

        return redirect()->route('pengguna.index')
            ->with('success', 'Akun karyawan berhasil ditambahkan.');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pengguna = Pengguna::findOrFail($id);

        return view('admin.karyawan.edit', compact('pengguna'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pengguna = Pengguna::findOrFail($id);

        $request->validate([
            'nama'     => 'required|string|max:255',
            'email'    => 'required|email|unique:pengguna,email,' . $id,
            'password' => 'nullable|min:6',
            'role'     => 'required|string'
        ]);

        $pengguna->nama  = $request->nama;
        $pengguna->email = $request->email;
        $pengguna->role  = $request->role;

        if ($request->password) {
            $pengguna->password = Hash::make($request->password);
        }

        $pengguna->save();

        return redirect()->route('pengguna.index')
            ->with('success', 'Akun karyawan berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pengguna = Pengguna::findOrFail($id);
        $pengguna->delete();

        return redirect()->route('pengguna.index')
            ->with('success', 'Akun karyawan berhasil dihapus.');
    }
}
