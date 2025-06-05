<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Registro - FlyingMusic</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
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
        .register-container {
            max-width: 450px;
            width: 100%;
            background-color: #222;
            padding: 2.5rem;
            border-radius: 1rem;
            box-shadow: 0 0 20px rgba(233, 30, 99, 0.3);
            text-align: center;
        }
        .register-container .logo {
            width: 80px;
            margin-bottom: 1rem;
        }
        h1 {
            font-weight: 700;
            margin-bottom: 1rem;
        }
        h2 {
            margin-bottom: 2rem;
            font-weight: 500;
        }
        label {
            color: #ddd;
            font-weight: 500;
        }
        .form-control {
            background-color: #333;
            color: #fff;
            border: 1px solid #555;
        }
        .form-control::placeholder {
            color: #aaa;
        }
        .btn-primary {
            background-color: #e91e63;
            border: none;
            width: 100%;
            padding: 0.5rem;
            font-weight: 600;
        }
        .btn-primary:hover {
            background-color: #ff7dad;
        }
        .social-buttons a {
            display: block;
            margin: 0.5rem 0;
            padding: 0.5rem;
            border-radius: 0.5rem;
            text-decoration: none;
            font-weight: 600;
            color: #fff;
        }
        .social-buttons a.google { background-color: #db4437; }
        .social-buttons a.facebook { background-color: #3b5998; }
        .social-buttons a.apple { background-color: #000; border: 1px solid #fff; }

        .social-buttons a:hover {
            opacity: 0.85;
            color: #fff;
            text-decoration: none;
        }
        .footer {
            margin-top: 1.5rem;
            color: #bbb;
        }
        .footer a {
            color: #e91e63;
            text-decoration: underline;
        }
        .footer a:hover {
            color: #ff7dad;
            text-decoration: none;
        }
        .text-pink {
            color: #e91e63;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <form action="{{route('flyingmusic.index')}}">
            <button class="btn p-0 border-0 bg-transparent">
                <img src="{{asset('img/flying.jpg')}}" alt="Logo FlyingMusic" class="logo">
            </button>
        </form>
        <h1 class="text-pink">FlyingMusic</h1>
        <h2>Regístrate para empezar a escuchar contenido</h2>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="{{ route('flyingmusic.register') }}">
            @csrf
          <div class="mb-3 text-start">
    <label for="name" class="form-label">Nombre de usuario</label>
    <input type="text" name="name" id="name" class="form-control" placeholder="Nombre de usuario" required value="{{ old('name') }}">
    @error('name')
        <div class="text-danger mt-1">{{ $message }}</div>
    @enderror
    </div>

<div class="mb-3 text-start">
    <label for="email" class="form-label">Correo electrónico</label>
    <input type="email" name="email" id="email" class="form-control" placeholder="nombre@dominio.com" required value="{{ old('email') }}">
    @error('email')
        <div class="text-danger mt-1">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3 text-start">
    <label for="password" class="form-label">Contraseña</label>
    <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña" required>
    @error('password')
        <div class="text-danger mt-1">{{ $message }}</div>
    @enderror
</div>

<div class="mb-4 text-start">
    <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Repite la contraseña" required>
    {{-- No suele haber errores aquí directamente, se valida en 'password' --}}
</div>

            <button type="submit" class="btn btn-primary mb-3">Registrarme</button>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
