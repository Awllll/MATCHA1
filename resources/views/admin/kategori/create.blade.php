@extends('layout.admin')

@section('title','Tambah Kategori')

@section('content')
<h1 class="mb-4">Tambah Kategori</h1>

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('kategori.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label class="form-label">Nama Kategori</label>
        <input type="text" name="nama" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
