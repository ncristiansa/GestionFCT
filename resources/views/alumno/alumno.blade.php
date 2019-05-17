@extends('layouts/general')
@section('pageTitle', 'Alumno')
@include('includes.modal')
@section('content')
<h1>{{ trans('traduccion.StudendsList') }}</h1>

<div class="table-responsive">
    <table class="table" id="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col"></th>
                <th scope="col">id</th>
                <th scope="col">Nombre</th>
                <th scope="col">DNI</th>
            </tr>
        </thead>
    </table>
</div>
<div id="mensaje">
</div>
<a class="btn btn-success add-company" id="agregar"><img class="img-iconos" src="{{URL::asset('images/plus.svg')}}"></a>
<script>
    var urlDestroy = '{{route("alumno.destroy", ":id")}}';
    var urlEdit = '{{route("alumno.edit", ":id")}}';
    var infoAlumno = {!! json_encode($alumno->toArray(), JSON_HEX_TAG) !!};
    crearFilas("table", infoAlumno, urlDestroy, urlEdit, "tbody-alumno");
</script>
@stop