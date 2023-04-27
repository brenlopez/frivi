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
            <h1>¿Qué quieres hacer el día de hoy?</h1>

            <div class="tabs-home">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="peticion-tab" data-bs-toggle="tab"
                            data-bs-target="#peticion-tab-pane" type="button" role="tab"
                            aria-controls="peticion-tab-pane" aria-selected="true">Peticiones</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="compra-tab" data-bs-toggle="tab" data-bs-target="#compra-tab-pane"
                            type="button" role="tab" aria-controls="compra-tab-pane"
                            aria-selected="false">Compras</button>
                    </li>
                </ul>
            </div>
            <div class="tab-content" id="myTabContent">
                {{-- Peticiones --}}
                <div class="tab-pane fade show active" id="peticion-tab-pane" role="tabpanel" aria-labelledby="peticion-tab"
                    tabindex="0">
                    <div class="crear-peticion">
                        <div>
                            <a href="{{ route('form.crear.peticion') }}" class="d-flex justify-content-between">Crear una
                                petición <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>

                    <h2 class="mt-5">Mis peticiones</h2>
                    <ul class="card mt-3">
                        @foreach ($peticiones as $peticion)
                            <li>Titulo: {{ $peticion->titulo }}</li>
                            <li>Descripción: {{ $peticion->descripcion }}</li>
                            <li>Fecha petición: {{ $peticion->fecha_peticion }}</li>
                            <li>Monto máximo: ${{ $peticion->monto_maximo }}</li>
                            <li>Tiempo de espera: {{ $peticion->tiempo_maximo }} Horas</li>
                            {{-- <li>Lugar de entrega: {{ $peticion->ubicacion }}</li> --}}
                            <li>Aclaración: {{ $peticion->aclaración }}</li>
                        @endforeach
                    </ul>
                </div>

                {{-- Compra --}}
                <div class="tab-pane fade" id="compra-tab-pane" role="tabpanel" aria-labelledby="compra-tab" tabindex="0">
                    Compra</div>
            </div>
        </div>

    </section>
@endsection
