@extends('layouts.admin')

@section('content')
    <div class="flex items-center gap-4 mb-6">
        <a href="{{ route('admin.es_batu.index') }}" class="bg-white border p-2 rounded-lg hover:bg-gray-50"><svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg></a>
        <h2 class="text-2xl font-bold text-gray-800">Tambah Level Es Batu</h2>
    </div>

    <div class="bg-white rounded-xl shadow-sm border p-6 max-w-2xl">
        <form action="{{ route('admin.es_batu.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block text-sm font-bold mb-2">Nama Level Es</label>
                <input type="text" name="nama_es" class="w-full border rounded-lg p-2" placeholder="Contoh: Normal Ice, Less Ice" required>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-green-600 text-white font-bold py-2 px-6 rounded-lg hover:bg-green-700">Simpan</button>
            </div>
        </form>
    </div>
@endsection
