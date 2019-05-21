@extends('layouts/general')
@section('pageTitle', 'Empresa')
@include('includes.modal')
@section('content')
<script type="text/javascript" src="{{asset('js/modal.js')}}"></script>
    <h1>{{ trans('traduccion.titlesCompany') }}</h1>
<div class="table-responsive">
    <table class="table" id="table-empresa">
        <thead class="thead-dark">
            <tr>
                <th scope="col"></th>
                <th scope="col">id</th>
                <th scope="col">{{ trans('traduccion.tdCompany') }}</th>
                <th scope="col">NIF</th>
            </tr>
        </thead>
    </table>
</div>
<div id="mensaje">
</div>
<a class="btn btn-success add-company" id="agregar"><img class="img-iconos" src="{{URL::asset('images/plus.svg')}}"></a>
<script>
  var Rol = "{{ auth()->user()->name }}";
  var urlDestroy = '{{route("empresa.destroy", ":id")}}';
  var urlEdit = '{{route("empresa.edit", ":id")}}';
  var infoEmpresa = {!! json_encode($empresa->toArray(), JSON_HEX_TAG) !!};
  crearFilas("table", infoEmpresa, urlDestroy, urlEdit, "tbody-empresa", Rol, "noacuerdo");

</script>
<!-- Modal Agregar -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modal-add">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="padding:45px;">
    <h5>Agrega una nueva Empresa</h5>
    <div class="form">
        {!! Form::open(['id' => 'form-add-empresa', 'method' => 'POST']) !!}
          <div class="form-group col-md-10">
            <label>Nombre Empresa</label>
            <input class="form-control" type="text" name="empresa">
          </div>
          <div class="form-group col-md-10">
            <label>NIF</label>
            <input class="form-control" type="text" name="nif">
          </div>
          <div class="form-group col-md-10">
            <label>Topologia</label>
            <input class="form-control" type="text" name="topologia">
          </div>
          <div class="form-group col-md-10">
            <label>Perfil</label>
            <input class="form-control" type="text" name="perfil">
          </div>
          <div class="form-group col-md-10">
            <label>Idiomas</label>
            <input class="form-control" type="text" name="idiomas">
          </div>
          <div class="form-group col-md-10">
            <label>Horario</label>
            <input class="form-control" type="text" name="horario">
          </div>
          <div class="form-group col-md-10">
            <label>Seguimiento</label>
            <input class="form-control" type="text" name="seguimiento">
          </div>
          <a id="save-empresa" class="btn btn-success add-empresa"><img height="20px" width="20px" src="{{URL::asset('images/save.png')}}" class="img-iconos"></a>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        {!! Form::close() !!}
        </div>

    </div>
  </div>
</div>

<script type="text/javascript">
  var urlDestroy = '{{route("empresa.destroy", ":id")}}';
  var urlEdit = '{{route("empresa.edit", ":id")}}';
  $(document).on('click', 'a.add-company', function(){
    $("#modal-add").modal('show');
  });
  $('#save-empresa').click(function(){

    $.ajax({
      type: $("#form-add-empresa").attr('method'),
      url: $('#form-add-empresa').attr('action'),
      data: $('#form-add-empresa').first().serialize(),
      success : function(data){
        var urlEmpresa = window.location.origin+"/home/empresa";
        var trvalores = $("<tr>").attr({"data-id": data.id});
        trvalores.append(crearAImg("/../images/eye.svg", "editar", "btn btn-warning", undefined, urlEmpresa+"/"+data.id));
        trvalores.append(crearAImg("/../images/trashcan.svg", "borrar", "btn btn-danger delete-record", undefined, urlEmpresa+"/"+data.id));
        trvalores.append("<td>"+data.id+"</td>"+
        "<td>"+data.Empresa+"</td>"+
        "<td>"+data.NIF+"</td>");
        $("#tbody-empresa").append(trvalores);
        $('#modal-add').modal('toggle');
        $("input[type=text]").val("");
        muestraMensaje("#mensaje", "alert alert-success","Se ha añadido correctamente.");
        
      },
      error: function(data){
        console.log(data);
      }
    });
  });
</script>
@stop