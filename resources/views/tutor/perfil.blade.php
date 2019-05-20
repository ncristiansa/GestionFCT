@extends('layouts/general')
@section('pageTitle', 'Perfil')
@section('content')

<h1>{{ trans('traduccion.dataTutor') }}</h1>
<div id="mensaje">
</div>
@foreach($perfiltutor as $tutor)
    <h2>{{ trans('traduccion.h2Agreementof') }} <b id="nombre-tutor">{{$tutor->Nombre}}</b></h2>
@endforeach
<script>
    var infoTutor = {!! json_encode($perfiltutor->toArray(), JSON_HEX_TAG) !!};
    var listaLabels = [
        "",
        "{{ trans('traduccion.tutoName') }}",
        "{{ trans('traduccion.tutoEmail') }}",
        "{{ trans('traduccion.tutoTel') }}",
        "",
    ];
    
    crearFormulario("h1", infoTutor, "/home/tutor/"+infoTutor[0]["id"], "GET", true, "form-perfil", listaLabels);
    $(document).ready(function() {
    if(isNaN($("li a").eq(4)))
    {
      for(var datos in infoTutor)
      {
        $("li a").eq(4).text(infoTutor[datos]["Nombre"]);
      }
    }  
    });
</script>
@stop