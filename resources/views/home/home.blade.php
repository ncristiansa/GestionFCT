@extends('layouts/principal')
@section('pageTitle', 'Home')
@section('content')
<div class="contenedor">
    <div class="estilo-empresa" onclick="location.href = '{{url('home/empresa')}}'">
    {{ trans('traduccion.company') }}
        <img src="{{URL::asset('images/icono-empresa.jpg')}}" alt="icono-empresa" width="200px" height="200px">
    </div>
    <div class="estilo-alumno" onclick="location.href = '{{url('home/alumno')}}'">
    {{ trans('traduccion.student') }}
        <img src="{{URL::asset('images/icono-alumno.png')}}" alt="icono-alumno" width="200px" height="200px">
    </div>
</div>
@stop