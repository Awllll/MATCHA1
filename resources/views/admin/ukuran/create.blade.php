@extends('layout.admin')

@section('title','Tambah Ukuran')

@section('content')
<div class="container mt-4">
    <h1>Tambah Ukuran</h1>

    <form action="{{ route('ukuran.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nama Ukuran</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Harga Tambahan</label>
            <input type="number" name="harga_tambahan" class="form-control" min="0" required>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('ukuran.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
