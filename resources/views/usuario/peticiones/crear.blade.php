@extends('layouts.app')
@section('title', 'Crear petición')

@section('content')
    <section class="container mt-5">
        <h1 class="h3">Crear una petición</h1>
        <form action="{{ route('crear.peticion') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="titulo">Título</label>
                <input type="text" name="titulo" id="titulo" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="descripcion">Descripción</label>
                <textarea name="descripcion" id="descripcion" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label for="monto_maximo">Monto máximo</label>
                <input type="number" name="monto_maximo" id="monto_maximo" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="tiempo_maximo">Horas de espera</label>
                <input type="number" name="tiempo_maximo" id="tiempo_maximo" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="ubicacion">Dirección de entrega</label>
                <input type="text" name="ubicacion" id="ubicacion" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="aclaracion">Aclaración</label>
                <input type="text" name="aclaracion" id="aclaracion" class="form-control">
            </div>
            <input class="visually-hidden" name="usuario_id" value="{{ $id }}">
            <button type="submit" class="btn btn-dark">Crear petición</button>
        </form>
    </section>
@endsection
