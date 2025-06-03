
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="{{ route('flyingmusic.index') }}">
            <img src="{{ asset('img/flying.jpg') }}" alt="Logo" width="40" height="40" class="rounded-circle me-2">
            <span class="fw-bold">FlyingMusic</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarFlying" aria-controls="navbarFlying" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarFlying">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('flyingmusic.music') }}">Música</a>
                </li>

                @auth
                    <li class="nav-item">
                        <span class="nav-link disabled text-light">Hola, {{ Auth::user()->name }}</span>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-outline-light ms-2">Cerrar sesión</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('flyingmusic.login') }}">Iniciar sesión</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary ms-2" href="{{ route('flyingmusic.sign_in') }}">Registrarse</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
