@extends('layout.admin')

@section('title','Edit Akun Karyawan')

@section('content')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<h1 class="mb-4">Edit Akun Karyawan</h1>

<form action="{{ route('pengguna.update', $pengguna->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" name="nama" value="{{ $pengguna->nama }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" value="{{ $pengguna->email }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Password (kosongkan jika tidak diubah)</label>
        <input type="password" name="password" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Role</label>
        <select name="role" class="form-control">
            <option value="karyawan" {{ $pengguna->role == 'karyawan' ? 'selected' : '' }}>Karyawan</option>
            <option value="admin" {{ $pengguna->role == 'admin' ? 'selected' : '' }}>Admin</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('pengguna.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
