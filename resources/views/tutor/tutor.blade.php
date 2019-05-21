@extends('layouts/general')
@section('pageTitle', 'Tutor')
@include('includes.modal')
@section('content')
<script type="text/javascript" src="{{asset('js/modal-tutor.js')}}"></script>
<h1>{{ trans('traduccion.Listoftutors') }}</h1>
<div class="table-responsive">
    <table class="table" id="table-tutor">
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
<a class="btn btn-success add-tutor" id="agregar"><img class="img-iconos" src="{{URL::asset('images/plus.svg')}}"></a>
<script>
  var Rol = "{{ auth()->user()->name }}";
  var urlDestroy = '{{route("tutor.destroy", ":id")}}';
  var urlEdit = '{{route("tutor.edit", ":id")}}';
  var infoTutor = {!! json_encode($tutor->toArray(), JSON_HEX_TAG) !!};
  crearFilas("table", infoTutor, urlDestroy, urlEdit, "tbody-tutor", Rol, "noacuerdo");
</script>
<!-- Modal Tutor Add -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modal-add-tutor">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="padding:45px;">
    <h5>Agrega una nueva Empresa</h5>
    <div class="form">
        {!! Form::open(['id' => 'form-add-tutor', 'method' => 'POST']) !!}
          <div class="form-group col-md-10">
            <label>Nombre</label>
            <input class="form-control" type="text" name="nombre">
          </div>
          <div class="form-group col-md-10">
            <label>DNI</label>
            <input class="form-control" type="text" name="dni">
          </div>
          <div class="form-group col-md-10">
            <label>Email</label>
            <input class="form-control" type="text" name="email">
          </div>
          <div class="form-group col-md-10">
            <label>Telefono</label>
            <input class="form-control" type="text" name="telefono">
          </div>
          <a id="save-tutor" class="btn btn-success add-tutor"><img height="20px" width="20px" src="{{URL::asset('images/save.png')}}" class="img-iconos"></a>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        {!! Form::close() !!}
        </div>

    </div>
  </div>
</div>
<script type="text/javascript">
    var urlDestroy = '{{route("tutor.destroy", ":id")}}';
    var urlEdit = '{{route("tutor.edit", ":id")}}';
    $(document).on('click', 'a.add-tutor', function(){
        $("#modal-add-tutor").modal('show');
      });
      $('#save-tutor').click(function(){

        $.ajax({
          type: $("#form-add-tutor").attr('method'),
          url: $('#form-add-tutor').attr('action'),
          data: $('#form-add-tutor').first().serialize(),
          success : function(data){
            console.log(data);
            var urlTutor = window.location.origin+"/home/tutor";
            var trvalores = $("<tr>").attr({"data-id": data.id});
            trvalores.append(crearAImg("/../images/eye.svg", "editar", "btn btn-warning", undefined,  urlTutor+"/"+data.id));
            trvalores.append(crearAImg("/../images/trashcan.svg", "borrar", "btn btn-danger delete-record", undefined, urlTutor+"/"+data.id));
            trvalores.append("<td>"+data.id+"</td>"+
                "<td>"+data.Nombre+"</td>"+
                "<td>"+data.Email+"</td>");
            $("#tbody-tutor").append(trvalores);
            $('#modal-add-tutor').modal('toggle');
            muestraMensaje("#mensaje", "alert alert-success","Se ha añadido correctamente.");
            
          },
          error: function(data){
            console.log(data);
          }
    });
  });
</script>
@stop