<div class="sidebar">
    <a href="{{ route('home') }}" class="logo"><img src="{{ asset('assets/img/brand/logo.svg') }}" alt="Frivi"></a>
    <div class="welcome-user">
        <div class="img-user-nav">
            @if (Auth::user()->foto_perfil == null)
                <img src="{{ asset('assets/img/user-img.png') }}" alt="foto de perfil">
            @else
                <img src="{{ asset('assets/img/users/' . Auth::user()->foto_perfil) }}" alt="foto de perfil">
            @endif
        </div>
        <div class="user-info-nav">
            <p>{{ Auth::user()->nombre }} {{ Auth::user()->apellido }}</p>
            <p><i class="icon-pin"></i> Ubicación actual</p>
        </div>
    </div>
    <nav class="desktop-nav">
        <ul>
            @auth
                <li class="{{ Request::routeIs('home') ? 'active' : '' }}"><a href="{{ route('home') }}"><i
                            class="icon-home"></i> Home</a></li>
                <li class="{{ Request::routeIs('notificaciones') ? 'active' : '' }}"><a
                        href="{{ route('notificaciones') }}"><i class="icon-bell"></i> Notificaciones</a></li>
                <li><a href=""><i class="icon-bag"></i> Peticiones</a></li>
                <li><a href=""><i class="icon-user"></i> Perfil</a></li>
                <li><a href=""><i class="icon-tags"></i> Beneficios</a></li>
                <li><a href=""><i class="icon-help"></i> Soporte</a></li>
                <li><a href=""><i class="icon-tool"></i> Configuración</a></li>

                <li class="logout-nav">
                    <form action="{{ route('auth.cerrar.sesion') }}" method="post">
                        @csrf
                        <button type="submit"><i class="icon-logout"></i> Cerrar Sesión</button>
                    </form>
                </li>
                @elseguest
                <li>
                    <a class="nav-link" href="{{ route('auth.login') }}">iniciar Sesión</a>
                </li>
            @endauth
        </ul>
    </nav>
</div>

{{-- Navbar mobile --}}

<nav class="mobile-nav fixed-bottom">
    <ul>
        @auth
            <li class="{{ Request::routeIs('home') ? 'active' : '' }}"><a href="{{ route('home') }}"><i
                        class="icon-home"></i></a></li>
            <li class="{{ Request::routeIs('notificaciones') ? 'active' : '' }}"><a
                    href="{{ route('notificaciones') }}"><i class="icon-bell"></i></a></li>
            <li><a href=""><i class="icon-bag"></i></a></li>
            <li><a href=""><i class="icon-user"></i></a></li>
        @endauth
    </ul>
</nav>
