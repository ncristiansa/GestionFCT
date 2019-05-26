<!doctype <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('includes.head')
    <title>@yield('pageTitle')</title>
</head>
<body style="background-color: #e8e8e8;">
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
    @if (session()->has('flash'))
    <div class="alert alert-info">
        {{session('flash')}}
    </div>
    @endif
    @yield('content')

    <footer class="row">

    </footer>
  
</body>
</html>