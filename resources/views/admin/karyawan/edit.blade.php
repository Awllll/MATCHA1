@extends('layouts.admin')

@section('content')
    <div class="flex items-center gap-4 mb-6">
        <a href="{{ route('admin.users.index') }}" class="bg-white border border-gray-200 p-2 rounded-lg hover:bg-gray-50 transition text-gray-600">
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
        </a>
        <h2 class="text-2xl font-bold text-gray-800">Edit Karyawan</h2>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 max-w-2xl">
        <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
            @csrf @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Nama Lengkap</label>
                    <input type="text" name="name" value="{{ $user->name }}" class="w-full px-4 py-2 border rounded-lg focus:ring-green-500" required>
                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Username</label>
                    <input type="text" name="username" value="{{ $user->username }}" class="w-full px-4 py-2 border rounded-lg focus:ring-green-500" required>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                    <input type="email" name="email" value="{{ $user->email }}" class="w-full px-4 py-2 border rounded-lg focus:ring-green-500" required>
                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">No. Telepon</label>
                    <input type="text" name="no_telepon" value="{{ $user->no_telepon }}" class="w-full px-4 py-2 border rounded-lg focus:ring-green-500">
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Status Akun</label>
                <select name="status" class="w-full px-4 py-2 border rounded-lg focus:ring-green-500 bg-white">
                    <option value="aktif" {{ $user->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="nonaktif" {{ $user->status == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                </select>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2">Password Baru <span class="text-gray-400 font-normal">(Opsional)</span></label>
                <input type="password" name="password" class="w-full px-4 py-2 border rounded-lg focus:ring-green-500" placeholder="Kosongkan jika tidak diganti">
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-6 rounded-lg transition">Update</button>
            </div>
        </form>
    </div>
@endsection
