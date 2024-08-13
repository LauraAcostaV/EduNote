<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - EduNote</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>

<style>
    .container {
        max-width: 800px;
        margin: 0 auto;
    }

    .card {
        border-radius: 8px;
        border: 1px solid #ddd;
        margin-bottom: 20px;
    }

    .card-header, .card-footer {
        background-color: #f8f9fa;
        padding: 10px;
    }

    .card-body {
        padding: 20px;
    }
</style>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ route('estudiantes.index') }}">EduNote</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('estudiantes.index') }}">Estudiantes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cursos.index') }}">Cursos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('materias.index') }}">Materias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('notas.index') }}">Notas</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <script src="{{ asset('js/app.js') }}"></script>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

</body>
</html>

