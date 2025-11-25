@extends('layout.admin')

@section('title','Edit Topping')

@section('content')
<h1 class="mb-4">Edit Topping</h1>

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('topping.update', $topping->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" name="nama" class="form-control" value="{{ $topping->nama }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Harga</label>
        <input type="number" name="harga" class="form-control" value="{{ $topping->harga }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Stok</label>
        <input type="number" name="stok" class="form-control" value="{{ $topping->stok }}" required>
    </div>

    <button type="submit" class="btn btn-success">Update</button>
    <a href="{{ route('topping.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
