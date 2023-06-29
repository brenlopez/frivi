<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Frivi | @yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('assets/favicon.ico') }}" type="image/x-icon">

    @include('layouts.partials.css')
    @yield('css')
</head>

<body>
    @include('layouts.partials.header')
    @include('layouts.partials.navbar')
    <div class="main">
        @yield('content')
    </div>
    @include('layouts.partials.js')
    @yield('javascript')
</body>

</html>
