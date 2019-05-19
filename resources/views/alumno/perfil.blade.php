@extends('layouts/general')
@section('pageTitle', 'Perfil')
@section('content')

<h1>{{ trans('traduccion.dataAlumno') }}</h1>
<div id="mensaje">
</div>
@foreach($perfilalumno as $alum)
    <h2>{{ trans('traduccion.h2Agreementof') }} <b id="nombre-alumno">{{$alum->Nom}}</b></h2>
@endforeach
<script>
    var infoAlumn = {!! json_encode($perfilalumno->toArray(), JSON_HEX_TAG) !!};
    var infoAcuerdoEmpresa = {!! json_encode($acuerdoempresa->toArray(), JSON_HEX_TAG) !!};
    var listaLabels = [
        "",
        "{{ trans('traduccion.alumName') }}",
        "{{ trans('traduccion.alumDNI') }}",
        "{{ trans('traduccion.alumNCAP') }}",
        "{{ trans('traduccion.alumEmail') }}",
        "{{ trans('traduccion.alumTel') }}",
        "",
    ];
    crearFormulario("h1", infoAlumn, "/home/alumno/"+infoAlumn[0]["id"], "GET", true, "form-perfil", listaLabels);
    crearFilas("table", infoAcuerdoEmpresa, "urlDestroy", "urlEdit", "tbody-alumno-acuerdo");
    $(document).ready(function() {
    if(isNaN($("li a").eq(4)))
    {
        $("li a").eq(4).text("");
        for(var datos in infoAlumn)
        {
            $("li a").eq(4).text(infoAlumn[datos]["Nom"]);
        }
    }  
    });
</script>
@stop