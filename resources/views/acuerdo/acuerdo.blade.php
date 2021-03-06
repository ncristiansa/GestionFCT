@extends('layouts/general')
@section('pageTitle', trans('traduccion.acuerdob'))
@section('content')
<h1>Acuerdo</h1>
<div class="container">
    {!! Form::open(['id' => 'form-add-acuerdo', 'method' => 'POST']) !!}
    <div class="form-row">
    
        <div class="form-group col-md-6">
            <label>{{ trans('traduccion.acuDataAlta') }}</label>
            <input class="form-control" type="date" name="fecha_alta">
        </div>
        <div class="form-group col-md-6">
            <label>{{ trans('traduccion.Fecha_acuerdo_firmado') }}</label>
            <input class="form-control" type="date" name="acabada">
        </div>
        <div class="form-group col-md-6">
            <label>{{ trans('traduccion.acuFi') }}</label>
            <input class="form-control" type="date" name="fin">
        </div>
        <div class="form-group col-md-6">
            <label>{{ trans('traduccion.student') }}</label><br>
            <select name="alumno" id="selectalumno">
                <option value="0">Select</option>
                @foreach ($alumno as $alumn)
                <option value="{{$alumn->id}}">{{$alumn->Nombre}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-6">
            <label>{{ trans('traduccion.tdCompany') }}</label><br>
            <select name="empresa" id="selectempresa">
                <option value="0">Select</option>
                @foreach ($empresa as $emp)
                <option value="{{$emp->id}}">{{$emp->Empresa}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-6">
            <label>Tutor</label><br>
            <select name="tutor" id="selecttutor">
                <option value="0">Select</option>
                @foreach ($tutor as $tuto)
                <option value="{{$tuto->id}}">{{$tuto->Nombre}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-6">
            <label>{{ trans('traduccion.tdTracing') }}</label>
            <input class="form-control" type="text" name="seguimiento">
        </div>
    </div>
    {!! Form::close() !!}
    <div id="mensaje">
</div>
<a class="btn btn-success add-acuerdo" id="agregar"><img class="img-iconos" src="{{URL::asset('images/plus.svg')}}"></a>
<script type="text/javascript">
  $(document).on('click', 'a.add-acuerdo', function(){
    $.ajax({
      type: $("#form-add-acuerdo").attr('method'),
      url: $('#form-add-acuerdo').attr('action'),
      data: $('#form-add-acuerdo').first().serialize(),
      success : function(data){
        $("input[type=date]").val("");
        $("#selectalumno").val(0);
        $("#selectempresa").val(0);
        $("#selecttutor").val(0);
        $("input[type=text]").val("");
        muestraMensaje("#mensaje", "alert alert-success","Se ha añadido correctamente.");
      },
      error: function(data){
        console.log(data);
      }
    });
  });
</script>
</div>
@stop