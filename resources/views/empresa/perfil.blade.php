@extends('layouts/general')
@section('pageTitle', 'Perfil')
@section('content')
@include('includes.modal')
<script type="text/javascript" src="{{asset('js/modal-acuerdo.js')}}"></script>
<script type="text/javascript" src="{{asset('js/modal.js')}}"></script>
<h1>{{ trans('traduccion.h1CompanyData') }}</h1>

@foreach($perfilempresa as $emp)
    <h2>{{ trans('traduccion.h2Agreementof') }} <b id='nombre-empresa'>{{$emp->Empresa}}</b></h2>
@endforeach

<div class="table-responsive">
    <table class="table" id="table-acuerdo">
        <thead class="thead-dark">
            <tr>
                <th scope="col"></th>
                <th scope="col">id</th>
                <th scope="col">Fecha Alta</th>
                <th scope="col">Acabada</th>
                <th scope="col">Fin</th>
            </tr>
        </thead>
    </table>
    
</div>
<a class="btn btn-success add-acuerdo" id="agregar"><img class="img-iconos" src="{{URL::asset('images/plus.svg')}}"></a>
<div id="mensaje">
</div>

<script>
    var infoEmpresa = {!! json_encode($perfilempresa->toArray(), JSON_HEX_TAG) !!};
    var infoAcuerdoEmpresa = {!! json_encode($acuerdoempresa->toArray(), JSON_HEX_TAG) !!};
    var Rol = "{{ auth()->user()->name }}";
    var listaLabels = [
        "",
        "{{ trans('traduccion.compName') }}",
        "{{ trans('traduccion.compNIF') }}",
        "{{ trans('traduccion.compTopo') }}",
        "{{ trans('traduccion.compPerfil') }}",
        "{{ trans('traduccion.compIdioma') }}",
        "{{ trans('traduccion.compHorario') }}",
        "{{ trans('traduccion.compSeg') }}",
        "",
    ];
    crearFormulario("h1", infoEmpresa, "/home/empresa/"+infoEmpresa[0]["id"], "GET", true, "form-perfil", listaLabels);

    
    crearFilas("table", infoAcuerdoEmpresa, "/home/empresa/"+infoEmpresa[0]["id"], "/home/empresa/"+infoEmpresa[0]["id"], "tbody-empresa-acuerdo", Rol, "acuerdo");
    $(document).ready(function() {
    if(isNaN($("li a").eq(4)))
    {
      for(var datos in infoEmpresa)
      {
        $("li a").eq(4).text(infoEmpresa[datos]["Empresa"]);
      }
    }  
    });
    
</script>
<!-- Agregar acuerdo -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modal-add-acuerdo">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="padding:45px;">
    <h5>Agrega un nuevo acuerdo</h5>
    <div class="form">
        {!! Form::open(['id' => 'form-add-acuerdo', 'method' => 'POST']) !!}
          <div class="form-group col-md-10">
            <label>Fecha Alta</label>
            <input class="form-control" type="date" name="fecha-alta">
          </div>
          <div class="form-group col-md-10">
            <label>Acabada</label>
            <input class="form-control" type="date" name="acabada">
          </div>
          <div class="form-group col-md-10">
            <label>Fin</label>
            <input class="form-control" type="date" name="fin">
          </div>
          <a id="save-acuerdo-empresa" class="btn btn-success add-acuerdo-empresa"><img height="20px" width="20px" src="{{URL::asset('images/save.png')}}" class="img-iconos"></a>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        {!! Form::close() !!}
        </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  var infoEmpresa = {!! json_encode($perfilempresa->toArray(), JSON_HEX_TAG) !!};
  $(document).on('click', 'a.add-acuerdo', function(){
    $("#modal-add-acuerdo").modal('show');
    var ruta = $("#form-add-acuerdo").attr('action');
    $("#form-add-acuerdo").attr('action', ruta+"/"+infoEmpresa[0]["id"]);
  });
  $('#save-acuerdo-empresa').click(function(){

    $.ajax({
      type: $("#form-add-empresa").attr('method'),
      url: $("#form-add-acuerdo").attr('action'),
      data: $('#form-add-empresa').first().serialize(),
      success : function(data){
        console.log(data);
        var urlEmpresa = window.location.origin+"/home/empresa/"+infoEmpresa[0]["id"];
        var trvalores = $("<tr>").attr({"data-id": data.id});
        trvalores.append(crearAImg("/../images/eye.svg", "editar", "btn btn-warning", undefined, "/home/empresa/"+infoEmpresa[0]["id"]+"/"+data.id));
        trvalores.append(crearAImg("/../images/trashcan.svg", "borrar", "btn btn-danger delete-record", undefined, "/home/empresa/"+infoEmpresa[0]["id"]+"/"+data.id));
        trvalores.append("<td>"+data.id+"</td>"+
        "<td>"+data.Fecha_Alta+"</td>"+
        "<td>"+data.Acabada+"</td>"+
        "<td>"+data.Fin+"</td>");
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