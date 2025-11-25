@extends('layout.admin')

@section('title','Daftar Topping')

@section('content')
<h1 class="mb-4">Daftar Topping</h1>

<a href="{{ route('topping.create') }}" class="btn btn-primary mb-3">Tambah Topping</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($toppings as $index => $topping)
        <tr>
            <td>{{ $index+1 }}</td>
            <td>{{ $topping->nama }}</td>
            <td>{{ $topping->harga }}</td>
            <td>{{ $topping->stok }}</td>
            <td>
                <a href="{{ route('topping.edit', $topping->id) }}" class="btn btn-sm btn-warning">Edit</a>

                <form action="{{ route('topping.destroy', $topping->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin hapus?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
