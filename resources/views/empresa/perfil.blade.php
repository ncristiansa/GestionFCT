@extends('layouts/general')
@section('pageTitle', 'Perfil')
@section('content')
<h1>{{ trans('traduccion.h1CompanyData') }}</h1>

@foreach($perfilempresa as $emp)
    <h2>{{ trans('traduccion.h2Agreementof') }} {{$emp->Empresa}}</h2>
@endforeach
<script>
    var infoEmpresa = {!! json_encode($perfilempresa->toArray(), JSON_HEX_TAG) !!};
    crearFormulario("h1", infoEmpresa, "/home/empresa/"+infoEmpresa[0]["id"], "GET", true, "form-perfil");
</script>
@stop