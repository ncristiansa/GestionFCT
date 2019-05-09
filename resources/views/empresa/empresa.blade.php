@extends('layouts/general')
@section('pageTitle', 'Empresa')
@section('content')
    <h1>{{ trans('traduccion.titles') }}</h1>
<div class="table-responsive">
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col"></th>
                <th scope="col">id</th>
                <th scope="col">{{ trans('traduccion.tdCompany') }}</th>
                <th scope="col">NIF</th>
                <th scope="col">{{ trans('traduccion.tdTopology') }}</th>
                <th scope="col">{{ trans('traduccion.tdProfile') }}</th>
                <th scope="col">{{ trans('traduccion.tdLanguages') }}</th>
                <th scope="col">{{ trans('traduccion.tdSchedule') }}</th>
                <th scope="col">{{ trans('traduccion.tdTracing') }}</th>
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
    crearFilas("table", infoEmpresa, "/home/empresa/");
</script>
@stop