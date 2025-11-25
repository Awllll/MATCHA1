<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TingkatKemanisan;

class TingkatKemanisanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tingkats = TingkatKemanisan::all();
        return view('admin.tingkatkemanisan.index', compact('tingkats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tingkatkemanisan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255|unique:tingkat_kemanisan,nama',
        ]);

        TingkatKemanisan::create($request->only('nama'));

        return redirect()->route('tingkatkemanisan.index')
                         ->with('success', 'Tingkat kemanisan berhasil ditambahkan.');
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
    public function edit(TingkatKemanisan $tingkatkemanisan)
    {
        return view('admin.tingkatkemanisan.edit', compact('tingkatkemanisan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TingkatKemanisan $tingkatkemanisan)
    {
        $request->validate([
            'nama' => 'required|string|max:255|unique:tingkat_kemanisan,nama,' . $tingkatkemanisan->id,
        ]);

        $tingkatkemanisan->update($request->only('nama'));

        return redirect()->route('tingkatkemanisan.index')
                         ->with('success', 'Tingkat kemanisan berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TingkatKemanisan $tingkatkemanisan)
    {
        // $tingkat_kemanisan = TingkatKemanisan::findOrFail($id);
        $tingkatkemanisan->delete();

        return redirect()->route('tingkatkemanisan.index')
                         ->with('success', 'Tingkat kemanisan berhasil dihapus.');
    }
}
