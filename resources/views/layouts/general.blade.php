<!doctype <!DOCTYPE html>
<html>
<head>
    @include('includes.head')
    <title>@yield('pageTitle')</title>
</head>
<body style="background-color: #5d90ff;">
    <ul>
        <li style="float:right"><a class="active" href="#about">Cerrar sessión</a></li>
    </ul>
        <div class="contenedor-empresa">
                <div class="contenido">
                    @yield('content')
                </div>
        </div>
</body>
</html>