@extends('layouts/general')
@section('pageTitle', 'Perfil')
@section('content')
@include('includes.modal')
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
<div id="mensaje">
</div>

<script>
    var infoEmpresa = {!! json_encode($perfilempresa->toArray(), JSON_HEX_TAG) !!};
    var infoAcuerdoEmpresa = {!! json_encode($acuerdoempresa->toArray(), JSON_HEX_TAG) !!};
    var Rol = "{{ auth()->user()->Nombre }}";
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
    if(isNaN($("li a").eq(6)))
    {
      for(var datos in infoEmpresa)
      {
        $("li a").eq(6).text(infoEmpresa[datos]["Empresa"]);
      }
    }  
    });
    
</script>
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