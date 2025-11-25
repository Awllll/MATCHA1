<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Selamat Datang</title>

    <style>
        body {
            margin: 0;
            font-family: Arial;
            background: #f5f5f5;
            text-align: center;
            padding-top: 80px;
        }

        .card {
            display: inline-block;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        a {
            display: block;
            margin-top: 20px;
            text-decoration: none;
            padding: 10px;
            background: #4CAF50;
            color: white;
            border-radius: 8px;
        }
    </style>
</head>
<body>

    <div class="card">
        <h1>Selamat Datang di Sistem Cafe</h1>
        <p>Silakan login sebagai Admin atau Karyawan</p>

        <a href="{{ route('login.admin') }}">Login Admin</a>
        <a href="{{ route('login.karyawan') }}" style="margin-top:10px; background:#007BFF;">
            Login Karyawan
        </a>
    </div>

</body>
</html>
