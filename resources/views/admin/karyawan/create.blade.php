@extends('layout.admin')

@section('title','Tambah Akun Karyawan')

@section('content')
<h1 class="mb-4">Tambah Akun Karyawan</h1>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('pengguna.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" name="nama" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="{{ route('pengguna.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
