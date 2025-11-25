@extends('layout.admin')

@section('title','Tambah Topping')

@section('content')
<h1 class="mb-4">Tambah Topping</h1>

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('topping.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label class="form-label">Nama</label>
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

    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="{{ route('topping.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
