@extends('layouts/general')
@section('pageTitle', 'Perfil')
@section('content')
@include('includes.modal')
<h1>{{ trans('traduccion.dataAlumno') }}</h1>
<div id="mensaje">
</div>
@foreach($perfilalumno as $alum)
    <h2>{{ trans('traduccion.h2Agreementof') }} <b id="nombre-alumno">{{$alum->Nombre}}</b></h2>
@endforeach
<div class="table-responsive">
    <table class="table" id="table-acuerdo">
        <thead class="thead-dark">
            <tr>
                <th scope="col"></th>
                <th scope="col">id</th>
                <th scope="col">{{ trans('traduccion.acuDataAlta') }}</th>
                <th scope="col">{{ trans('traduccion.acuFinalizada') }}</th>
                <th scope="col">{{ trans('traduccion.acuFi') }}</th>
            </tr>
        </thead>
    </table>
    
</div>
<div id="mensaje">
</div>
<script>
    var infoAlumn = {!! json_encode($perfilalumno->toArray(), JSON_HEX_TAG) !!};
    var infoAcuerdoAlumno = {!! json_encode($acuerdoalumno->toArray(), JSON_HEX_TAG) !!};
    var Rol = "{{ auth()->user()->name }}";
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
    crearFilas("table", infoAcuerdoAlumno, "/home/alumno/"+infoAlumn[0]["id"], "/home/alumno/"+infoAlumn[0]["id"], "tbody-alumno-acuerdo", Rol, "acuerdo");
    $(document).ready(function() {
    if(isNaN($("li a").eq(6)))
    {
        for(var datos in infoAlumn)
        {
            $("li a").eq(6).text(infoAlumn[datos]["Nombre"]);
        }
    }  
    });
</script>
@stop