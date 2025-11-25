@extends('layout.admin')

@section('title','Edit Ukuran')

@section('content')
<div class="container mt-4">
    <h1>Edit Ukuran</h1>

    <form action="{{ route('ukuran.update', $ukuran->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nama Ukuran</label>
            <input type="text" name="nama" class="form-control" value="{{ $ukuran->nama }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Harga Tambahan</label>
            <input type="number" name="harga_tambahan" class="form-control" value="{{ $ukuran->harga_tambahan }}" min="0" required>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('ukuran.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
