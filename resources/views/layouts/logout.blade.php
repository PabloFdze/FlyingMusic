


<!-- Logo y navegación -->
    <nav class="navbar navbar-dark shadow-sm">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <form action="{{ route('flyingmusic.index') }}" method="GET" class="m-0">
                <button class="btn logo-btn p-0 border-0 bg-transparent" type="submit">
                    <img src="{{ asset('img/flying.jpg') }}" alt="FlyingMusic Logo">
                </button>
            </form>
            <span class="text-white">Bienvenido, @auth {{ Auth::user()->name }} @endauth</span>
        </div>
    </nav>
