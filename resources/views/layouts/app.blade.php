<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Frivi | @yield('title')</title>

    @include('layouts.partials.css')
    @yield('css')
</head>

<body>
    @yield('content')

    @include('layouts.partials.js')
    @yield('javascript')
</body>

</html>
