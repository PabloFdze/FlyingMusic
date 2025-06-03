<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FlyingMusic</title>
    <link rel="stylesheet" href="{{ asset('css/pages_log_in.css') }}">
</head>
<body>
    <div class="login-container">
        <div class="login-form">
            <form action="{{route('flyingmusic.index')}}">
                <button class="logo">
                <img src="{{asset('img/flying.jpg')}}" alt="Logo de FlyingMusic" class="logo"></img>
                </button>
            </form>
            <h2>Inicia sesión en FlyingMusic</h2>
            <div class="social-login">
                <form action="https://accounts.google.com"><button class="btn google">Continuar con Google</button></form>
                <form action="https://www.facebook.com"><button class="btn facebook">Continuar con Facebook</button></form>
                <form action="https://www.apple.com"><button class="btn apple">Continuar con Apple</button></form>
            </div>
            <form action="{{ route('flyingmusic.log') }}" method="POST">
                @csrf
                <div class="input-group">
                    <label for="username">Correo electrónico o nombre de usuario</label>
                    <input type="text" id="username" placeholder="Correo electrónico o nombre de usuario" required>
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
               
                <button type="submit" class="btn login">Iniciar sesión</button>
                
                <a href="#" class="forgot-password">¿Se te ha olvidado la contraseña?</a>
            </form>
            <div class="signup-link">
                <p>¿No tienes cuenta? <a href="{{route('flyingmusic.sign_in')}}">Vuelvete de la familia FlyingMusic</a></p>
            </div>
        </div>
    </div>

</body>