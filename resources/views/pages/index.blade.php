<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FlyingMusic</title>
    <link rel="stylesheet" href="{{ asset('css/pages_index.css') }}">
   
</head>
<body>
    <header>
        <div class="header-container">
            <div class="title-container">
                <div class="logo-title-container">
                <img src="{{ asset('img/flying.jpg') }}" alt="FlyingMusic Logo" class="logo-image">
                </div>
                <div class="logo">FlyingMusic</div>
            </div>
            <nav>
                <ul>
                    <li><a href="{{route('flyingmusic.sign_in')}}"><button class="primary-btn-header">Registrarse</button></a></li>
                    <li><a href="{{route('flyingmusic.log_in')}}"><button class="primary-btn-header">Iniciar sesión</button></a></li>
                </ul>
            </nav>
        </div>
    </header>
    
    <main>
        <section class="hero">
            <div class="hero-content">
                <h1>Prepárate para volar.</h1>
                <p>Prueba Premium Individual gratis durante 1 mes.</p>
                <p>Después, solo 10,99 €/mes. Cancelas cuando quieras.</p>
                <div class="buttons">
                    <form action="{{route('flyingmusic.log_in')}}">
                        <button class="primary-btn">Probar gratis durante 1 mes</button>
                    </form>
                </div>
                <p class="disclaimer"> <a href="{{asset('pdf/Condiciones FlyingMusic.pdf')}}">Consulta las condiciones.</a></p>
            </div>
            <div class="hero-images">
                <img src="img/" alt="">
            </div>
            <br>
            <br>
        </section>
        <h2 class="plan-title">Elige tu plan</h2>
        <section class="plans">
            <div class="plan-cards">
                <div class="plan-card">
                    <div class="plan-header">Gratis</div>
                        <div class="plan-body">
                            <h3>Para todos</h3>
                            <ul>
                                <li>Escucha música gratis</li><br>
                                <li>Anuncios cada 30 minutos</li><br>
                                <li>Sin límite de saltos</li><br>
                                <li>Toda la música a tu disposición</li><br>
                            </ul>
                            <form action="{{route('flyingmusic.log_in')}}">
                            <button class="primary-btn">Registrate</button>
                            </form>
                        </div>
                    </div>
                </div>
            <div class="plan-card">
                <div class="plan-header">Gratis durante 1 mes</div>
                    <div class="plan-body">
                        <h3>Individual</h3>
                        <ul>
                            <li>Gratis durante 1 mes</li><br>
                            <li>Después, 10,99 €/mes</li><br>
                            <li>1 cuenta Premium</li><br>
                            <li>Cancela cuando quieras</li><br>
                        </ul>
                        <form action="{{route('flyingmusic.log_in')}}">
                            <button class="primary-btn">Probar gratis durante 1 mes</button>
                        </form>
                        <p class="disclaimer"><a href="{{asset('pdf/Condiciones FlyingMusic.pdf')}}">Consulta las condiciones.</a></p>
                    </div>
                </div>
            </div>
                <div class="plan-card">
                    <div class="plan-header">Gratis durante 1 mes</div>
                    <div class="plan-body">
                        <h3>Estudiantes</h3>
                        <ul>
                            <li>Gratis durante 1 mes</li><br>
                            <li>Después, 5,99 €/mes</li><br>
                            <li>1 cuenta Premium verificada</li><br>
                            <li>Descuento para estudiantes que cumplan los requisitos</li><br>
                            <li>Cancela cuando quieras</li><br>
                        </ul>
                        <form action="{{route('flyingmusic.log_in')}}">
                            <button class="secondary-btn">Probar gratis durante 1 mes</button>
                        </form>
                        <p class="disclaimer"> <a href="{{asset('pdf/Condiciones FlyingMusic.pdf')}}">Consulta las condiciones.</a></p>
                    </div>
                </div>
            </div>
                <div class="plan-card">
                    <div class="plan-header">Gratis durante 1 mes</div>
                    <div class="plan-body">
                        <h3>Familiar</h3>
                        <ul>
                            <li>17,99 €/mes</li><br>
                            <li>Hasta 6 cuentas Premium</li><br>
                            <li>Controla el contenido etiquetado como explícito</li><br>
                            <li>Cancela cuando quieras</li><br>
                        </ul>
                        <form action="{{route('flyingmusic.log_in')}}"><button class="secondary-btn">Conseguir Premium Familiar</button></form>
                    </div>
                </div>
            </div>
        </section>
    </main>
    
    <footer>
        <p>&copy; 2024 FlyingMusic Online. Todos los derechos reservados.</p>
    </footer>
</body>