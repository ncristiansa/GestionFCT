@extends('layouts/general')
@section('pageTitle', 'Perfil')
@section('content')
<h1>Perfil acuerdo</h1>
<script>
    var infoEmpresa = {!! json_encode($perfilempresa->toArray(), JSON_HEX_TAG) !!};
    var infoAcuerdo = {!! json_encode($perfilacuerdo->toArray(), JSON_HEX_TAG) !!};
    var listaLabels = [
        "",
        "{{ trans('traduccion.acuDataAlta') }}",
        "{{ trans('traduccion.acuFinalizada') }}",
        "{{ trans('traduccion.acuFi') }}",
        "",
    ];
    var id = infoAcuerdo[0]["id"];
    console.log(id);
    crearFormulario("h1", infoAcuerdo, "/home/empresa/"+infoEmpresa[0]["id"]+"/"+infoAcuerdo[0]["id"], "GET", true, "form-perfil", listaLabels);
    $(document).ready(function() {
    if(isNaN($("li a").eq(4)))
    {
      for(var datos in infoEmpresa)
      {
        $("li a").eq(4).text(infoEmpresa[datos]["Empresa"]);
      }
      /*
      for(var datos in infoAcuerdo)
      {
        $("li a").eq(6).text("Acuedo");
      }
      */
    }  
    }); 
</script>
@stop