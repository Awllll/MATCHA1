<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Menampilkan daftar produk (Admin).
     */
    public function index(Request $request)
    {
        $query = Produk::query();

        // Fitur Pencarian
        if ($request->has('search')) {
            $search = $request->search;
            $query->where('nama', 'like', "%{$search}%")
                  ->orWhere('kategori', 'like', "%{$search}%");
        }

        // Ambil data terbaru
        $produks = $query->latest()->get();

        return view('admin.produk.index', compact('produks'));
    }

    /**
     * Menampilkan form tambah produk.
     */
    public function create()
    {
        // Kita gunakan array statis dulu karena belum ada tabel kategori khusus
        // Nanti jika sudah buat tabel kategori, bisa diganti: Kategori::all();
        $kategoris = ['Minuman', 'Makanan', 'Topping', 'Snack'];

        return view('admin.produk.create', compact('kategoris'));
    }

    /**
     * Menyimpan produk baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'      => 'required|string|max:255',
            'kategori'  => 'required|string', // Sesuai tabel migration sebelumnya
            'harga'     => 'required|numeric|min:0',
            'stok'      => 'required|integer|min:0',
            'status'    => 'required|in:tersedia,habis',
            'deskripsi' => 'nullable|string',
            'gambar'    => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->all();

        // Upload Gambar ke Storage (Lebih aman & standar Laravel)
        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('produk_images', 'public');
            $data['gambar'] = 'storage/' . $path;
        }

        Produk::create($data);

        return redirect()->route('admin.produk.index')
            ->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit produk.
     */
    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        $kategoris = ['Minuman', 'Makanan', 'Topping', 'Snack'];

        return view('admin.produk.edit', compact('produk', 'kategoris'));
    }

    /**
     * Update data produk.
     */
    public function update(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);

        $request->validate([
            'nama'      => 'required|string|max:255',
            'kategori'  => 'required|string',
            'harga'     => 'required|numeric|min:0',
            'stok'      => 'required|integer|min:0',
            'status'    => 'required|in:tersedia,habis',
            'deskripsi' => 'nullable|string',
            'gambar'    => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->all();

        // Cek Gambar Baru
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada (opsional, agar hemat storage)
            if ($produk->gambar) {
                // Konversi path 'storage/...' kembali ke path disk asli untuk dihapus
                $oldPath = str_replace('storage/', '', $produk->gambar);
                Storage::disk('public')->delete($oldPath);
            }

            $path = $request->file('gambar')->store('produk_images', 'public');
            $data['gambar'] = 'storage/' . $path;
        }

        $produk->update($data);

        return redirect()->route('admin.produk.index')
            ->with('success', 'Produk berhasil diperbarui.');
    }

    /**
     * Hapus produk.
     */
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);

        // Hapus file gambar dari penyimpanan
        if ($produk->gambar) {
            $oldPath = str_replace('storage/', '', $produk->gambar);
            Storage::disk('public')->delete($oldPath);
        }

        $produk->delete();

        return redirect()->route('admin.produk.index')
            ->with('success', 'Produk berhasil dihapus.');
    }
}
