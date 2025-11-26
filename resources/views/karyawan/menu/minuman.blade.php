@extends('layout.karyawan')

@section('content')
<h2 class="mb-3">{{ $title }}</h2>
<div class="row">
    @foreach ($menus as $item)
        <div class="col-md-3 mb-4">
            <div class="card h-100">
                <div style="width: 120px; height: 120px; margin:auto; overflow:hidden; border-radius:10px;">
                    <img src="{{ asset($item->gambar) }}" alt="{{ $item->nama }}"
                            style="width:100%; height:100%; object-fit:cover;">
                </div>

                <div class="card-body">
                    <h5 class="card-title">{{ $item->nama }}</h5>
                    <p class="card-text">Rp {{ number_format($item->harga) }}</p>

                    <form action="{{ route('kasir.addToCart', $item->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success w-100 mb-2">Tambah</button>
                    </form>

                    @if ($item->kategori && strtolower($item->kategori->nama) == 'minuman')
                        <a href="{{ route('kasir.personalisasi.form', $item->id) }}"
                            class="btn btn-primary w-100">
                            Personalisasi
                        </a>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
