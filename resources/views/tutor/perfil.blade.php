@extends('layouts/general')
@section('pageTitle', trans('traduccion.tdProfile'))
@section('content')
@include('includes.modal')
<script type="text/javascript" src="{{asset('js/modal.js')}}"></script>
<h1>{{ trans('traduccion.dataTutor') }}</h1>
<div id="mensaje">
</div>
@foreach($perfiltutor as $tutor)
    <h2>{{ trans('traduccion.h2Agreementof') }} <b id="nombre-tutor">{{$tutor->Nombre}}</b></h2>
@endforeach
<div class="table-responsive">
    <table class="table" id="table-acuerdo">
        <thead class="thead-dark">
            <tr>
                <th scope="col"></th>
                <th scope="col">id</th>
                <th scope="col">{{ trans('traduccion.acuDataAlta') }}</th>
                <th scope="col">{{ trans('traduccion.Fecha_acuerdo_firmado') }}</th>
                <th scope="col">{{ trans('traduccion.acuFi') }}</th>
            </tr>
        </thead>
    </table>
</div>

<script>
    var infoTutor = {!! json_encode($perfiltutor->toArray(), JSON_HEX_TAG) !!};
    var infoTutorAcuerdo = {!! json_encode($acuerdotutor, JSON_HEX_TAG) !!};
    var Rol = "{{ auth()->user()->Nombre }}";
    var listaLabels = [
        "",
        "{{ trans('traduccion.tutoName') }}",
        "{{ trans('traduccion.alumDNI') }}",
        "{{ trans('traduccion.tutoEmail') }}",
        "{{ trans('traduccion.tutoTel') }}",
        "",
    ];
    
    crearFormulario("h1", infoTutor, "/home/tutor/"+infoTutor[0]["id"], "GET", true, "form-perfil", listaLabels);
    crearFilas("table", infoTutorAcuerdo, "/home/tutor/"+infoTutor[0]["id"], "/home/tutor/"+infoTutor[0]["id"], "tbody-tutor-acuerdo", Rol, "acuerdo");
    $(document).ready(function() {
    if(isNaN($("li a").eq(8)))
    {
      for(var datos in infoTutor)
      {
        $("li a").eq(8).text(infoTutor[datos]["Nombre"]);
      }
    }
    });
</script>
@stop