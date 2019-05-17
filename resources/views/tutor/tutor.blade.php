@extends('layouts/general')
@section('pageTitle', 'Tutor')
@include('includes.modal')
@section('content')
<h1>{{ trans('traduccion.titleTutor') }}</h1>
<div class="table-responsive">
    <table class="table" id="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col"></th>
                <th scope="col">id</th>
                <th scope="col">{{ trans('traduccion.titleNom') }}</th>
                <th scope="col">Email</th>
            </tr>
        </thead>
    </table>
</div>
<div id="mensaje">
</div>
<a class="btn btn-success add-company" id="agregar"><img class="img-iconos" src="{{URL::asset('images/plus.svg')}}"></a>
<script>
  var urlDestroy = '{{route("tutor.destroy", ":id")}}';
  var urlEdit = '{{route("tutor.edit", ":id")}}';
  var infoTutor = {!! json_encode($tutor->toArray(), JSON_HEX_TAG) !!};
  crearFilas("table", infoTutor, urlDestroy, urlEdit, "tbody-tutor");
</script>
@stop