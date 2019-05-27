@extends('layouts/general')
@section('pageTitle', 'Mis acuerdos')
@section('content')
<h1>{{ trans('traduccion.Myagreements') }}</h1>
<div class="table-responsive">
    <table class="table" id="table-misacuerdos">
        <thead class="thead-dark">
            <tr>
                <th scope="col"></th>
                <th scope="col">id</th>
                <th scope="col">{{ trans('traduccion.acuDataAlta') }}</th>
                <th scope="col">{{ trans('traduccion.Fecha_acuerdo_firmado') }}</th>
                <th scope="col">{{ trans('traduccion.acuFi') }}</th>
            </tr>
        </thead>
    </table>
</div>
<br>
<h2>{{ trans('traduccion.Control_seguimiento') }}</h2>
<div class="table-responsive">
    <table class="table" id="table-seguimiento">
        <thead class="thead-dark">
            <tr>
                <th scope="col"></th>
                <th scope="col">{{ trans('traduccion.tdCompany') }}</th>
                <th scope="col">{{ trans('traduccion.tdTracing') }}</th>
                <th scope="col">{{ trans('traduccion.student') }}</th>
                <th scope="col">Tutor</th>
                <th scope="col">{{ trans('traduccion.Responsable') }}</th>
            </tr>
        </thead>
    </table>
</div>
<br>
<h2>{{ trans('traduccion.Control_visitas') }}</h2>
<div class="table-responsive">
    <table class="table" id="table-seguimiento">
        <thead class="thead-dark">
            <tr>
                <th scope="col"></th>
                <th scope="col">{{ trans('traduccion.tdCompany') }}</th>
                <th scope="col">{{ trans('traduccion.Fecha') }}</th>
            </tr>
        </thead>
    </table>
</div>
<script type="text/javascript">
	var infoTutor = {!! json_encode($infoTutor->toArray(), JSON_HEX_TAG) !!};
	var infoTutorAcuerdo = {!! json_encode($acuerdotutor, JSON_HEX_TAG) !!};
	var Rol = "{{ auth()->user()->Nombre }}";
	crearFilas("#table-misacuerdos", infoTutorAcuerdo, "/home/tutor/"+infoTutor[0]["id"], "/home/tutor/"+infoTutor[0]["id"], "tbody-misacuerdos", Rol, "acuerdo");
</script>
@stop