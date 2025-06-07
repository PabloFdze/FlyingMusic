<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>FlyingMusic</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
   
    <style>
        body {
            background: linear-gradient(to bottom right, #000000, #383737);
            color: #fff;
            padding-top: 80px;
        }
        .navbar {
            background-color: #111 !important;
        }
        .btn-primary {
            background-color: #e91e63;
            border: none;
        }
        .btn-primary:hover {
            background-color: #ff7dad;
        }
        .btn-outline-light {
            border-color: #fff;
            color: #fff;
        }
        .btn-outline-light:hover {
            background-color: #e91e63;
            border-color: #e91e63;
            color: #fff;
        }
        .card.bg-dark {
            background-color: #222 !important;
            color: #eee !important;
            transition: transform 0.3s ease-in-out;
            cursor: default;
        }
        .card.bg-dark:hover {
            transform: scale(1.05);
        }
        footer {
            background-color: #111;
            color: #bbb;
            padding: 3rem 0;
        }
        a.text-light:hover {
            color: #e91e63 !important;
            text-decoration: none;
        }
        .text-pink {
            color: #f80778;
        }

        .btn-custom-color {
            background-color: none;
            color: white;
            border-color: #fff
        }
        .btn-custom-color:hover {
            background-color: #f7015f;
            color: rgb(255, 255, 255);
        }

        @keyframes pulseWidth {
        0%, 100% {
        transform: scaleX(1);
        }
        50% {
        transform: scaleX(1.05);
        }
        }
    

.btn-animate-width {
  animation: pulseWidth 2s ease-in-out infinite;
  transform-origin: center;
}

    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="{{ asset('img/flying.jpg') }}" alt="FlyingMusic" height="40" class="me-2" />
                FlyingMusic
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
           
                <div class="d-flex">
                    <a href="{{ route('flyingmusic.sign_in') }}" class="btn btn-outline-light me-2">Registrarse</a>
                    <a href="{{ route('flyingmusic.login') }}" class="btn btn-primary">Iniciar sesión</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero -->
    <section class="text-center py-5">
        <div class="container">
            <h1 class="display-4 fw-bold mb-3 animate__animated animate__fadeIn">Prepárate para volar.</h1>
            <p class="lead mb-2">Prueba Premium Individual gratis durante 1 mes.</p>
            <p class="lead mb-4">Después, solo 10,99 €/mes. Cancelas cuando quieras.</p>
            <form action="{{ route('premium.access') }}">
                <button type="submit" class="btn btn-primary btn-lg" id="PorbarGratis">Probar gratis durante 1 mes</button>
            </form>
            <div class="mt-3">
                <a href="{{ asset('pdf/Condiciones FlyingMusic.pdf') }}" class="text-decoration-underline text-secondary">Consulta las condiciones</a>
            </div>
        </div>
    </section>

    <!-- Planes -->
    <section class="container text-center mb-5">
        <h2 class="mb-4">Elige tu plan</h2>
        <div class="row g-4 justify-content-center">
            <div class="col-md-3">
                <div class="card bg-dark text-light">
                    <div class="card-body">
                        <h5 class="card-title text-pink">Gratis</h5>
                        <p>Para todos</p>
                        <ul class="text-start">
                            <li>Escucha música gratis</li>
                            <li>Anuncios cada 30 minutos</li>
                            <li>Sin límite de saltos</li>
                            <li>Toda la música a tu disposición</li>
                        </ul>
                        <form action="{{ route('flyingmusic.sign_in') }}">
                            <button type="submit" class="btn btn-custom-color w-100">Regístrate</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card bg-dark text-light">
                    <div class="card-body">
                        <h5 class="card-title text-pink">Individual</h5>
                        <p>Gratis durante 1 mes, luego 10,99 €/mes.</p>
                        <ul class="text-start">
                            <li>1 cuenta Premium</li>
                            <li>Cancela cuando quieras</li>
                        </ul>
                        <form action="{{ route('premium.access') }}">
                            <button type="submit" class="btn btn-custom-color w-100">Probar gratis durante 1 mes</button>
                        </form>
                        <p class="mt-2"><a href="{{ asset('pdf/Condiciones FlyingMusic.pdf') }}" class="text-secondary text-decoration-underline">Consulta las condiciones</a></p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card bg-dark text-light">
                    <div class="card-body">
                        <h5 class="card-title text-pink">Estudiantes</h5>
                        <p>Gratis durante 1 mes, luego 5,99 €/mes.</p>
                        <ul class="text-start">
                            <li>1 cuenta Premium verificada</li>
                            <li>Descuento para estudiantes que cumplan los requisitos</li>
                            <li>Cancela cuando quieras</li>
                        </ul>
                        <form action="{{ route('premium.access') }}">
                            <button type="submit" class="btn btn-custom-color w-100">Probar gratis durante 1 mes</button>
                        </form>
                        <p class="mt-2"><a href="{{ asset('pdf/Condiciones FlyingMusic.pdf') }}" class="text-secondary text-decoration-underline">Consulta las condiciones</a></p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card bg-dark text-light">
                    <div class="card-body">
                        <h5 class="card-title text-pink">Familiar</h5>
                        <p>17,99 €/mes.</p>
                        <ul class="text-start">
                            <li>Hasta 6 cuentas Premium</li>
                            <li>Controla el contenido etiquetado como explícito</li>
                            <li>Cancela cuando quieras</li>
                        </ul>
                        <form action="{{ route('premium.access') }}">
                            <button type="submit" class="btn btn-custom-color w-100">Conseguir Premium Familiar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container text-center">
            <div class="row">
                <div class="col-md-4 mb-3 mb-md-0">
                    <h5>FlyingMusic</h5>
                    <p>Tu destino para disfrutar la mejor música.</p>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <h5>Menú</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-light">Inicio</a></li>
                        <li><a href="#" class="text-light">Planes</a></li>
                        <li><a href="#" class="text-light">Términos</a></li>
                        <li><a href="#" class="text-light">Ayuda</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Síguenos</h5>
                    <a href="https://www.facebook.com/?locale=es_ES" class="text-light me-2"><i class="fab fa-facebook"></i></a>
                    <a href="https://x.com/?lang=es" class="text-light me-2"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.instagram.com/" class="text-light"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <hr class="bg-secondary" />
            <p class="mb-0">&copy; <span id="year"></span> FlyingMusic. Todos los derechos reservados.</p>
        </div>
    </footer>
    <script src="{{ asset('js/indexbutton.js') }}"></script>
    <script src="{{ asset('js/indexpremiumbtn.js') }}"></script>
    <script src="{{ asset('js/autoyear.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
