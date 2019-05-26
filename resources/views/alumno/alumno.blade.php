@extends('layouts/general')
@section('pageTitle', 'Alumno')
@section('content')
@include('includes.modal')
<h1>{{ trans('traduccion.StudendsList') }}</h1>

<div class="table-responsive">
    <table class="table" id="table-alumno">
        <thead class="thead-dark">
            <tr>
                <th scope="col"></th>
                <th scope="col">id</th>
                <th scope="col">{{ trans('traduccion.alumName') }}</th>
                <th scope="col">DNI</th>
            </tr>
        </thead>
    </table>
</div>
<div id="mensaje">
</div>
<a class="btn btn-success add-alumno" id="agregar"><img class="img-iconos" src="{{URL::asset('images/plus.svg')}}"></a>
<script>
    var Rol = "{{ auth()->user()->Nombre }}";
    var urlDestroy = '{{route("alumno.destroy", ":id")}}';
    var urlEdit = '{{route("alumno.edit", ":id")}}';
    var infoAlumno = {!! json_encode($alumno->toArray(), JSON_HEX_TAG) !!};
    crearFilas("table", infoAlumno, urlDestroy, urlEdit, "tbody-alumno", Rol, "noacuerdo");
</script>
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modal-add-alumno">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="padding:45px;">
    <h5>Agrega un nuevo Alumno</h5>
    <div class="form">
        {!! Form::open(['id' => 'form-add-alumno', 'method' => 'POST']) !!}
          <div class="form-group col-md-10">
            <label>{{ trans('traduccion.alumName') }}</label>
            <input class="form-control" type="text" name="nombre">
          </div>
          <div class="form-group col-md-10">
            <label>DNI</label>
            <input class="form-control" type="text" name="dni">
          </div>
          <div class="form-group col-md-10">
            <label>Num. Cap</label>
            <input class="form-control" type="text" name="num_cap">
          </div>
          <div class="form-group col-md-10">
            <label>{{ trans('traduccion.alumEmail') }}</label>
            <input class="form-control" type="text" name="email">
          </div>
          <div class="form-group col-md-10">
            <label>{{ trans('traduccion.alumTel') }}</label>
            <input class="form-control" type="text" name="telefono">
          </div>
          <a id="save-alumno" class="btn btn-success add-alumno"><img height="20px" width="20px" src="{{URL::asset('images/save.png')}}" class="img-iconos"></a>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        {!! Form::close() !!}
        </div>

    </div>
  </div>
</div>
<script type="text/javascript">
    var urlDestroy = '{{route("alumno.destroy", ":id")}}';
    var urlEdit = '{{route("alumno.edit", ":id")}}';
    var msgEdit = "{{ trans('traduccion.messageCorrectEdit') }}";
    $(document).on('click', 'a.add-alumno', function(){
        $("#modal-add-alumno").modal('show');
      });
      $('#save-alumno').click(function(){

        $.ajax({
          type: $("#form-add-alumno").attr('method'),
          url: $('#form-add-alumno').attr('action'),
          data: $('#form-add-alumno').first().serialize(),
          success : function(data){
            console.log(data);
            var urlAlumno = window.location.origin+"/home/alumno";
            var trvalores = $("<tr>").attr({"data-id": data.id});
            trvalores.append(crearAImg("/../images/eye.svg", "editar", "btn btn-warning", undefined, urlAlumno+"/"+data.id));
            trvalores.append(crearAImg("/../images/trashcan.svg", "borrar", "btn btn-danger delete-record", undefined, urlAlumno+"/"+data.id));
            
            trvalores.append("<td>"+data.id+"</td>"+
                "<td>"+data.Nombre+"</td>"+
                "<td>"+data.DNI+"</td>");
            $("#tbody-alumno").append(trvalores);
            $('#modal-add-alumno').modal('toggle');
            muestraMensaje("#mensaje", "alert alert-success","Se ha añadido correctamente.");
            
          },
          error: function(data){
            console.log(data);
          }
    });
  });

</script>

@stop