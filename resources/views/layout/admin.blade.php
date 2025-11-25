<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f5f5f5; }
        .sidebar { width: 250px; min-height: 100vh; background-color: #343a40; }
        .sidebar a { padding: 12px 20px; display: block; color: #fff; text-decoration: none; }
        .sidebar a:hover { background-color: #495057; }
        .content { margin-left: 250px; padding: 20px; }
    </style>
</head>
<body>
    <div class="d-flex">
        <div class="sidebar">
            <h4 class="text-white text-center py-3">Admin Panel</h4>
            <a href="/admin/dashboard">Dashboard</a>
            <a href="/admin/penjualan">Monitoring Penjualan</a>
            <a href="/admin/karyawan">Kelola Karyawan</a>
            <a href="/admin/kategori">Kelola Kategori</a>
            <a href="/admin/produk">Kelola Produk</a>
            <a href="/admin/topping">Kelola Topping</a>
            <a href="/logout" class="text-danger">Logout</a>
        </div>

        <div class="content w-100">
            <h2>@yield('page-title')</h2>
            <hr>
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
