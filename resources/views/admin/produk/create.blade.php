@extends('layouts.admin')

@section('content')
    <div class="flex items-center gap-4 mb-6">
        <a href="{{ route('admin.produk.index') }}" class="bg-white border p-2 rounded-lg hover:bg-gray-50"><svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg></a>
        <h2 class="text-2xl font-bold text-gray-800">Tambah Produk Baru</h2>
    </div>

    <div class="bg-white rounded-xl shadow-sm border p-6 max-w-3xl">
        <form action="{{ route('admin.produk.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-sm font-bold mb-2">Nama Produk</label>
                    <input type="text" name="nama" class="w-full border rounded-lg p-2" required>
                </div>
                <div>
                    <label class="block text-sm font-bold mb-2">Kategori</label>
                    <select name="kategori" class="w-full border rounded-lg p-2 bg-white">
                        <option value="Minuman">Minuman</option>
                        <option value="Makanan">Makanan</option>
                        <option value="Topping">Topping</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                <div>
                    <label class="block text-sm font-bold mb-2">Harga (Rp)</label>
                    <input type="number" name="harga" class="w-full border rounded-lg p-2" required>
                </div>
                <div>
                    <label class="block text-sm font-bold mb-2">Stok Awal</label>
                    <input type="number" name="stok" class="w-full border rounded-lg p-2" required>
                </div>
                <div>
                    <label class="block text-sm font-bold mb-2">Status</label>
                    <select name="status" class="w-full border rounded-lg p-2 bg-white">
                        <option value="tersedia">Tersedia</option>
                        <option value="habis">Habis</option>
                    </select>
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-bold mb-2">Deskripsi</label>
                <textarea name="deskripsi" class="w-full border rounded-lg p-2 h-24"></textarea>
            </div>

            <div class="mb-6">
                <label class="block text-sm font-bold mb-2">Upload Gambar</label>
                <input type="file" name="gambar" class="w-full border rounded-lg p-2">
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-green-600 text-white font-bold py-2 px-6 rounded-lg hover:bg-green-700">Simpan Produk</button>
            </div>
        </form>
    </div>
@endsection
