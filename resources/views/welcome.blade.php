<!DOCTYPE html>
<html>
<head>
    <title>Demo Middleware - Login</title>
</head>
<body>
    <h1>Página de inicio</h1>

    @if(session('error'))
        <div style="color:red">{{ session('error') }}</div>
    @endif

    @guest
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <label>Email:</label>
            <input type="email" name="email" required><br><br>

            <label>Contraseña:</label>
            <input type="password" name="password" required><br><br>

            <button type="submit">Login</button>
        </form>
    @else
        <p>Hola, {{ Auth::user()->name }}</p>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Logout</button>
        </form>
        <a href="/dashboard">Ir al Dashboard</a>
    @endguest
</body>
</html>
