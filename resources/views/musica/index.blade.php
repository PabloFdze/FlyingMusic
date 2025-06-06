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
            color: #ff0077;
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
        audio {
        width: 100%;
        height: 40px;
        border-radius: 10px;
        outline: none;
        }
        .custom-search-btn {
        color: #ff0095;
        border-color: #ff008c;
        }

        .custom-search-btn:hover {
        background-color: #fa61bf;
        color: #121212;
        border-color: #fc60c0;
        }

        /* Estilos para playlists */
        .playlist-card {
            border-left: 5px solid #ff0077;
        }

        .playlist-title {
            color: #ff0077;
        }

        .playlist-link {
            text-decoration: none;
        }
        .playlist-link:hover {
            text-decoration: none;
            color: #fa61bf;
        }

        .custom-btn {
            color: #fff;
            background-color: #e91e63;
            border-color: #e91e63;
        }

        .custom-btn:hover {
            background-color: #ff7dad;
            border-color: #ff7dad;
            color: #fff;
        }

    </style>
</head>
<body>

    <!-- Logo y navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm" style="background-color: #1c1c1c;"> 
    <div class="container-fluid d-flex align-items-center justify-content-between">

        {{-- Logo a la izquierda --}}
        <form action="{{ route('flyingmusic.index') }}" method="GET" class="m-0">
            <button class="btn logo-btn p-0 border-0 bg-transparent" type="submit">
                <img src="{{ asset('img/flying.jpg') }}" alt="FlyingMusic Logo" style="height: 40px;">
            </button>
        </form>

        {{-- Texto de bienvenida --}}
        <span class="text-white mb-0 mx-3">Bienvenido, @auth {{ Auth::user()->name }} @endauth</span>

        {{-- Botón de cerrar sesión --}}
        <form action="{{ route('flyingmusic.logout') }}" method="POST" class="m-0">
            @csrf
            <button type="submit" class="btn btn-outline-info  custom-search-btn">Cerrar sesión</button>
        </form>

    </div>
</nav>


      <!-- Título y barra de búsqueda -->
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap mt-4">
            <h2 class="text-light mb-3 mb-md-0">🎵 Canciones disponibles</h2>
            <form method="GET" action="{{ route('flyingmusic.music') }}" class="mt-6 d-flex" role="search">
                <input type="text" name="search" class="form-control me-2" placeholder="Buscar canción o artista..." value="{{ request('search') }}">
                <button class="btn btn-outline-info custom-search-btn" type="submit">Buscar</button>
            </form>
        </div>

        <div class="row">
            @foreach ($songs as $song)
                <div class="col-md-6 col-lg-4 mb-4 mt-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                             @if ($song->image_path)
                             <div class="text-center mb-3">
                                <img src="{{ asset($song->image_path) }}" alt="Portada de {{ $song->title }}" class="img-thumbnail mb-2" style="width: 100px; height: 100px; object-fit: cover;">
                            @endif
                            <h5 class="card-title">{{ $song->title }}</h5>
                            <p class="card-text">{{ $song->artist }}</p>
                             </div>
                            <audio controls class="audio-player mt-2">
                                <source src="{{ asset($song->file_path) }}" type="audio/mpeg">
                                Tu navegador no soporta audio HTML5.
                            </audio>

                             <form action="{{ route('playlists.addSong') }}" method="POST" class="mt-3">
                        @csrf
                        <input type="hidden" name="music_id" value="{{ $song->id }}">
                        <div class="input-group">
                            <select name="playlist_id" class="form-select" required>
                                <option value="" disabled selected>Selecciona una playlist</option>
                                    @foreach (Auth::user()->playlists as $playlist)
                                <option value="{{ $playlist->id }}">{{ $playlist->nombre }}</option>
                                    @endforeach
                            </select>
                            <button type="submit" class="btn btn-sm btn-outline-success">Añadir a Playlist</button>
                        </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

     <!-- Sección Playlists -->
        <h2 class="mt-5 mb-4 text-white">🎶 Playlists</h2>
        <a href="{{ route('playlists.create') }}" class="btn custom-btn mb-4">Crear nueva Playlist</a>

        <div class="row">
            @forelse ($playlists as $playlist)
                <div class="col-md-6 col-lg-4 mb-4">
                    <a href="{{ route('playlists.showfree', $playlist->id) }}" class="playlist-link">
                        <div class="card playlist-card h-100 shadow-sm">
                            <div class="card-body d-flex flex-column justify-content-center">
                                <h5 class="playlist-title">{{ $playlist->nombre }}</h5>
                                <small class="text-white">
                                    @if ($playlist->user)
                                        Creador: {{ $playlist->user->name }}
                                    @endif
                                </small>
                            </div>
                        </div>
                    </a>
                    
                </div>
            @empty
                <p class="text-white">No hay playlists disponibles.</p>
            @endforelse
        </div>

    </div>
    
     <script src="{{ asset('js/modalplaylist.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

