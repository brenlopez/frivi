@extends('layouts.app')
@section('title', 'Home')


@section('content')
    <div class="container mt-5">

        @if (Session('status'))
            <p>{{ Session('status') }}</p>
        @endif

        <h1><i class="fa fa-home text-warning"></i> Bienvenido al home</h1>
    </div>
@endsection
