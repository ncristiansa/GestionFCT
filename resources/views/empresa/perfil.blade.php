@extends('layouts/general')
@section('pageTitle', 'Perfil')
@section('content')
<h1>Datos empresa</h1>
<script>
    var infoEmpresa = {!! json_encode($perfilempresa->toArray(), JSON_HEX_TAG) !!};
    crearFormulario("h1", infoEmpresa, "/pruebas", "POST", true);
</script>
@stop