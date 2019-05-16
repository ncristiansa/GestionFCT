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
            </tr>
        </thead>
    </table>
</div>
<div id="mensaje">
</div>
<a class="btn btn-success add-company" id="agregar"><img class="img-iconos" src="{{URL::asset('images/plus.svg')}}"></a>
<script>
  var urlDestroy = '{{route("empresa.destroy", ":id")}}';
  var urlEdit = '{{route("empresa.edit", ":id")}}';
  var infoEmpresa = {!! json_encode($empresa->toArray(), JSON_HEX_TAG) !!};
  crearFilas("table", infoEmpresa, urlDestroy, urlEdit)

  $(document).ready(function(){
    $(".contenido").on('click', 'a.add-company', function(event){
        event.preventDefault();
        $("#form-add").attr('action', $(this).attr('href'));
        $('#modal-add').modal("show");
    });
    $("#save").on("click", function(){
        $.ajax({
            type: $("#form-add").attr('method'),
            url: $('#form-add').attr('action'),
            data: $('#form-add').first().serialize(),
            success: function(data){
              $('#modal-add').modal('hide');
              console.log("Agregados");
            },
            error: function(data){
                var errores = data.responseJSON;
                    if(errores)
                    {
                        $.each(errores, function(i){
                            console.log(errores[i]);
                        })
                    }
            }
        });
    });
});
</script>
<!-- Modal Agregar -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modal-add">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="padding:45px;">
    <h5>Agrega una nueva Empresa</h5>
    <div class="form">
        {!! Form::open(['id' => 'form-add', 'method' => 'POST']) !!}
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
          <a id="save" class="btn btn-success"><img height="20px" width="20px" src="{{URL::asset('images/save.png')}}" class="img-iconos"></a>
        {!! Form::close() !!}
        </div>
    </div>
  </div>
</div>


@stop