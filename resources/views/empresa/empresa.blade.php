@extends('layouts/general')
@section('pageTitle', 'Empresa')
@section('content')
    <h1>{{ trans('traduccion.titles') }}</h1>
<div class="table-responsive">
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">id</th>
                <th scope="col">Empresa</th>
                <th scope="col">NIF</th>
                <th scope="col">Topologia</th>
                <th scope="col">Perfil</th>
                <th scope="col">Idiomas</th>
                <th scope="col">Horario</th>
                <th scope="col">Seguimiento</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
<button type="button" class="btn btn-success"><img class="img-iconos" src="{{URL::asset('images/plus.svg')}}"></button>
<script>
    var infoEmpresa = {!! json_encode($empresa->toArray(), JSON_HEX_TAG) !!};
    //crearTabla("h1", "table", "thead-dark", infoEmpresa, "/home/empresa/");
    crearFilas("tbody", infoEmpresa, "/home/empresa/");
</script>
@stop