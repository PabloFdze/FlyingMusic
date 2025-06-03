<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Iniciar sesión - FlyingMusic</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
    <style>
        body {
            background: linear-gradient(to bottom right, #000000, #1a1a1a);
            color: #fff;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }
        .form-container {
            max-width: 450px;
            width: 100%;
            background-color: #222;
            padding: 2.5rem;
            border-radius: 1rem;
            box-shadow: 0 0 20px rgba(233, 30, 99, 0.3);
            text-align: center;
        }
        .form-container .logo {
            width: 80px;
            margin-bottom: 1rem;
        }
        h2 {
            font-weight: 700;
            margin-bottom: 2rem;
        }
        .text-pink {
            color: #e91e63;
        }
        .form-control {
            background-color: #333;
            color: #fff;
            border: 1px solid #555;
        }
        .form-control::placeholder {
            color: #aaa;
        }
        .form-check-label {
            color: #ddd;
            font-weight: 500;
        }
        .btn-primary {
            background-color: #e91e63;
            border: none;
            font-weight: 600;
            padding: 0.5rem;
        }
        .btn-primary:hover {
            background-color: #ff7dad;
        }
        .social-login form {
            margin-bottom: 0.5rem;
        }
        .social-login .btn {
            width: 100%;
            color: #fff;
            font-weight: 600;
            border-radius: 0.5rem;
            padding: 0.5rem;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            transition: background-color 0.3s ease;
        }
        .social-login .btn-google {
            background-color: #db4437;
        }
        .social-login .btn-google:hover {
            background-color: #e06b66;
        }
        .social-login .btn-facebook {
            background-color: #3b5998;
        }
        .social-login .btn-facebook:hover {
            background-color: #5a79be;
        }
        .social-login .btn-apple {
            background-color: #000;
            border: 1px solid #fff;
        }
        .social-login .btn-apple:hover {
            background-color: #333;
        }
        a.text-light {
            color: #bbb;
            transition: color 0.3s ease;
        }
        a.text-light:hover {
            color: #e91e63 !important;
            text-decoration: none;
        }
        p.mt-3 {
            color: #bbb;
        }
        p.mt-3 a {
            color: #e91e63;
            text-decoration: underline;
        }
        p.mt-3 a:hover {
            color: #ff7dad;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <form action="{{route('flyingmusic.index')}}">
            <button class="btn p-0 border-0 bg-transparent" type="submit">
                <img src="{{asset('img/flying.jpg')}}" alt="Logo de FlyingMusic" class="logo" />
            </button>
        </form>
        <h2>Inicia sesión en <span class="text-pink">FlyingMusic</span></h2>

        <div class="social-login mb-4">
            <form action="https://accounts.google.com" target="_blank" rel="noopener">
                <button type="submit" class="btn btn-google"><i class="fab fa-google"></i> Continuar con Google</button>
            </form>
            <form action="https://www.facebook.com" target="_blank" rel="noopener">
                <button type="submit" class="btn btn-facebook"><i class="fab fa-facebook-f"></i> Continuar con Facebook</button>
            </form>
            <form action="https://www.apple.com" target="_blank" rel="noopener">
                <button type="submit" class="btn btn-apple"><i class="fab fa-apple"></i> Continuar con Apple</button>
            </form>
        </div>

        <form action="{{ route('flyingmusic.log') }}" method="POST">
            @csrf
            <div class="mb-3 text-start">
                <label for="username" class="form-label">Correo electrónico</label>
                <input type="text" name="email" id="username" class="form-control" placeholder="Correo electrónico o nombre de usuario" required />
            </div>
            <div class="mb-3 text-start">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña" required />
            </div>
            <div class="form-check mb-3 text-start">
                <input type="checkbox" class="form-check-input" id="remember" name="remember" />
                <label class="form-check-label" for="remember">Recuérdame</label>
            </div>
            <button type="submit" class="btn btn-primary w-100 mb-3">Iniciar sesión</button>
            <a href="#" class="d-block text-light mb-3">¿Se te ha olvidado la contraseña?</a>
        </form>

        <p class="mt-3">
            ¿No tienes cuenta? 
            <a href="{{route('flyingmusic.sign_in')}}" class="text-decoration-underline">Vuelvete de la familia FlyingMusic</a>
        </p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


