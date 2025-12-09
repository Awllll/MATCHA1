<?php

namespace App\Http\Controllers;

use App\Models\EsBatu;
use Illuminate\Http\Request;

class EsBatuController extends Controller
{
    public function index(Request $request)
    {
        $query = EsBatu::query();

        if ($request->has('search')) {
            $query->where('nama_es', 'like', "%{$request->search}%");
        }

        $es_batus = $query->latest()->get();
        return view('admin.es_batu.index', compact('es_batus'));
    }

    public function create()
    {
        return view('admin.es_batu.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_es' => 'required|string|max:255|unique:es_batus,nama_es',
        ]);

        EsBatu::create($request->all());

        return redirect()->route('admin.es_batu.index')
            ->with('success', 'Level es batu berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $esBatu = EsBatu::findOrFail($id);
        return view('admin.es_batu.edit', compact('esBatu'));
    }

    public function update(Request $request, $id)
    {
        $esBatu = EsBatu::findOrFail($id);

        $request->validate([
            'nama_es' => 'required|string|max:255|unique:es_batus,nama_es,' . $id,
        ]);

        $esBatu->update($request->all());

        return redirect()->route('admin.es_batu.index')
            ->with('success', 'Level es batu berhasil diperbarui.');
    }

    public function destroy($id)
    {
        EsBatu::findOrFail($id)->delete();
        return redirect()->route('admin.es_batu.index')
            ->with('success', 'Level es batu berhasil dihapus.');
    }
}
