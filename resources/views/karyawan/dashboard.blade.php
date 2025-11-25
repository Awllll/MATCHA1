{{-- @extends('layout.karyawan')

@section('content')
<h1>Dashboard Karyawan</h1>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<h2>Daftar Menu</h2>
<div class="row">
    @foreach($produks as $produk)
        <div class="col-md-3 mb-3">
            <div class="card">
                <img src="{{ asset('storage/' . $produk->gambar) }}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">{{ $produk->nama }}</h5>
                    <p class="card-text">Rp {{ number_format($produk->harga) }}</p>
                    <a href="{{ route('menu.detail', $produk->id) }}" class="btn btn-primary">Personalisasi</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection --}}


@extends('layout.karyawan')

@section('content')
    <h2>Dashboard Karyawan</h2>

    <h3>Daftar Produk</h3>

    @if(isset($produks) && count($produks) > 0)
        <ul>
            @foreach ($produks as $produk)
                <li>{{ $produk->nama }} - Rp {{ $produk->harga }}</li>
            @endforeach
        </ul>
    @else
        <p>Belum ada produk.</p>
    @endif
@endsection
