<!DOCTYPE html>
<html>
<head>
    <title>Acceso Premium</title>
    <link rel="stylesheet" href="{{ asset('css/premium_access.css') }}">
</head>
<body>
    <!-- Contenido -->
    <form action="{{route('flyingmusic.index')}}">
        <button class="logo">
            <img src="{{asset('img/flying.jpg')}}" alt="Logo de FlyingMusic" class="logo"></img>
        </button>
    </form>
    <div class="premium-wrapper">
        <div class="premium-card">
            <h2>Acceso Premium</h2>

            @if ($errors->any())
                <div class="error-box">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('premium.upgrade') }}">
                @csrf
                <label for="email">Correo electrónico:</label>
                <input type="email" name="email" required>

                <label for="password">Contraseña:</label>
                <input type="password" name="password" required>

                <button type="submit" class="primary-btn">Hacerse Premium</button>
            </form>
        </div>
    </div>
</body>
</html>