<nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Frivi</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                @auth
                    <li class="nav-item">
                        <form action="{{ route('auth.cerrar.sesion') }}" method="post">
                            @csrf
                            <button type="submit" class="nav-link btn">Cerrar Sesion</button>
                        </form>
                    </li>
                    @elseguest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('auth.login') }}">iniciar Sesión</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
