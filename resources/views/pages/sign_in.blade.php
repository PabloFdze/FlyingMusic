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
        <form action="#">
            <div class="input-group">
                <label for="username">Nombre de usuario</label>
                <input type="text" id="username" placeholder="Nombre de usuario" required>
            </div>
            <div class="input-group">
                <label for="useremail">Correo electrónico o nombre de usuario</label>
                <input type="text" id="useremail" placeholder="nombre@dominio.com" required>
            </div>
            <div class="input-group">
                <label for="password">Contraseña</label>
                <input type="password" id="password" placeholder="Contraseña" required>
                <i class="fas fa-eye toggle-password" id="togglePassword"></i>
            </div>
            <div class="remember-me">
                <input type="checkbox" id="remember">
                <label for="remember">Recuérdame</label>
            </div>
            <form action="{{route('flyingmusic.music')}}">
                <button type="submit" class="submit-button">Registrarme</button>
            </form>
        </form>
        <div class="social-buttons">
            <a href="https://accounts.google.com" class="google">Registrarte con Google</a>
            <a href="https://www.facebook.com" class="facebook">Registrarte con Facebook</a>
            <a href="https://www.apple.com" class="apple">Registrarte con Apple</a>
        </div>
        <div class="footer">
            ¿Ya tienes una cuenta? <a href="{{route('flyingmusic.log_in')}}">Inicia sesión aquí.</a>
        </div>
    </div>
</body>