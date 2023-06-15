@extends('layouts.app')
@section('title', 'Home')


@section('content')
    <section class="container mt-5">
        @if (Session('status'))
            <div class="alert alert-{{ Session('type') }} alert-dismissible fade show" role="alert">
                {{ Session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="welcome-user">
            <div class="img-user-home">
                @if ($imagen == null)
                    <img src="{{ asset('assets/img/user-img.png') }}" alt="foto de perfil">
                @else
                    <img src="{{ asset('assets/img/' . $imagen) }}" alt="foto de perfil">
                @endif
            </div>
            <div class="user-info-home">
                <p class="mb-0">Buenos días</p>
                <p class="h4 ">{{ $nombre }} {{ $apellido }}</p>
                <p><i class="pe-7s-map-marker"></i> Ubicación actual</p>
            </div>
        </div>
        <div class="home-content">
            <h1>¿Qué querés hacer el día de hoy?</h1>

            <div class="tabs-home">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link  active" id="compra-tab" data-bs-toggle="tab"
                            data-bs-target="#compra-tab-pane" type="button" role="tab" aria-controls="compra-tab-pane"
                            aria-selected="false">Compras</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="peticion-tab" data-bs-toggle="tab" data-bs-target="#peticion-tab-pane"
                            type="button" role="tab" aria-controls="peticion-tab-pane"
                            aria-selected="true">Peticiones</button>
                    </li>
                </ul>
            </div>
            <div class="tab-content" id="myTabContent">
                {{-- Peticiones --}}
                <div class="tab-pane fade" id="peticion-tab-pane" role="tabpanel" aria-labelledby="peticion-tab"
                    tabindex="0">
                    <div class="crear-peticion">
                        <div>
                            <a href="{{ route('form.crear.peticion') }}" class="d-flex justify-content-between">Crear una
                                petición <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>

                    <h2 class="mt-5">Mis peticiones</h2>

                    @foreach ($peticiones as $peticion)
                        @if ($peticion->usuario_id == $usuario_auth)
                            <div class="card mt-3 p-4">
                                <h3>{{ $peticion->titulo }}</h3>
                                <p>Descripción: {{ $peticion->descripcion }}</p>
                                <p>Fecha petición: {{ $peticion->fecha_peticion }}</p>
                                <p>Monto máximo: ${{ $peticion->monto_maximo }}</p>
                                <p>Tiempo de espera: {{ $peticion->tiempo_maximo }} Horas</p>
                                {{-- <p>Lugar de entrega: {{ $peticion->ubicacion }}</p> --}}
                                <p>Aclaración: {{ $peticion->aclaracion }}</p>
                                @if ($peticion->estados->estado_id !== 1)
                                    <a href="{{ route('seguir.peticion', ['id' => $peticion->peticion_id]) }}"
                                        class="btn btn-primary w-25">Seguir pedido</a>
                                @endif
                            </div>
                        @endif
                    @endforeach
                </div>

                {{-- Compra --}}
                <div class="tab-pane fade  show active" id="compra-tab-pane" role="tabpanel" aria-labelledby="compra-tab"
                    tabindex="0">

                    <form action="{{ url('/home/' . $busqueda) }}" method="GET">
                        <label for="busqueda" class="visually-hidden">Destino</label>
                        <div class="d-flex mt-5 justify-content-center w-100">
                            <input type="text" name="busqueda" id="busqueda" placeholder="Ingresar destino"
                                class="form-control">
                            <button type="submit" class="btn btn-secondary"><i class="fa fa-search"></i></button>
                        </div>
                    </form>

                    <h2 class="mt-5">Ayudá a un vecino</h2>
                    <ul>
                        @foreach ($busqueda as $resultado)
                            @if ($resultado->usuario_id !== $usuario_auth && $resultado->estado_id == 1)
                                <li>Ayudá a {{ $resultado->usuario->nombre }} {{ $resultado->usuario->apellido }}</li>
                                <li>Titulo: {{ $resultado->titulo }}</li>
                                <li>Detalle: {{ $resultado->descripcion }}</li>

                                <li>
                                    <form action="{{ route('enviar.oferta') }}" method="post">
                                        @csrf
                                        <input type="text" value="{{ $usuario_auth }}" name="voluntario_id"
                                            class="visually-hidden">
                                        <input type="text" value="{{ $resultado->peticion_id }}" name="peticion_id"
                                            class="visually-hidden">
                                        <button type="submit" class="btn btn-primary">Ofrecer ayuda</button>
                                    </form>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

    </section>
@endsection
