@extends('layout.admin')

@section('title','Kelola Akun Karyawan')

@section('content')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<h1 class="mb-4">Daftar Akun Karyawan</h1>

<a href="{{ route('pengguna.create') }}" class="btn btn-primary mb-3">Tambah Akun Karyawan</a>

<table class="table table-bordered">
    <thead class="table-light">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Role</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($pengguna as $p)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $p->nama }}</td>
            <td>{{ $p->email }}</td>
            <td>{{ $p->role}}</td>
            <td>
                <a href="{{ route('pengguna.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('pengguna.destroy', $p->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Hapus akun ini?')" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
