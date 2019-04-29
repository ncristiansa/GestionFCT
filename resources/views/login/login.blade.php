@extends('layouts/plantilla')
@section('pageTitle', 'Login')
@section('content')
<div class="formulario-login">
    <h1 class="h2">Iniciar Sessión</h1>
    <form method="POST">
        <div class="form-group">
            <label for="usuario">
            <span><img src="{{URL::asset('images/person.svg')}}" alt="icono-usuario" width="25px" height="25px"><b>&nbsp; Usuario:</b></span>
            </label>
            <input type="text" class="form-control" name="usuario" id="usuario">
        </div>
        <div class="form-group">
            <label for="usuario">
            <span><img src="{{URL::asset('images/key.svg')}}" alt="icono-clave" width="25px" height="25px"><b>&nbsp;Contraseña:</b></span>
            </label>
            <input type="password" class="form-control" name="usuario" id="usuario">
        </div>
        <input type="button" class="btn btn-primary" value="Entrar" onclick="location.href = '{{url('home')}}'">   
    </form>
</div>
@stop