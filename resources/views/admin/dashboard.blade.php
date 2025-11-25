@extends('layout.admin')

@section('content')
<div class="container mt-4">
    <h1>Dashboard Admin</h1>
    <p>Selamat datang, {{ auth()->user()->nama }}!</p>

    <div class="mt-4">
        <a href="{{ route('pengguna.index') }}" class="btn btn-primary">
            Kelola Karyawan
        </a>

        <a href="{{ route('produk.index') }}" class="btn btn-warning">
            Kelola Produk
        </a>

        <a href="{{ route('topping.index') }}" class="btn btn-primary">
            Kelola Topping
        </a>

        <a href="{{ route('kategori.index') }}" class="btn btn-warning">
            Kelola Kategori
        </a>

        <a href="{{ route('ukuran.index') }}" class="btn btn-primary">
            Kelola Ukuran
        </a>

        <a href="{{ route('tingkatkemanisan.index') }}" class="btn btn-warning">
            Kelola Tingkat Kemanisan
        </a>

        <a href="#" class="btn btn-success">
            Monitoring Penjualan
        </a>
    </div>
</div>
@endsection
