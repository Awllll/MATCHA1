@extends('layout.admin')

@section('title','Edit Produk')

@section('content')
<h1 class="mb-4">Edit Produk</h1>

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Kategori</label>
        <select name="kategori_id" class="form-control" required>
            <option value="">-- Pilih Kategori --</option>
            @foreach($kategoris as $kategori)
                <option value="{{ $kategori->id }}" @if($kategori->id == $produk->kategori_id) selected @endif>{{ $kategori->nama }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Nama Produk</label>
        <input type="text" name="nama" class="form-control" value="{{ $produk->nama }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Harga</label>
        <input type="number" name="harga" class="form-control" value="{{ $produk->harga }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Stok</label>
        <input type="number" name="stok" class="form-control" value="{{ $produk->stok }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Deskripsi</label>
        <textarea name="deskripsi" class="form-control">{{ $produk->deskripsi }}</textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Gambar</label>
        <input type="file" name="gambar" class="form-control">
        @if($produk->gambar)
            <img src="{{ asset($produk->gambar) }}" alt="{{ $produk->nama }}" width="120" class="mt-2">
        @endif
    </div>

    <button type="submit" class="btn btn-success">Update</button>
    <a href="{{ route('produk.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
