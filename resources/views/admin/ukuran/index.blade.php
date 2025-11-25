@extends('layout.admin')

@section('title','Daftar Ukuran')

@section('content')
<div class="container mt-4">
    <h1>Daftar Ukuran</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('ukuran.create') }}" class="btn btn-primary mb-3">Tambah Ukuran</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Harga Tambahan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ukurans as $ukuran)
            <tr>
                <td>{{ $ukuran->id }}</td>
                <td>{{ $ukuran->nama }}</td>
                <td>{{ $ukuran->harga_tambahan }}</td>
                <td>
                    <a href="{{ route('ukuran.edit', $ukuran->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('ukuran.destroy', $ukuran->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus ukuran ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
