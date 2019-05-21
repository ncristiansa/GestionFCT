@extends('layouts/general')
@section('pageTitle', 'Perfil')
@section('content')
<h1>{{ trans('traduccion.datosAcuerdo') }}</h1>
<script>
    var infoEmpresa = {!! json_encode($perfilempresa->toArray(), JSON_HEX_TAG) !!};
    var infoAcuerdo = {!! json_encode($perfilacuerdo->toArray(), JSON_HEX_TAG) !!};
    var infoAlumno = {!! json_encode($perfilalumno->toArray(), JSON_HEX_TAG) !!};
    var infoTutor = {!! json_encode($perfiltutor->toArray(), JSON_HEX_TAG) !!};
    var listaLabels = [
        "",
        "{{ trans('traduccion.acuDataAlta') }}",
        "{{ trans('traduccion.acuFinalizada') }}",
        "{{ trans('traduccion.acuFi') }}",
        "",
    ];
    if($.trim($("li a").eq(3).text()) == "EMPRESA"){
      crearFormulario("h1", infoAcuerdo, "/home/empresa/"+infoEmpresa[0]["id"]+"/"+infoAcuerdo[0]["id"], "GET", true, "form-perfil", listaLabels);
    }else if($.trim($("li a").eq(3).text()) == "ALUMNO"){
      crearFormulario("h1", infoAcuerdo, "/home/alumno/"+infoAlumno[0]["id"]+"/"+infoAcuerdo[0]["id"], "GET", true, "form-perfil", listaLabels);
    }else if($.trim($("li a").eq(3).text()) == "TUTOR"){
      crearFormulario("h1", infoAcuerdo, "/home/tutor/"+infoTutor[0]["id"]+"/"+infoAcuerdo[0]["id"], "GET", true, "form-perfil", listaLabels);
    }
    $(document).ready(function() {
    if(isNaN($("li a").eq(4)))
    {
      for(var datos in infoEmpresa)
      {
        $("li a").eq(4).text(infoEmpresa[datos]["Empresa"]);
      }
    }  
    }); 
</script>
@stop