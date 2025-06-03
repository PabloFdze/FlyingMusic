<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>FlyingMusic - Música</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #121212;
            color: #f0f0f0;
            font-family: 'Segoe UI', sans-serif;
        }

        .navbar {
            background-color: #1c1c1c;
        }

        .navbar-brand span {
            font-weight: bold;
            font-size: 1.3rem;
            color: #ffffff;
        }

        h1, h2 {
            color: #ffffff;
        }

        .card {
            background-color: #1f1f1f;
            border: 1px solid #2d2d2d;
            color: #fff;
            transition: transform 0.2s ease;
        }

        .card:hover {
            transform: scale(1.02);
        }

        .card-title {
            color: #00ffd5;
        }

        .audio-player {
            width: 100%;
        }

        .logo-btn img {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 50%;
            box-shadow: 0 0 5px rgba(255,255,255,0.2);
        }
    </style>
</head>
<body>

    <!-- Logo y navegación -->
    <nav class="navbar navbar-dark shadow-sm">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <form action="{{ route('flyingmusic.index') }}" method="GET" class="m-0">
                <button class="btn logo-btn p-0 border-0 bg-transparent" type="submit">
                    <img src="{{ asset('img/flying.jpg') }}" alt="FlyingMusic Logo">
                </button>
            </form>
            <span class="text-white">Bienvenido, @auth {{ Auth::user()->name }} @endauth</span>
        </div>
    </nav>

      <!-- Título y barra de búsqueda -->
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
            <h2 class="text-light mb-3 mb-md-0">🎵 Canciones disponibles</h2>
            <form method="GET" action="{{ route('flyingmusic.music') }}" class="d-flex" role="search">
                <input type="text" name="search" class="form-control me-2" placeholder="Buscar canción o artista..." value="{{ request('search') }}">
                <button class="btn btn-outline-info" type="submit">Buscar</button>
            </form>
        </div>

        <div class="row">
            @foreach ($songs as $song)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ $song->title }}</h5>
                            <p class="card-text">{{ $song->artist }}</p>
                            <audio controls class="audio-player mt-2">
                                <source src="{{ asset($song->file_path) }}" type="audio/mpeg">
                                Tu navegador no soporta audio HTML5.
                            </audio>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Bootstrap JS (opcional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

