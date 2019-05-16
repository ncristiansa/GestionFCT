@extends('layouts/general')
@section('pageTitle', 'Perfil')
@section('content')

<h1>{{ trans('traduccion.h1CompanyData') }}</h1>
<div id="mensaje">
</div>
@foreach($perfilempresa as $emp)
    <h2>{{ trans('traduccion.h2Agreementof') }} {{$emp->Empresa}}</h2>
@endforeach

<div class="table-responsive">
    <table class="table" id="table-empresa">
        <thead class="thead-dark">
            <tr>
                <th scope="col"></th>
                <th scope="col">id</th>
                <th scope="col">Fecha Alta</th>
                <th scope="col">Acabada</th>
                <th scope="col">Fin</th>
            </tr>
        </thead>
        <tbody> 
        </tbody>
    </table>
</div>

<script>
    var infoEmpresa = {!! json_encode($perfilempresa->toArray(), JSON_HEX_TAG) !!};
    crearFormulario("h1", infoEmpresa, "/home/empresa/"+infoEmpresa[0]["id"], "GET", true, "form-perfil");
</script>
@stop