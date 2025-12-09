<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Menampilkan daftar kategori.
     */
    public function index(Request $request)
    {
        $query = Kategori::query();

        // Fitur Pencarian
        if ($request->has('search')) {
            $query->where('nama_kategori', 'like', "%{$request->search}%");
        }

        // Ambil data terbaru
        $kategoris = $query->latest()->get();

        return view('admin.kategori.index', compact('kategoris'));
    }

    /**
     * Menampilkan form tambah kategori.
     */
    public function create()
    {
        return view('admin.kategori.create');
    }

    /**
     * Menyimpan data kategori baru.
     */
    public function store(Request $request)
    {
        // Validasi
        $request->validate([
            // Pastikan nama tabel 'kategoris' dan kolom 'nama_kategori' sesuai migrasi
            'nama_kategori' => 'required|string|max:255|unique:kategoris,nama_kategori',
            'deskripsi'     => 'nullable|string',
        ]);

        // Simpan ke Database
        Kategori::create([
            'nama_kategori' => $request->nama_kategori,
            'deskripsi'     => $request->deskripsi,
        ]);

        // Redirect ke route admin
        return redirect()->route('admin.kategori.index')
            ->with('success', 'Kategori berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit kategori.
     */
    public function edit(string $id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('admin.kategori.edit', compact('kategori'));
    }

    /**
     * Update data kategori.
     */
    public function update(Request $request, string $id)
    {
        $kategori = Kategori::findOrFail($id);

        $request->validate([
            // Validasi unique kecuali ID ini sendiri
            'nama_kategori' => 'required|string|max:255|unique:kategoris,nama_kategori,' . $id,
            'deskripsi'     => 'nullable|string',
        ]);

        $kategori->update([
            'nama_kategori' => $request->nama_kategori,
            'deskripsi'     => $request->deskripsi,
        ]);

        return redirect()->route('admin.kategori.index')
            ->with('success', 'Kategori berhasil diperbarui.');
    }

    /**
     * Hapus kategori.
     */
    public function destroy(string $id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return redirect()->route('admin.kategori.index')
            ->with('success', 'Kategori berhasil dihapus.');
    }
}
