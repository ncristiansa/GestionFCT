@extends('layouts/plantilla')
@section('pageTitle', 'Login')
@section('content')
<div class="formulario-login">
    <h1 class="h2">Iniciar Sessión</h1>
    <form method="POST">
        <div class="form-group">
            <label for="usuario">
                <b>Usuario:</b>
            </label>
            <input type="text" class="form-control" name="usuario" id="usuario">
        </div>
        <div class="form-group">
            <label for="usuario">
                <b>Contraseña:</b>
            </label>
            <input type="password" class="form-control" name="usuario" id="usuario">
        </div>
        <input type="button" class="btn btn-primary" value="Entrar" onclick="location.href = '{{url('home')}}'">   
    </form>
</div>
@stop