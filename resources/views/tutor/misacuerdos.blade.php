@extends('layouts/general')
@section('pageTitle', 'Mis acuerdos')
@section('content')
<h1>{{ trans('traduccion.Myagreements') }}</h1>
<div class="table-responsive">
    <table class="table" id="table-acuerdo">
        <thead class="thead-dark">
            <tr>
                <th scope="col"></th>
                <th scope="col">id</th>
                <th scope="col">{{ trans('traduccion.acuDataAlta') }}</th>
                <th scope="col">{{ trans('traduccion.acuFinalizada') }}</th>
                <th scope="col">{{ trans('traduccion.acuFi') }}</th>
            </tr>
        </thead>
    </table>
</div>
<script type="text/javascript">
	var infoTutor = {!! json_encode($infoTutor->toArray(), JSON_HEX_TAG) !!};
	var infoTutorAcuerdo = {!! json_encode($acuerdotutor, JSON_HEX_TAG) !!};
	var Rol = "{{ auth()->user()->Nombre }}";
	crearFilas("table", infoTutorAcuerdo, "/home/tutor/"+infoTutor[0]["id"], "/home/tutor/"+infoTutor[0]["id"], "tbody-tutor-acuerdo", Rol, "acuerdo");
</script>
@stop