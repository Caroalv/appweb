<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <!-- CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Agrega tus estilos personalizados aquí si es necesario -->
</head>
<body class="antialiased">
<div class="container mt-5">
    <!-- Agregamos el encabezado "Bienvenidos" con Bootstrap y centramos el contenido -->
    <div class="text-center">
        <h1 class="display-4">Bienvenidos</h1>
        <p class="lead">¡Gracias por visitar nuestro sitio web!</p>
    </div>

    @if (Route::has('login'))
        <div class="text-center mt-4">
            @auth
                <a href="{{ url('/home') }}" class="btn btn-primary">Casa</a>
            @else
                <a href="{{ route('login') }}" class="btn btn-outline-primary">Iniciar Sesión</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-outline-secondary ml-3">Registro</a>
                @endif
            @endauth
        </div>
    @endif

    <!-- Tu contenido principal aquí -->

</div>

<!-- Scripts de Bootstrap (jQuery y Popper.js) -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@2.10.2/dist/umd/popper.min.js"></script>
<!-- Script de Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
