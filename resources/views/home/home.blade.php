@extends('layouts/principal')
@section('pageTitle', 'Home')
@section('content')
<div class="contenedor">
    <div class="estilo-empresa" onclick="location.href = '{{url('home/empresa')}}'">
    {{ trans('traduccion.company') }}
        <img src="{{URL::asset('images/icono-empresa.gif')}}" alt="icono-empresa" width="200px" height="200px">
    </div>
    <div class="estilo-alumno" onclick="location.href = '{{url('home/alumno')}}'">
    {{ trans('traduccion.student') }}
        <img src="{{URL::asset('images/icono-alumno2.png')}}" alt="icono-alumno" width="200px" height="200px">
    </div>
    <div class="estilo-alumno" onclick="location.href = '{{url('home/tutor')}}'">
    Tutor
        <img src="{{URL::asset('images/icono-tutora.png')}}" alt="icono-alumno" width="200px" height="200px">
    </div>
</div>
<script type="text/javascript">
        var misacuerdo = "{{ trans('traduccion.Myagreements') }}";
    var calculahoras = "{{ trans('traduccion.calchoras') }}";
    $(document).ready(function(){
        if($.trim($("li a").eq(0).text()) == "Tutor" || $.trim($("li a").eq(0).text()) == "Administrador")
        {
            var tutorid = "{{$idtutor}}";
            var idsplit = tutorid.split(":");
            var idtutor = idsplit[1].replace("}]", "");
            var Nombre = "{{ auth()->user()->Nombre }}";
            var rutaPerfil = "home/tutor/"+idtutor;
            $("#menu").append($("<li>").attr({"style":"float:left; padding:2px;"}).append($("<a>").attr({'href':rutaPerfil}).text(misacuerdo)));
        }else{
            var tutorid = "{{$idtutor}}";
            var idsplit = tutorid.split(":");
            var idtutor = idsplit[1].replace("}]", "");
            var Nombre = "{{ auth()->user()->Nombre }}";
            var rutaPerfil = "home/tutor/"+idtutor;
            $("#menu").append($("<li>").attr({"style":"float:left; padding:2px;"}).append($("<a>").attr({'href':rutaPerfil}).text(misacuerdo)));
        }
    });
</script>
@stop