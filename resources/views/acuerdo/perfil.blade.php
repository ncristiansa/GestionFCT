@extends('layouts/general')
@section('pageTitle', 'Perfil')
@section('content')
<script type="text/javascript" src="{{asset('js/modal.js')}}"></script>
<h1>{{ trans('traduccion.datosAcuerdo') }}</h1>
<script>
    var infoEmpresa = {!! json_encode($perfilempresa->toArray(), JSON_HEX_TAG) !!};
    var infoAcuerdo = {!! json_encode($perfilacuerdo->toArray(), JSON_HEX_TAG) !!};
    var infoAlumno = {!! json_encode($perfilalumno->toArray(), JSON_HEX_TAG) !!};
    var infoTutor = {!! json_encode($perfiltutor->toArray(), JSON_HEX_TAG) !!};
    var listaLabels = [
        "",
        "{{ trans('traduccion.acuDataAlta') }}",
        "{{ trans('traduccion.Fecha_acuerdo_firmado') }}",
        "{{ trans('traduccion.acuFi') }}",
        "",
    ];
    if($.trim($("li a").eq(6).text()) == "EMPRESA"){
      crearFormulario("h1", infoAcuerdo, "/home/empresa/"+infoEmpresa[0]["id"]+"/"+infoAcuerdo[0]["id"], "GET", true, "form-perfil", listaLabels);
    }else if($.trim($("li a").eq(6).text()) == "ALUMNO"){
      crearFormulario("h1", infoAcuerdo, "/home/alumno/"+infoAlumno[0]["id"]+"/"+infoAcuerdo[0]["id"], "GET", true, "form-perfil", listaLabels);
    }else if($.trim($("li a").eq(6).text()) == "TUTOR"){
      crearFormulario("h1", infoAcuerdo, "/home/tutor/"+infoTutor[0]["id"]+"/"+infoAcuerdo[0]["id"], "GET", true, "form-perfil", listaLabels);
    }
    $(document).ready(function() {
    if(isNaN($("li a").eq(7)))
    {
      if($.trim($("li a").eq(6).text()) == "EMPRESA")
      {
        for(var datos in infoEmpresa)
        {
          $("li a").eq(7).text(infoEmpresa[datos]["Empresa"]);
        }
      }else if($.trim($("li a").eq(6).text()) == "ALUMNO"){
        for(var datos in infoEmpresa)
        {
          $("li a").eq(7).text(infoAlumno[datos]["Nombre"]);
        }
      }else if($.trim($("li a").eq(6).text()) == "TUTOR"){
        for(var datos in infoEmpresa)
        {
          $("li a").eq(7).text(infoTutor[datos]["Nombre"]);
        }
      }
    }  
    }); 
</script>
@stop