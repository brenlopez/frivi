@extends('layouts.app')
@section('title', 'Notificaciones')

@section('content')

    <div class="container mt-5">
        <div class="row">
            <h1>Notificaciones</h1>
            @foreach ($notificaciones as $notificacion)
                @if ($usuario_auth == $notificacion->peticion->usuario_id && $notificacion->peticion->estado_id == 1)
                    <div class="col-12 card p-3 mb-3">
                        <h2 class="h4"><i class="fa fa-envelope"></i> ¡{{ $notificacion->usuario->nombre }}
                            {{ $notificacion->usuario->apellido }} se ofreció a
                            ayudarte!</h2>
                        <ul>
                            <li>{{ $notificacion->peticion->titulo }}</li>
                            <li>{{ $notificacion->peticion->descripcion }}</li>
                        </ul>

                        <form action="{{ route('aceptar.voluntario') }}" method="post">
                            @csrf
                            <input type="text" class="visually-hidden" value="{{ $notificacion->peticion_id }}"
                                name="peticion">
                            <input type="text" class="visually-hidden" value="{{ $notificacion->usuario->usuario_id }}"
                                name="voluntario_id">
                            <input type="text" class="visually-hidden" value="{{ $notificacion->peticion->peticion_id }}"
                                name="peticion_id">
                            <button type="submit" class="btn btn-primary w-25">Aceptar ayuda</button>
                        </form>
                    </div>
                @elseif($usuario_auth == $notificacion->peticion->usuario_id && $notificacion->peticion->estado_id == 2)
                    <div class="col-12 card p-3 mb-3">
                        <h2 class="h4"><i class="fa fa-envelope"></i> ¡{{ $notificacion->usuario->nombre }}
                            {{ $notificacion->usuario->apellido }} aceptó tu ayuda!</h2>
                        <ul>
                            <li>{{ $notificacion->peticion->titulo }}</li>
                            <li>{{ $notificacion->peticion->descripcion }}</li>
                        </ul>

                        <a href="#" class="btn btn-primary w-25">Seguir pedido</a>

                        {{-- <form action="#" method="post">
                            @csrf
                            <input type="text" class="visually-hidden" value="{{ $notificacion->peticion_id }}"
                                name="peticion">
                            <input type="text" class="visually-hidden" value="{{ $notificacion->usuario->usuario_id }}"
                                name="voluntario_id">
                            <input type="text" class="visually-hidden"
                                value="{{ $notificacion->peticion->peticion_id }}" name="peticion_id">
                            <button type="submit" class="btn btn-primary w-25">Aceptar ayuda</button>
                        </form> --}}
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection
