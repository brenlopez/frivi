@extends('layouts.auth')
@section('title', 'Iniciar sesión')

@section('content')
    <div class="container mt-5 pt-5">
        @if (Session('status'))
            <div class="alert alert-{{ Session('type') }} alert-dismissible fade show" role="alert">
                {{ Session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <h1 class="text-center">Iniciar Sesión</h1>

        <div class="row">
            <form class="col-lg-8 col-md-10 mx-auto mt-3" action="{{ route('auth.iniciar.sesion') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <button type="submit" class="btn btn-primary">Iniciar sesión</button>
            </form>
        </div>
    </div>
@endsection
