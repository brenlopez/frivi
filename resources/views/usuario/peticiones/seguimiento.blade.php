@extends('layouts.app')
@section('title', $peticion->titulo)

@section('content')
    <div class="container mt-5">
        <div class="row">
            @if (Session('status'))
                <div class="alert alert-{{ Session('type') }} alert-dismissible fade show" role="alert">
                    {{ Session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <h1>Seguimiento del pedido</h1>
            <div class="card">
                <div class="card-body">

                    <div class="container pb-4 pt-4">
                        <ul class="progressbar">
                            @if ($peticion->estados->estado_id == 2)
                                <li class="active">En espera</li>
                                <li>Compra realizada</li>
                                <li>Pedido entregado</li>
                            @elseif($peticion->estados->estado_id == 3)
                                <li class="active">En espera</li>
                                <li class="active">Compra realizada</li>
                                <li>Pedido entregado</li>
                            @elseif($peticion->estados->estado_id == 4)
                                <li class="active">En espera</li>
                                <li class="active">Compra realizada</li>
                                <li class="active">Pedido entregado</li>
                            @endif
                        </ul>
                    </div>

                    <h2>{{ $peticion->titulo }}</h2>
                    <ul>
                        <li> Descripción: {{ $peticion->descripcion }}</li>
                        <li> Monto máximo: ${{ $peticion->monto_maximo }}</li>
                        @if ($peticion->voluntario_id == $usuario)
                            <li> Usuario : {{ $peticion->usuario->nombre }} {{ $peticion->usuario->apellido }}</li>
                            <li> Entregar en : {{ $peticion->ubicacion }}</li>
                        @elseif ($peticion->usuario_id == $usuario)
                            <li> Voluntario : {{ $peticion->voluntario->nombre }} {{ $peticion->voluntario->apellido }}</li>
                        @endif
                    </ul>

                    @if ($peticion->voluntario_id == $usuario && $peticion->estado_id == 2)
                        <h3 class="h4 pt-3">Cargar ticket</h3>
                        <p>Sacá una foto al ticket de compra y luego cargala para que tu vecino pueda saber que monto debe
                            darte cuando
                            entregues el pedido.</p>

                        <form action="{{ route('form.cargar.imagen') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="text" class="visually-hidden" value="{{ $peticion->peticion_id }}"
                                name="peticion_id">
                            <label for="ticket" class="visually-hidden">Cargar foto</label>
                            <input type="file" class="form-control" id="ticket" name="imagen" required>
                            <button type="submit" class="btn btn-primary mt-4">Cargar imagen</button>
                        </form>
                    @endif

                    @if ($peticion->estado_id == 3 || $peticion->estado_id == 4)
                        <h3>Ticket cargado</h3>
                        <img src="{{ asset('asset/img/orders/' . $peticion->imagen) }}" alt="{{ $peticion->titulo }}">
                    @endif

                    {{-- Boton voluntario --}}
                    @if ($peticion->voluntario_id == $usuario && $peticion->estado_id == 3)
                        <button class="btn btn-primary mt-4 d-block" data-bs-toggle="modal"
                            data-bs-target="#entregado">Pedido entregado</button>
                    @endif


                    {{-- Boton usuario --}}
                    @if ($peticion->usuario_id == $usuario && $peticion->estado_id == 3)
                        <button class="btn btn-primary mt-4 d-block" data-bs-toggle="modal"
                            data-bs-target="#entregado">Pedido recibido</button>
                    @endif


                </div>
            </div>
        </div>
    </div>

    <!-- Modal Calificar -->
    <div class="modal fade" id="entregado" tabindex="-1" aria-labelledby="entregadoLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('form.calificar') }}" method="POST" class="calificar">
                <div class="modal-content">
                    <div class="modal-header">
                        @if ($peticion->voluntario_id == $usuario && $peticion->estado_id == 3)
                            <h1 class="modal-title fs-5" id="entregadoLabel">Calificá a {{ $peticion->usuario->nombre }}
                                {{ $peticion->usuario->apellido }}</h1>
                        @elseif ($peticion->usuario_id == $usuario && $peticion->estado_id == 3)
                            <h1 class="modal-title fs-5" id="recibidoLabel">Calificá a {{ $peticion->voluntario->nombre }}
                                {{ $peticion->voluntario->apellido }}</h1>
                        @endif
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Para finalizar la compra calificá a tu vecino según como haya sido tu experiencia con él.</p>
                        @csrf
                        <p class="clasificacion">
                            <input id="radio1" type="radio" name="estrellas" value="5">
                            <!--
                                                                                                                                                                                                    --><label
                                for="radio1">★</label>
                            <!--
                                                                                                                                                                                                    --><input
                                id="radio2" type="radio" name="estrellas" value="4">
                            <!--
                                                                                                                                                                                                    --><label
                                for="radio2">★</label>
                            <!--
                                                                                                                                                                                                    --><input
                                id="radio3" type="radio" name="estrellas" value="3">
                            <!--
                                                                                                                                                                                                    --><label
                                for="radio3">★</label>
                            <!--
                                                                                                                                                                                                    --><input
                                id="radio4" type="radio" name="estrellas" value="2">
                            <!--
                                                                                                                                                                                                    --><label
                                for="radio4">★</label>
                            <!--
                                                                                                                                                                                                    --><input
                                id="radio5" type="radio" name="estrellas" value="1">
                            <!--
                                                                                                                                                                                                    --><label
                                for="radio5">★</label>
                        </p>
                        @if ($peticion->voluntario_id == $usuario && $peticion->estado_id == 3)
                            <input type="number" name="rol" value='1' class="visually-hidden">
                            <input type="text" name='usuario' value='{{ $peticion->usuario_id }}'
                                class="visually-hidden">
                            <input type="text" name='peticion' value='{{ $peticion->peticion_id }}'
                                class="visually-hidden">
                        @elseif ($peticion->usuario_id == $usuario && $peticion->estado_id == 3)
                            <input type="number" name="rol" value='2' class="visually-hidden">
                            <input type="text" name='usuario' value='{{ $peticion->voluntario_id }}'
                                class="visually-hidden">
                            <input type="text" name='peticion' value='{{ $peticion->peticion_id }}'
                                class="visually-hidden">
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Atrás</button>
                        <button type="submit" class="btn btn-primary">Calificar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
