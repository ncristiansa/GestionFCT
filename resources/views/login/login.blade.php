@extends('layouts/plantilla')
@section('pageTitle', 'Login')
@section('content')
<div class="formulario-login">
    <h1 class="h1">Iniciar Sessión</h1>
    <form action="" method="post">
        <div class="form-group">
            <label for="usuario">Usuario:</label>
            <input type="text" class="form-control" name="usuario" id="usuario">
        </div>
        <div class="form-group">
            <label for="usuario">Contraseña:</label>
            <input type="password" class="form-control" name="usuario" id="usuario">
        </div>
        <input class="btn btn-primary" type="submit" value="Entrar">   
    </form>
</div>
@stop