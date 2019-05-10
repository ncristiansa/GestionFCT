@extends('layouts/general')
@section('pageTitle', 'Empresa')
@include('includes.modal')
@section('content')
    <h1>{{ trans('traduccion.titles') }}</h1>
<div class="table-responsive">
    <table class="table" id="table-empresa">
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
            @foreach($empresa as $emp)
                <tr>
                    <td>
                        <a href="{{route('empresa.delete',$emp->id)}}" class="btn btn-danger delete-record"><img class="img-iconos" src="../images/trashcan.svg"></img></a>
                        <a href="#" class="btn btn-warning"><img class="img-iconos" src="../images/eye.svg"></img></a>
                        <a href="#" class="btn btn-info"><img class="img-iconos" src="../images/pencil.svg"></img></a>
                    </td>
                    <td>{{$emp->id}}</td>
                    <td>{{$emp->Empresa}}</td>
                    <td>{{$emp->NIF}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<button type="button" class="btn btn-success"><img class="img-iconos" src="{{URL::asset('images/plus.svg')}}"></button>

<script>
    var infoEmpresa = {!! json_encode($empresa->toArray(), JSON_HEX_TAG) !!};
    //crearTabla("h1", "table", "thead-dark", infoEmpresa, "/home/empresa/");
    //crearFilas("table", infoEmpresa, "/home/empresa/");
</script>
@stop