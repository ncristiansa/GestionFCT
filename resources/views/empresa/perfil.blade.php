@extends('layouts/general')
@section('pageTitle', 'Perfil')
@section('content')
<h1>Datos empresa</h1>
<script>
    var infoEmpresa = {!! json_encode($perfilempresa->toArray(), JSON_HEX_TAG) !!};
    crearFormulario("h1", infoEmpresa, "/home/empresa/"+infoEmpresa[0]["id"], "POST", true, "form-perfil");
</script>
@stop