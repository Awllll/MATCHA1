<?php

namespace App\Http\Controllers;

use App\Models\KepekatanMatcha;
use Illuminate\Http\Request;

class KepekatanMatchaController extends Controller
{
    public function index(Request $request)
    {
        $query = KepekatanMatcha::query();

        if ($request->has('search')) {
            $query->where('nama_kepekatan', 'like', "%{$request->search}%");
        }

        $kepekatans = $query->latest()->get();
        return view('admin.kepekatan.index', compact('kepekatans'));
    }

    public function create()
    {
        return view('admin.kepekatan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kepekatan' => 'required|string|max:255|unique:kepekatan_matchas,nama_kepekatan',
            'stok'           => 'required|integer|min:0',
        ]);

        KepekatanMatcha::create($request->all());

        return redirect()->route('admin.kepekatan.index')
            ->with('success', 'Level kepekatan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $kepekatan = KepekatanMatcha::findOrFail($id);
        return view('admin.kepekatan.edit', compact('kepekatan'));
    }

    public function update(Request $request, $id)
    {
        $kepekatan = KepekatanMatcha::findOrFail($id);

        $request->validate([
            'nama_kepekatan' => 'required|string|max:255|unique:kepekatan_matchas,nama_kepekatan,' . $id,
            'stok'           => 'required|integer|min:0',
        ]);

        $kepekatan->update($request->all());

        return redirect()->route('admin.kepekatan.index')
            ->with('success', 'Level kepekatan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        KepekatanMatcha::findOrFail($id)->delete();
        return redirect()->route('admin.kepekatan.index')
            ->with('success', 'Level kepekatan berhasil dihapus.');
    }
}
