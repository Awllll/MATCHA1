@extends('layout.admin')

@section('title','Edit Kategori')

@section('content')
<h1 class="mb-4">Edit Kategori</h1>

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Nama Kategori</label>
        <input type="text" name="nama" class="form-control" value="{{ $kategori->nama }}" required>
    </div>

    <button type="submit" class="btn btn-success">Update</button>
    <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
