<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJDREW</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Estilos personalizados -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">AJDREW</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <!-- Enlace al Home -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Inicio</a>
                </li>

                <!-- Enlace a Juegos para Usuarios Normales -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('usuario.juegos.index') }}">Juegos</a>
                </li>

                <!-- Enlace a sorteos para Usuarios Normales -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('usuario.sorteos.index') }}">Sorteos</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- Footer con enlaces al CRUD (solo visibles para administradores) -->
    <footer class="bg-light text-center py-4">
        <div class="container">
            <ul class="navbar-nav justify-content-center">
              
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('juegos.index') }}">Administrar Juegos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('equipos.index') }}">Equipos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('calificaciones.index') }}">Calificaciones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('sorteos.index') }}">Sorteos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('tutoriales.index') }}">Tutoriales</a>
                </li>
               
            </ul>
        </div>
    </footer>

    <!-- Bootstrap JS y dependencias -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
