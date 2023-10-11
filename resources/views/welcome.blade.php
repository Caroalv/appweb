<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container text-center mt-5">
    <h1>Bienvenido a Laravel</h1>
    <p>Una plataforma increíble para desarrolladores.</p>

    @if (Route::has('login'))
        @auth
            <a href="{{ url('/home') }}" class="btn btn-primary mt-3">Ir a la página de inicio</a>
        @else
            <a href="{{ route('login') }}" class="btn btn-success mt-3">Iniciar Sesión</a>
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="btn btn-info mt-3">Registrarse</a>
            @endif
        @endauth
    @endif
</div>

<!-- Bootstrap JS (opcional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
