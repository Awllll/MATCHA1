@php
    $pengguna = $pengguna ?? auth()->user();
    $cart = session('cart', []);
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karyawan Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body style="display:flex;">

    {{-- Sidebar Menu --}}
    <aside style="width:220px; background:#f3f3f3; min-height:100vh; padding:20px;">
        <h3>Menu Karyawan</h3>
        <div style="margin-top:10px; margin-bottom:25px; font-weight:bold;">
            Halo, {{ $pengguna->nama }}
        </div>
        <ul style="list-style:none; padding:0; margin-top:20px;">
            <li style="margin:10px 0;"><a href="{{ route('karyawan.dashboard') }}">Dashboard</a></li>
            <li style="margin:10px 0;"><a href="{{ route('menu.makanan') }}">Makanan</a></li>
            <li style="margin:10px 0;"><a href="{{ route('menu.minuman') }}">Minuman</a></li>
            <li style="margin:10px 0;">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" style="background:none; border:none; padding:0; color:red; cursor:pointer;">Logout</button>
                </form>
            </li>
        </ul>
    </aside>

    {{-- Sidebar Keranjang --}}
    <aside style="width:280px; background:#fff; border-left:1px solid #ccc; padding:15px;">
        <h4>Keranjang</h4>

        @if(count($cart) == 0)
            <p>Keranjang kosong</p>
        @else
            @php $total = 0; @endphp
            <ul style="list-style:none; padding:0;">
                @foreach($cart as $index => $item)
                    @php $subtotal = ($item['harga'] ?? 0) * ($item['qty'] ?? 1); @endphp
                    @php $total += $subtotal; @endphp
                    <li style="margin-bottom:10px; border-bottom:1px solid #ddd; padding-bottom:5px;">
                        <strong>{{ $item['nama'] }}</strong>
                        <div>Qty: {{ $item['qty'] }}</div>
                        <div>Harga: Rp {{ number_format($item['harga']) }}</div>
                        <div>Subtotal: Rp {{ number_format($subtotal) }}</div>

                        @if(($item['tipe'] ?? '') == 'personalisasi')
                            <div>Ukuran: {{ $item['ukuran'] ?? '-' }}</div>
                            <div>Kemanisan: {{ $item['kemanisan'] ?? '-' }}</div>
                            <div>Topping: {{ implode(', ', $item['topping'] ?? []) }}</div>
                        @endif

                        <div style="margin-top:5px;">
                            <a href="{{ route('kasir.qty.minus', $index) }}" class="btn btn-sm btn-secondary">-</a>
                            <a href="{{ route('kasir.qty.plus', $index) }}" class="btn btn-sm btn-secondary">+</a>
                        </div>
                    </li>
                @endforeach
            </ul>

            <div style="margin-top:10px; font-weight:bold;">
                Total Pembelian: Rp {{ number_format($total) }}
            </div>

            <form action="{{ route('kasir.checkout.form') }}" method="GET" class="mt-3">
                <button type="submit" class="btn btn-success w-100">Checkout</button>
            </form>
        @endif
    </aside>

    <main style="flex:1; padding:20px; overflow-y:auto; height:100vh;">
        @yield('content')
    </main>

</body>
</html>
