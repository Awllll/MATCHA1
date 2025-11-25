@extends('layout.admin')

@section('title','Daftar Kategori')

@section('content')
<h1 class="mb-4">Daftar Kategori</h1>

<a href="{{ route('kategori.create') }}" class="btn btn-primary mb-3">Tambah Kategori</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($kategoris as $index => $kategori)
        <tr>
            <td>{{ $index+1 }}</td>
            <td>{{ $kategori->nama }}</td>
            <td>
                <a href="{{ route('kategori.edit', $kategori->id) }}" class="btn btn-sm btn-warning">Edit</a>

                <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin hapus?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
