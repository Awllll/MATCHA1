@extends('layout.karyawan')

@section('content')
<h2 class="mb-3">{{ $title }}</h2>
<div class="row">
    @foreach ($menus as $item)
        <div class="col-md-3 mb-4">
            <div class="card p-2">
                <img src="{{ $item->gambar }}" class="card-img-top" alt="">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->nama }}</h5>
                    <p class="card-text">Rp {{ number_format($item->harga) }}</p>
                    <button class="btn btn-success w-100"
                        onclick="tambahProduk('{{ $item->nama }}', {{ $item->harga }})">
                        Tambah
                    </button>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
