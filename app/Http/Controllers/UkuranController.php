<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ukuran;

class UkuranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ukurans = Ukuran::all();
        return view('admin.ukuran.index', compact('ukurans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.ukuran.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'           => 'required|string|max:255|unique:ukuran,nama',
            'harga_tambahan' => 'required|integer|min:0',
        ]);

        Ukuran::create($request->only('nama', 'harga_tambahan'));

        return redirect()->route('ukuran.index')
                         ->with('success', 'Ukuran berhasil ditambahkan.');
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
    public function edit(Ukuran $ukuran)
    {
        return view('admin.ukuran.edit', compact('ukuran'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ukuran $ukuran)
    {
        $request->validate([
            'nama'           => 'required|string|max:255|unique:ukuran,nama,' . $ukuran->id,
            'harga_tambahan' => 'required|integer|min:0',
        ]);

        $ukuran->update($request->only('nama', 'harga_tambahan'));

        return redirect()->route('ukuran.index')
                         ->with('success', 'Ukuran berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ukuran $ukuran)
    {
        $ukuran->delete();

        return redirect()->route('ukuran.index')
                         ->with('success', 'Ukuran berhasil dihapus.');
    }
}
