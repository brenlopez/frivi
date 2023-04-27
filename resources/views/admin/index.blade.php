@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
    <div class="container mt-5">
        @if (Session('status'))
            <div class="alert alert-{{ Session('type') }} alert-dismissible fade show" role="alert">
                {{ Session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <h1><i class="fa fa-home text-primary"></i> Dashboard Admin</h1>
    </div>
@endsection
