<?php

namespace App\Http\Controllers;

use App\Models\Ukuran;
use Illuminate\Http\Request;

class UkuranController extends Controller
{
    public function index(Request $request)
    {
        $query = Ukuran::query();

        if ($request->has('search')) {
            $query->where('nama_ukuran', 'like', "%{$request->search}%");
        }

        $ukurans = $query->latest()->get();
        return view('admin.ukuran.index', compact('ukurans'));
    }

    public function create()
    {
        return view('admin.ukuran.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_ukuran'    => 'required|string|max:255|unique:ukurans,nama_ukuran',
            'harga_tambahan' => 'required|numeric|min:0',
            'stok'           => 'required|integer|min:0',
        ]);

        Ukuran::create($request->all());

        return redirect()->route('admin.ukuran.index')
            ->with('success', 'Ukuran berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $ukuran = Ukuran::findOrFail($id);
        return view('admin.ukuran.edit', compact('ukuran'));
    }

    public function update(Request $request, $id)
    {
        $ukuran = Ukuran::findOrFail($id);

        $request->validate([
            'nama_ukuran'    => 'required|string|max:255|unique:ukurans,nama_ukuran,' . $id,
            'harga_tambahan' => 'required|numeric|min:0',
            'stok'           => 'required|integer|min:0',
        ]);

        $ukuran->update($request->all());

        return redirect()->route('admin.ukuran.index')
            ->with('success', 'Ukuran berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Ukuran::findOrFail($id)->delete();
        return redirect()->route('admin.ukuran.index')
            ->with('success', 'Ukuran berhasil dihapus.');
    }
}
