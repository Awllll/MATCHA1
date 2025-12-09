<?php

namespace App\Http\Controllers;

use App\Models\TingkatKemanisan;
use Illuminate\Http\Request;

class TingkatKemanisanController extends Controller
{
    public function index(Request $request)
    {
        $query = TingkatKemanisan::query();

        if ($request->has('search')) {
            $query->where('nama_tingkat', 'like', "%{$request->search}%");
        }

        $tingkat_kemanisans = $query->latest()->get();
        return view('admin.tingkat_kemanisan.index', compact('tingkat_kemanisans'));
    }

    public function create()
    {
        return view('admin.tingkat_kemanisan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_tingkat' => 'required|string|max:255|unique:tingkat_kemanisans,nama_tingkat',
        ]);

        TingkatKemanisan::create($request->all());

        return redirect()->route('admin.tingkat_kemanisan.index')
            ->with('success', 'Tingkat kemanisan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $tingkatKemanisan = TingkatKemanisan::findOrFail($id);
        return view('admin.tingkat_kemanisan.edit', compact('tingkatKemanisan'));
    }

    public function update(Request $request, $id)
    {
        $tingkatKemanisan = TingkatKemanisan::findOrFail($id);

        $request->validate([
            'nama_tingkat' => 'required|string|max:255|unique:tingkat_kemanisans,nama_tingkat,' . $id,
        ]);

        $tingkatKemanisan->update($request->all());

        return redirect()->route('admin.tingkat_kemanisan.index')
            ->with('success', 'Tingkat kemanisan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        TingkatKemanisan::findOrFail($id)->delete();
        return redirect()->route('admin.tingkat_kemanisan.index')
            ->with('success', 'Tingkat kemanisan berhasil dihapus.');
    }
}
