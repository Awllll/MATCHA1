<form action="{{ route('login.process') }}" method="POST">
    @csrf
    <input type="email" name="email" placeholder="Email admin">
    <input type="password" name="password" placeholder="Password admin">
    <button type="submit">Login</button>
</form>
