<nav class="navbar navbar-expand-lg bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Frivi</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
            aria-controls="offcanvasRight"><span class="navbar-toggler-icon"></span></button>

        <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasRight"
            aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
                <div class="info-user-offcanvas">
                    <div class="img-user-nav">
                        @if (Auth::user()->foto_perfil == null)
                            <img src="{{ asset('assets/img/user-img.png') }}" alt="foto de perfil">
                        @else
                            <img src="{{ asset('assets/img/users/' . Auth::user()->foto_perfil) }}"
                                alt="foto de perfil">
                        @endif
                    </div>
                    <div class="user-info-nav">
                        <span>Buenos dias</span>
                        <p>{{ Auth::user()->nombre }} {{ Auth::user()->apellido }}</p>
                        <p><i class="icon-pin"></i> Ubicación actual</p>
                    </div>
                </div>
            </div>
            <div class="offcanvas-body">
                @auth
                    <div class="" id="navbarNav">
                        <ul class="navbar-nav">
                            <li><a href=""><i class="icon-tags"></i> Beneficios</a></li>
                            <li><a href=""><i class="icon-help"></i> Soporte</a></li>
                            <li><a href=""><i class="icon-tool"></i> Configuración</a></li>
                        </ul>
                    </div>
                    <div class="logout-nav">
                        <form action="{{ route('auth.cerrar.sesion') }}" method="post">
                            @csrf
                            <button type="submit"><i class="icon-logout"></i> Cerrar Sesión</button>
                        </form>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</nav>
