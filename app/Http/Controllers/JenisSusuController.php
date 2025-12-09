<?php

namespace App\Http\Controllers;

use App\Models\JenisSusu;
use Illuminate\Http\Request;

class JenisSusuController extends Controller
{
    public function index(Request $request)
    {
        $query = JenisSusu::query();

        if ($request->has('search')) {
            $query->where('nama_jenis_susu', 'like', "%{$request->search}%");
        }

        $jenis_susus = $query->latest()->get();
        return view('admin.jenis_susu.index', compact('jenis_susus'));
    }

    public function create()
    {
        return view('admin.jenis_susu.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_jenis_susu' => 'required|string|max:255|unique:jenis_susus,nama_jenis_susu',
            'stok'            => 'required|integer|min:0',
        ]);

        JenisSusu::create($request->all());

        return redirect()->route('admin.jenis_susu.index')
            ->with('success', 'Jenis susu berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $jenisSusu = JenisSusu::findOrFail($id);
        return view('admin.jenis_susu.edit', compact('jenisSusu'));
    }

    public function update(Request $request, $id)
    {
        $jenisSusu = JenisSusu::findOrFail($id);

        $request->validate([
            'nama_jenis_susu' => 'required|string|max:255|unique:jenis_susus,nama_jenis_susu,' . $id,
            'stok'            => 'required|integer|min:0',
        ]);

        $jenisSusu->update($request->all());

        return redirect()->route('admin.jenis_susu.index')
            ->with('success', 'Jenis susu berhasil diperbarui.');
    }

    public function destroy($id)
    {
        JenisSusu::findOrFail($id)->delete();
        return redirect()->route('admin.jenis_susu.index')
            ->with('success', 'Jenis susu berhasil dihapus.');
    }
}
