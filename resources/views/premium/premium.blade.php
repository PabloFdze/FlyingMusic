<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>FlyingMusic - Subir Canciones</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Estilos personalizados -->
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


        .form-control, .form-file {
            background-color: #6b6a6a;
            color: rgb(218, 209, 209);
            border: 1px solid #202020;
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
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark shadow-sm">
    <div class="container-fluid d-flex align-items-center justify-content-between">

        <!-- Logo -->
        <form action="{{ route('flyingmusic.index') }}" method="GET" class="m-0">
            <button class="btn logo-btn p-0 border-0 bg-transparent" type="submit">
                <img src="{{ asset('img/flying.jpg') }}" alt="FlyingMusic Logo">
            </button>
        </form>

        <!-- Texto de bienvenida -->
        <span class="text-white mb-0 mx-3">Bienvenido, @auth {{ Auth::user()->name }} @endauth</span>

        <!-- Cerrar sesión -->
        <form action="{{ route('flyingmusic.logout') }}" method="POST" class="m-0">
            @csrf
            <button type="submit" class="btn btn-outline-light custom-btn">Cerrar sesión</button>
        </form>
    </div>
</nav>

<div class="container mt-5">
    <!-- Subir canción -->
    <h2>🎶 Subir nueva canción</h2>

    @if(session('success'))
        <div class="alert alert-success mt-3">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('flyingmusic.store') }}" enctype="multipart/form-data" class="mt-4">
        @csrf
        <div class="mb-3">
            <input type="text" name="title" class="form-control" placeholder="Título de la canción" required>
        </div>
        <div class="mb-3">
            <input type="text" name="artist" class="form-control" placeholder="Artista (opcional)">
        </div>
        <div class="mb-3">
            <input type="file" name="file" class="form-control" accept=".mp3,.wav" required>
        </div>
        <div class="mb-3">
        <label for="image" class="form-label">Portada:</label>
        <input type="file" id="image" name="image" class="form-control" accept="image/*">
        <img id="preview" class="img-fluid mt-3 d-none rounded" style="max-height: 200px;">
</div>
        <button type="submit" class="btn custom-btn">Subir canción</button>
    </form>

    <!-- Lista de canciones -->
     <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap mt-4">
            <h2 class="text-light mb-3 mb-md-0">🎵 Canciones disponibles</h2>
            <form method="GET" action="{{ route('premium.page') }}" class="mt-6 d-flex" role="search">
                <input type="text" name="search" class="form-control me-2" placeholder="Buscar canción o artista..." value="{{ request('search') }}">
                <button class="btn btn-outline-info custom-search-btn" type="submit">Buscar</button>
            </form>
        </div>
    <div class="row mt-4">
        @foreach ($songs as $song)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        @if ($song->image_path)
                            <div class="d-flex align-items-center bg-dark rounded p-3 mb-3">
                                <img src="{{ asset($song->image_path) }}" alt="Portada de {{ $song->title }}" class="img-thumbnail" style="width: 100px; height: 100px; object-fit: cover;">
                            </div>
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
</div>

   <!-- Modal de confirmación -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content bg-dark text-white">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmDeleteModalLabel">¿Estás seguro?</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        Esta acción eliminará la canción de forma permanente.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button id="confirmDeleteBtn" type="button" class="btn btn-danger">Eliminar</button>
      </div>
    </div>
  </div>
</div>


    <script src="{{ asset('js/confirm.js') }}"></script>
    <script src="{{ asset('js/imagepreview.js') }}"></script>
    <script src="{{ asset('js/occultalerts.js') }}"></script>
    <script src="{{ asset('js/onlyonesong.js') }}"></script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
