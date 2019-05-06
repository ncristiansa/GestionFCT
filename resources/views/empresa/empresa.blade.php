@extends('layouts/general')
@section('pageTitle', 'Empresa')
@section('content')
    <h1>Listado de Empresas</h1>
<button type="button" class="btn btn-success"><img class="img-iconos" src="{{URL::asset('images/plus.svg')}}"></button>
<script>
    var infoEmpresa = {!! json_encode($empresa->toArray(), JSON_HEX_TAG) !!};
    crearTabla("h1", "table", "thead-dark", infoEmpresa, "/home/empresa/");
</script>
@stop