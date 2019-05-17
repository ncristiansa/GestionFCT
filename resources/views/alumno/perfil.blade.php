@extends('layouts/general')
@section('pageTitle', 'Perfil')
@section('content')

<h1>{{ trans('traduccion.h1CompanyData') }}</h1>
<div id="mensaje">
</div>
@foreach($perfilalumno as $alum)
    <h2>{{ trans('traduccion.h2Agreementof') }} {{$alum->Nom}}</h2>
@endforeach


<script>
    var infoAlumn = {!! json_encode($perfilalumno->toArray(), JSON_HEX_TAG) !!};
    var infoAcuerdoEmpresa = {!! json_encode($acuerdoempresa->toArray(), JSON_HEX_TAG) !!};
    crearFormulario("h1", infoAlumn, "/home/alumno/"+infoAlumn[0]["id"], "GET", true, "form-perfil");
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