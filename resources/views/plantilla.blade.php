<html>

<head>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <title>@yield('titulo')</title>
</head>

<body>
    @include('partials.nav')
    <div style="text-align: right; margin: 7px;">
        {{ fechaActual('d/m/Y') }}
    </div>
    @yield('contenido')
</body>

</html>
