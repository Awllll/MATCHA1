@php
    $pengguna = $pengguna ?? auth()->user();
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

    {{-- Sidebar --}}
    <aside style="width:220px; background:#f3f3f3; min-height:100vh; padding:20px;">
        <h3>Menu Karyawan</h3>

        <div style="margin-top:10px; margin-bottom:25px; font-weight:bold;">
            Halo, {{ $pengguna->nama }}
        </div>

        <ul style="list-style:none; padding:0; margin-top:20px;">
            <li style="margin:10px 0;">
                <a href="{{ route('karyawan.dashboard') }}">Dashboard</a>
            </li>

            <li style="margin:10px 0;">
                <a href="{{ route('menu.makanan') }}">Makanan</a>
            </li>

            <li style="margin:10px 0;">
                <a href="{{ route('menu.minuman') }}">Minuman</a>
            </li>

            <li style="margin:10px 0;">
                <a href="{{ route('logout') }}">Logout</a>
            </li>
        </ul>
    </aside>

    {{-- Content --}}
    <main style="flex:1; padding:20px;">
        @yield('content')
    </main>

</body>
</html>
