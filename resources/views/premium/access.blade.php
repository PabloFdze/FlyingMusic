<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Acceso Premium - FlyingMusic</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background: linear-gradient(to bottom right, #000000, #1a1a1a);
            color: #fff;
        }
        .form-container {
            max-width: 450px;
            background-color: #222;
            padding: 2rem;
            border-radius: 1rem;
            margin: 4rem auto;
            box-shadow: 0 0 20px rgba(233, 30, 99, 0.3);
        }
        .logo {
            width: 80px;
            margin-bottom: 1rem;
        }
        .btn-primary {
            background-color: #e91e63;
            border: none;
        }
        .btn-primary:hover {
            background-color: #ff7dad;
        }
        .form-control {
            background-color: #333;
            color: #fff;
            border: 1px solid #555;
        }
        .form-control::placeholder {
            color: #aaa;
        }
        .error-box {
            background-color: #440000;
            padding: 1rem;
            margin-bottom: 1rem;
            border-radius: 0.5rem;
            color: #ff7dad;
        }
        .info-box {
            font-size: 0.9rem;
            color: #ccc;
            margin-top: 1rem;
        }
        a.text-light:hover {
            color: #e91e63 !important;
            text-decoration: none;
        }

        .text-pink {
            color: #e91e63;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container text-center">
            <form action="{{route('flyingmusic.index')}}">
                <button class="btn p-0 border-0 bg-transparent">
                    <img src="{{asset('img/flying.jpg')}}" alt="Logo de FlyingMusic" class="logo">
                </button>
            </form>

            <h2 class="mb-4">Accede a <span class="text-pink">FlyingMusic</span> Premium</h2>

            @if ($errors->any())
                <div class="error-box text-start">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('premium.upgrade') }}">
                @csrf
                <div class="mb-3 text-start">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="nombre@dominio.com" required>
                </div>
                <div class="mb-3 text-start">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña" required>
                </div>
                  <hr class="text-light">
    <p class="text-start text-light fw-bold">Información de tarjeta</p>

    <div class="mb-3 text-start">
        <label for="cardName" class="form-label">Nombre en la tarjeta</label>
        <input type="text" id="cardName" class="form-control" placeholder="Ej: Juan Pérez" required>
    </div>

    <div class="mb-3 text-start">
        <label for="cardNumber" class="form-label ">Número de tarjeta</label>
        <input type="text" id="cardNumber" class="form-control " placeholder="1234 5678 9012 3456" required>
    </div>

    <div class="row mb-3">
        <div class="col-6 text-start">
            <label for="cardExpiry" class="form-label ">Fecha de expiración</label>
            <input type="text" id="cardExpiry" class="form-control " placeholder="MM/AA" required>
        </div>
        <div class="col-6 text-start">
            <label for="cardCVV" class="form-label ">CVV</label>
            <input type="text" id="cardCVV" class="form-control " placeholder="123" required>
        </div>
    </div>
                <button type="submit" class="btn btn-primary w-100">Hacerse Premium</button>
            </form>

            <div class="info-box mt-3">
                Esta suscripción es simulada. No se realizará ningún cargo real. Tu información está segura y solo se usará para fines demostrativos.
            </div>

            <p class="mt-3">
                <a href="{{route('flyingmusic.index')}}" class="text-decoration-underline text-light">Volver al inicio</a>
            </p>
        </div>
    </div>
</body>
</html>
