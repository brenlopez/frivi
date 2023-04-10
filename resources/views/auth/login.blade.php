@extends('layouts.auth')
@section('title', 'Iniciar sesión')

@section('content')
    <div class="container mt-5 pt-5">
        <h1 class="text-center">Iniciar Sesión</h1>

        <div class="row">
            <form class="col-lg-8 col-md-10 mx-auto mt-3" action="" method="post">
                <div class="mb-3">
                    <label for="emailLogin" class="form-label">Email</label>
                    <input type="email" class="form-control" id="emailLogin">
                </div>
                <div class="mb-3">
                    <label for="passwordLogin" class="form-label">Password</label>
                    <input type="password" class="form-control" id="passwordLogin">
                </div>
                <button type="submit" class="btn btn-primary">Iniciar sesión</button>
            </form>
        </div>
    </div>
@endsection
