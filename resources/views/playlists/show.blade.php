<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Playlist - {{ $playlist->nombre }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
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

        .custom-btn {
            color: #fff;
            background-color: #e91e63;
            border-color: #e91e63;
        }

        .custom-btn:hover {
            background-color: #ff7dad;
            border-color: #ff7dad;
        }

        .logo-btn img {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 50%;
            box-shadow: 0 0 5px rgba(255,255,255,0.2);
        }

        .card {
            background-color: #1f1f1f;
            border: 1px solid #2d2d2d;
            color: #fff;
        }

        .card-title {
            color: #ff0077;
        }

        .audio-player {
            width: 100%;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark shadow-sm">
    <div class="container-fluid d-flex align-items-center justify-content-between">
        <form action="{{ route('flyingmusic.index') }}" method="GET" class="m-0">
            <button class="btn logo-btn p-0 border-0 bg-transparent" type="submit">
                <img src="{{ asset('img/flying.jpg') }}" alt="FlyingMusic Logo">
            </button>
        </form>

        <span class="text-white mb-0 mx-3">Bienvenido, @auth {{ Auth::user()->name }} @endauth</span>

        <form action="{{ route('flyingmusic.logout') }}" method="POST" class="m-0">
            @csrf
            <button type="submit" class="btn btn-outline-light custom-btn">Cerrar sesión</button>
        </form>
    </div>
</nav>

<!-- Contenido principal -->
<div class="container mt-5">
    <h2 class="mb-4">🎵 Playlist: <span class="text-pink">{{ $playlist->nombre }}</span></h2>

    @if (session('success'))
        <div class="alert alert-success text-white bg-success bg-opacity-25 border border-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($playlist->musics->isEmpty())
        <p class="text-muted">Esta playlist no tiene canciones aún.</p>
    @else
        <div class="row">
            @foreach ($playlist->musics as $song)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            @if ($song->image_path)
                                <img src="{{ asset($song->image_path) }}" alt="Portada de {{ $song->title }}" class="img-thumbnail mb-3" style="width: 100%; height: 200px; object-fit: cover;">
                            @endif
                            <h5 class="card-title">{{ $song->title }}</h5>
                            <p class="card-text">{{ $song->artist }}</p>
                            <audio controls class="audio-player mt-2">
                                <source src="{{ asset($song->file_path) }}" type="audio/mpeg">
                                Tu navegador no soporta audio HTML5.
                            </audio>
                            <form action="{{ route('music.destroy', $song->id) }}" method="POST" class="mt-3">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('¿Eliminar esta canción?')" class="btn btn-sm btn-outline-danger w-100 mt-2">Eliminar</button>
                        </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <a href="{{ route('flyingmusic.index') }}" class="btn btn-outline-light mt-3">Volver a inicio</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
