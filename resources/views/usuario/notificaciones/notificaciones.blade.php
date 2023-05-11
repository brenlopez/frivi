@extends('layouts.app')
@section('title', 'Notificaciones')

@section('content')

    <div class="container mt-5">
        <div class="row">
            <h1>Notificaciones</h1>
            @foreach ($notificaciones as $notificacion)
                @if ($usuario_auth == $notificacion->peticion->usuario_id)
                    <div class="col-12 card p-3 mb-3">
                        <h2 class="h4"><i class="fa fa-envelope"></i> ¡{{ $notificacion->usuario->nombre }}
                            {{ $notificacion->usuario->apellido }} se ofreció a
                            ayudarte!</h2>
                        <ul>
                            <li>{{ $notificacion->peticion->titulo }}</li>
                            <li>{{ $notificacion->peticion->descripcion }}</li>
                        </ul>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection
