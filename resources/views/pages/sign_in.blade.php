<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FlyingMusic</title>
    <link rel="stylesheet" href="{{ asset('css/pages_sign_in.css') }}">
</head>
<body>
    <div class="container">
        <div class="logo-title-container">
            <form action="{{route('flyingmusic.index')}}">
                <button class="logo">
                <img src="{{asset('img/flying.jpg')}}" alt="Logo de FlyingMusic" class="logo"></img>
                </button>
            </form>
            </div>
        <h1>FlyingMusic</h1>
        <h1>Regístrate para empezar a escuchar contenido</h1>
        <form method="POST" action="{{ route('flyingmusic.register') }}">
            @csrf
            <div class="input-group">
                <label for="name">Nombre de usuario</label>
                <input type="text" name="name" id="name" placeholder="Nombre de usuario" required>
            </div>
            <div class="input-group">
                <label for="email">Correo electrónico</label>
                <input type="email" name="email" id="email" placeholder="nombre@dominio.com" required>
            </div>
            <div class="input-group">
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password" placeholder="Contraseña" required>
            </div>
            <div class="input-group">
                <label for="password_confirmation">Confirmar Contraseña</label>
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Repite la contraseña" required>
            </div>
            <form action="{{route('flyingmusic.music')}}">
            <button type="submit" class="submit-button">Registrarme</button>
            </form>
        </form>
        </form>
        <div class="social-buttons">
            <a href="https://accounts.google.com" class="google">Registrarte con Google</a>
            <a href="https://www.facebook.com" class="facebook">Registrarte con Facebook</a>
            <a href="https://www.apple.com" class="apple">Registrarte con Apple</a>
        </div>
        <div class="footer">
            ¿Ya tienes una cuenta? <a href="{{route('flyingmusic.login')}}">Inicia sesión aquí.</a>
        </div>
    </div>
</body>