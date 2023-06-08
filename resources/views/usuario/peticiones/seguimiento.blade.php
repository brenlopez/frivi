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
                        <li> Usuario : {{ $peticion->usuario->nombre }} {{ $peticion->usuario->apellido }}</li>
                        <li> Entregar en : {{ $peticion->ubicacion }}</li>
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
                            <input type="file" class="form-control" id="ticket" name="imagen">
                            <button type="submit" class="btn btn-primary mt-4">Cargar imagen</button>
                        </form>
                    @endif

                    @if ($peticion->estado_id == 3)
                        <h3>Ticket cargado</h3>
                        <img src="{{ asset('asset/img/' . $peticion->imagen) }}" alt="{{ $peticion->titulo }}">
                    @endif

                    @if ($peticion->voluntario_id == $usuario && $peticion->estado_id == 3)
                        <button class="btn btn-primary mt-4 d-block">Pedido entregado</button>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
