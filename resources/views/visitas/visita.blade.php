@extends('layouts/general')
@section('pageTitle', trans('traduccion.visitab'))
@section('content')
<h1>{{ trans('traduccion.agrega_visita') }}</h1>
<div class="container">
    {!! Form::open(['id' => 'form-add-visita', 'method' => 'POST']) !!}
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>{{ trans('traduccion.Fecha') }}</label>
            <input class="form-control" type="date" name="fecha">
        </div>
        <div class="form-group col-md-6">
            <label>{{ trans('traduccion.comentario') }}</label>
            <input class="form-control" type="text" name="comentario">
        </div>
        <div class="form-group col-md-6">
            <label>{{ trans('traduccion.realizado') }}</label>
            <input class="form-control" type="text" name="realizado" placeholder="(Si/No)">
        </div>
        <div class="form-group col-md-6">
            <label>{{ trans('traduccion.tipo') }}</label><br>
            <select name="selecttipo" id="selecttipo">
                <option value="0">Select</option>
                <option value="Entrevista">Entrevista</option>
                <option value="Inicial">Inicial</option>
                <option value="Seguimiento">Seguimiento</option>
                <option value="Final">Final</option>
                <option value="Otros">Otros</option>
            </select>
        </div>
		<div class="form-group col-md-6">
            <label>{{ trans('traduccion.acuerdoid') }}</label><br>
            <select name="acuerdoid" id="selectacuerdoid">
                <option value="0">Select</option>
                @foreach ($idacuerdos as $idacu)
                	<option value="{{$idacu->id}}">{{$idacu->id}}</option>
                @endforeach
            </select>
        </div>

        		
    </div>
    {!! Form::close() !!}
    <div id="mensaje">
</div>
<a class="btn btn-success add-visita" id="agregar"><img class="img-iconos" src="{{URL::asset('images/plus.svg')}}"></a>
<script type="text/javascript">
	$(document).on('click', 'a.add-visita', function(){
    $.ajax({
      type: $("#form-add-visita").attr('method'),
      url: $('#form-add-visita').attr('action'),
      data: $('#form-add-visita').first().serialize(),
      success : function(data){
        $("input[type=date]").val("");
        $("input[type=text]").val("");
        $("#selecttipo").val(0);
        $("#selectacuerdoid").val(0);
        muestraMensaje("#mensaje", "alert alert-success","Se ha añadido correctamente.");
      },
      error: function(data){
        console.log(data);
      }
    });
  });
</script>
@stop