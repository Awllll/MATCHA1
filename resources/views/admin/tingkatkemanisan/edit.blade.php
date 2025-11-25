@extends('layout.admin')

@section('title','Edit Tingkat Kemanisan')

@section('content')
<div class="container mt-4">
    <h1>Edit Tingkat Kemanisan</h1>

    <form action="{{ route('tingkatkemanisan.update', $tingkatkemanisan) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nama Tingkat Kemanisan</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama', $tingkatkemanisan->nama) }}" required>
            @error('nama')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('tingkatkemanisan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
