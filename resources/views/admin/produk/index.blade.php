@extends('layout.admin')

@section('title','Daftar Produk')

@section('content')
<h1 class="mb-4">Daftar Produk</h1>

<a href="{{ route('produk.create') }}" class="btn btn-primary mb-3">Tambah Produk</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Gambar</th>
            <th>Nama</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($produks as $index => $produk)
        <tr>
            <td>{{ $index+1 }}</td>
            <td>
                @if($produk->gambar)
                    <img src="{{ asset($produk->gambar) }}" alt="{{ $produk->nama }}" width="100">
                @endif
            </td>
            <td>{{ $produk->nama }}</td>
            <td>{{ $produk->kategori->nama ?? '-' }}</td>
            <td>{{ $produk->harga }}</td>
            <td>{{ $produk->stok }}</td>
            <td>{{ $produk->deskripsi }}</td>
            <td>
                <a href="{{ route('produk.edit', $produk->id) }}" class="btn btn-sm btn-warning">Edit</a>

                <form action="{{ route('produk.destroy', $produk->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin hapus?')">
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
