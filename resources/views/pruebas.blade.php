@extends('layouts/general')
@section('pageTitle', 'Empresa')
@section('content')
<h1>Pruebas</h1>

<script>
    var infoEmpresa = {!! json_encode($empresa->toArray(), JSON_HEX_TAG) !!};
    crearFormulario("h1", infoEmpresa, "/pruebas", "POST", true);
</script>
@stop