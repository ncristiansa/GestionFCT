<!doctype <!DOCTYPE html>
<html>
<head>
    @include('includes.head')
    <title>@yield('pageTitle')</title>
</head>
<body style="background-color: #5d90ff;">
    <ul>
        <li style="float:right">
          <form action="{{ route('logout')}}" method="post">
            @csrf
            <button class="btn btn-success btn-lg">
            <img width="35px" height="35px" class="img-iconos" src="{{URL::asset('images/sign-out.svg')}}">
            </button>
          </form>
        </li>
    </ul>
    <div class="dropdown" align="right" style="margin-right:20px;">
      <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img class="img-iconos" src="{{URL::asset('images/globe.svg')}}" alt="icono-clave" width="25px" height="25px">
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="{{ url('lang', ['en'])}}">EN</a>
        <a class="dropdown-item" href="{{ url('lang', ['es'])}}">ES</a>
        <a class="dropdown-item" href="{{ url('lang', ['cat'])}}">CAT</a>
      </div>
    </div>
        <div class="contenedor-empresa">
                <div class="contenido">
                    @yield('content')
                </div>
        </div>
     
</body>
</html>