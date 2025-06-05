<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Playlist - FlyingMusic</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #121212;
            color: #f0f0f0;
            font-family: 'Segoe UI', sans-serif;
            height: 100vh;
            
        }

        .navbar {
            background-color: #1c1c1c;
        }

        .navbar-brand span {
            font-weight: bold;
            font-size: 1.3rem;
            color: #ffffff;
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

        .form-control, .form-select {
            background-color: #6b6a6a;
            color: rgb(218, 209, 209);
            border: 1px solid #202020;
        }

        h2 {
            color: #ffffff;
        }

        .logo-btn img {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 50%;
            box-shadow: 0 0 5px rgba(255,255,255,0.2);
        }

        .container{
            max-width: 1200px; 
            margin: 0 auto; 
            padding: 20px; 
            display: flex; 
            justify-content: center; 
            align-items: center;
            height: 75vh;
        }

        .container-create {
            max-width: 800px; 
            width: 90%;       
            background-color: #1c1c1c; 
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(233,30,99,0.6);
            
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

<!-- Contenido -->
<div class="container mt-5">
<div class="container-create mt-5">
    <h2 class="mb-4">📝 Crear nueva Playlist</h2>

    @if ($errors->any())
        <div class="alert alert-danger text-white bg-danger bg-opacity-25 border border-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>⚠️ {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('playlists.store') }}" method="POST" class="mt-4">
        @csrf

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre de la playlist</label>
            <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Ej: Mis canciones favoritas" required>
        </div>

        <div class="mb-3">
            <label for="tipo" class="form-label">Tipo de playlist</label>
            <select id="tipo" name="tipo" class="form-select" required>
                <option value="music">Music</option>
                <option value="premium">Premium</option>
            </select>
        </div>

        <button type="submit" class="btn custom-btn">Crear Playlist</button>
        <a href="{{ route('flyingmusic.index') }}" class="btn btn-outline-light ms-2">Cancelar</a>
    </form>
</div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
