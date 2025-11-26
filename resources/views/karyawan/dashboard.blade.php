@extends('layout.karyawan')

@section('content')
<h2>Dashboard Karyawan</h2>
<h3>Daftar Produk</h3>

@if(isset($produks) && count($produks) > 0)
    <div class="row">
        @foreach ($produks as $produk)
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <div style="width: 120px; height: 120px; margin:auto; overflow:hidden; border-radius:10px;">
                        <img src="{{ asset($produk->gambar) }}" alt="{{ $produk->nama }}"
                             style="width:100%; height:100%; object-fit:cover;">
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">{{ $produk->nama }}</h5>
                        <p class="card-text">Rp {{ number_format($produk->harga) }}</p>

                        <form action="{{ route('kasir.addToCart', $produk->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success w-100 mb-2">Tambah</button>
                        </form>

                        @if ($produk->kategori && strtolower($produk->kategori->nama) == 'minuman')
                            <a href="{{ route('kasir.personalisasi.form', $produk->id) }}"
                                class="btn btn-primary w-100">
                                Personalisasi
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <p>Belum ada produk.</p>
@endif
@endsection
