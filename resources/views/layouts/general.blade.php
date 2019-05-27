<!doctype <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('includes.head')
    
    <title>@yield('pageTitle')</title>
</head>

<body style="background-color: #e8e8e8;">
  <ul>
    <li style="float:left;"><a class="nombre-usuario"><img class="img-iconos" src="{{URL::asset('images/person.svg')}}" alt="icono-usuario" width="25px" height="35px">&nbsp;{{ auth()->user()->name }}</a></li>
    <li style="float:right"><a class="active" href="{{ route('logout')}}"><img width="35px" height="35px" class="img-iconos" src="{{URL::asset('images/sign-out.svg')}}"></a></li>
    <li style="float:left"><a  href="{{ url('/home/acuerdo') }}" style="padding:19px;">Acuerdo</a></li>
    <li style="float:left"><a  href="{{ url('/home/visita') }}" style="padding:19px;">Visita</a></li>
    <li style="float:left"><a  href="{{ url('/home/calcula') }}" style="padding:19px;">Calcula horas</a></li>
  </ul>
  @include('breadcrumbs.breadcrumbs')
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
     @include('includes.footer')
</body>
</html>