<div>
    <h3>Keranjang</h3>

    @if(count($cart) == 0)
        <p>Keranjang kosong</p>
    @else
        <ul style="list-style:none; padding:0;">
            @foreach($cart as $index => $item)
                <li style="margin-bottom:10px; border-bottom:1px solid #ddd; padding-bottom:5px;">
                    <strong>{{ $item['nama'] }}</strong>
                    <div>Qty: {{ $item['qty'] }}</div>
                    <div>Harga: Rp {{ number_format($item['harga']) }}</div>

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

        @php
            $total = 0;
            foreach($cart as $item){
                $total += ($item['harga'] ?? 0) * ($item['qty'] ?? 1);
            }
        @endphp

        <p><strong>Total: Rp {{ number_format($total) }}</strong></p>

        <form action="{{ route('kasir.checkout.confirm') }}" method="POST">
            @csrf
            <div class="mb-2">
                <label>Nama Pembeli:</label>
                <input type="text" name="nama_pembeli" class="form-control" required placeholder="Masukkan nama pembeli">
            </div>
            <button type="submit" class="btn btn-success w-100 mt-2">Lanjut ke Pembayaran</button>
        </form>
    @endif
</div>
