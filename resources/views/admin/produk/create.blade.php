@extends('layout.admin')

@section('title','Tambah Produk')

@section('content')
<h1 class="mb-4">Tambah Produk</h1>

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label class="form-label">Kategori</label>
        <select name="kategori_id" class="form-control" required>
            <option value="">-- Pilih Kategori --</option>
            @foreach($kategoris as $kategori)
                <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Nama Produk</label>
        <input type="text" name="nama" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Harga</label>
        <input type="number" name="harga" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Stok</label>
        <input type="number" name="stok" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Deskripsi</label>
        <textarea name="deskripsi" class="form-control"></textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Gambar</label>
        <input type="file" name="gambar" class="form-control">
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="{{ route('produk.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
