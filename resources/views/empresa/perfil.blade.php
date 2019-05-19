@extends('layouts/general')
@section('pageTitle', 'Perfil')
@section('content')

<h1>{{ trans('traduccion.h1CompanyData') }}</h1>
<div id="mensaje">
</div>
@foreach($perfilempresa as $emp)
    <h2>{{ trans('traduccion.h2Agreementof') }} <b id='nombre-empresa'>{{$emp->Empresa}}</b></h2>
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
    var infoAcuerdoEmpresa = {!! json_encode($acuerdoempresa->toArray(), JSON_HEX_TAG) !!};
    var listaLabels = [
        "",
        "{{ trans('traduccion.compName') }}",
        "{{ trans('traduccion.compNIF') }}",
        "{{ trans('traduccion.compTopo') }}",
        "{{ trans('traduccion.compPerfil') }}",
        "{{ trans('traduccion.compIdioma') }}",
        "{{ trans('traduccion.compHorario') }}",
        "{{ trans('traduccion.compSeg') }}",
        "",
    ];
    crearFormulario("h1", infoEmpresa, "/home/empresa/"+infoEmpresa[0]["id"], "GET", true, "form-perfil", listaLabels);
    crearFilas("table", infoAcuerdoEmpresa, "urlDestroy", "urlEdit", "tbody-empresa-acuerdo");
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