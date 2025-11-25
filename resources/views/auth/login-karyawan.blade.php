<form action="{{ route('login.process') }}" method="POST">
    @csrf
    <input type="email" name="email" placeholder="Email karyawan">
    <input type="password" name="password" placeholder="Password karyawan">
    <button type="submit">Login</button>
</form>
