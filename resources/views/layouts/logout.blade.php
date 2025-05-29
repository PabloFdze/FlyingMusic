<nav>
    @if(Auth::check())
        <span>Hola, {{ Auth::user()->name }}</span>
        <form method="POST" action="{{ route('logout') }}" style="display: inline;">
            @csrf
            <button type="submit">Cerrar sesión</button>
        </form>
    @else
        <a href="{{ route('flyingmusic.login') }}">Iniciar sesión</a> |
        <a href="{{ route('flyingmusic.sign_in') }}">Registrarse</a>
    @endif
</nav>