@extends('layout.admin')

@section('title','Daftar Tingkat Kemanisan')

@section('content')
<div class="container mt-4">
    <h1>Daftar Tingkat Kemanisan</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('tingkatkemanisan.create') }}" class="btn btn-primary mb-3">Tambah Tingkat Kemanisan</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tingkats as $tingkat)
            <tr>
                <td>{{ $tingkat->id }}</td>
                <td>{{ $tingkat->nama }}</td>
                <td>
                    <a href="{{ route('tingkatkemanisan.edit', $tingkat) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('tingkatkemanisan.destroy', $tingkat) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus tingkat kemanisan ini?');">
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
