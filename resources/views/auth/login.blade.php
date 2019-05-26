@extends('layouts/plantilla')
@section('pageTitle', trans('traduccion.titlelogin'))
@section('content')
<div class="formulario-login">
    <h1 class="h2">{{ trans('traduccion.open') }}</h1>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group {{ $errors->has('name') ? 'alert alert-danger' : ''}}">
            <label for="name">
            <span><img class="img-iconos" src="{{URL::asset('images/person.svg')}}" alt="icono-usuario" width="25px" height="25px"><b>&nbsp;{{ trans('traduccion.user') }}</b></span>
            </label>
            <input type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="name" id="name">
            {!! $errors->first('name', '<span class="help-block">:message</span>')!!}
        </div>
        <div class="form-group {{ $errors->has('password') ? 'alert alert-danger' : ''}}">
            <label for="password">
            <span><img class="img-iconos" src="{{URL::asset('images/key.svg')}}" alt="icono-clave" width="25px" height="25px"><b>&nbsp;{{ trans('traduccion.password') }}:</b></span>
            </label>
            <input type="password" class="form-control" name="password" id="clave">
            {!! $errors->first('password', '<span class="help-block">:message</span>')!!}
        </div>
        <input type="submit" class="btn btn-primary" value="{{ trans('traduccion.toaccess') }}">   
    </form>
</div>
@stop