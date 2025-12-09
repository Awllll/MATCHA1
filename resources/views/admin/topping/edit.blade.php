@extends('layouts.admin')

@section('content')
    <div class="flex items-center gap-4 mb-6">
        <a href="{{ route('admin.topping.index') }}" class="bg-white border p-2 rounded-lg hover:bg-gray-50"><svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg></a>
        <h2 class="text-2xl font-bold text-gray-800">Edit Toping</h2>
    </div>

    <div class="bg-white rounded-xl shadow-sm border p-6 max-w-2xl">
        <form action="{{ route('admin.topping.update', $topping->id) }}" method="POST">
            @csrf @method('PUT')

            <div class="mb-4">
                <label class="block text-sm font-bold mb-2">Nama Toping</label>
                <input type="text" name="nama_topping" value="{{ $topping->nama_topping }}" class="w-full border rounded-lg p-2" required>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                <div>
                    <label class="block text-sm font-bold mb-2">Harga (Rp)</label>
                    <input type="number" name="harga" value="{{ $topping->harga }}" class="w-full border rounded-lg p-2" required>
                </div>
                <div>
                    <label class="block text-sm font-bold mb-2">Stok</label>
                    <input type="number" name="stok" value="{{ $topping->stok }}" class="w-full border rounded-lg p-2" required>
                </div>
                <div>
                    <label class="block text-sm font-bold mb-2">Status</label>
                    <select name="status" class="w-full border rounded-lg p-2 bg-white">
                        <option value="tersedia" {{ $topping->status == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                        <option value="habis" {{ $topping->status == 'habis' ? 'selected' : '' }}>Habis</option>
                    </select>
                </div>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-6 rounded-lg">Update</button>
            </div>
        </form>
    </div>
@endsection
