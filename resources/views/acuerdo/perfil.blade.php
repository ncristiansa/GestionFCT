@extends('layouts/general')
@section('pageTitle', trans('traduccion.perfiltitle'))
@section('content')
<?php
    $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    $idacuerdo = explode("/",$url);
    $perfilvisita = DB::select("SELECT Fecha, Comentario FROM visitas WHERE acuerdo_id= ?",[$idacuerdo[6]]);
    $nombreempresa = DB::select("SELECT e.Empresa FROM empresa e, acuerdo ac WHERE ac.empresa_id=e.id AND ac.id=?", [$idacuerdo[6]]);

    $visitapendiente = DB::select("SELECT Fecha, Comentario FROM visitas WHERE acuerdo_id= ? AND Realizado='No'", [$idacuerdo[6]]);
    $visitarealizada = DB::select("SELECT Fecha, Comentario FROM visitas WHERE acuerdo_id= ? AND Realizado='Si'", [$idacuerdo[6]]);
?>
<script type="text/javascript" src="{{asset('js/modal.js')}}"></script>
<h1>{{ trans('traduccion.datosAcuerdo') }}</h1>
<br>
<h2>{{ trans('traduccion.Control_visitas') }}</h2>
<h4>{{ trans('traduccion.todas') }}</h4>
<div class="table-responsive">
    <table class="table" id="table-visita">
        <thead class="thead-dark">
            <tr>
                <th scope="col">{{ trans('traduccion.tdCompany') }}</th>
                <th scope="col">{{ trans('traduccion.Fecha') }}</th>
                <th scope="col">{{ trans('traduccion.comentario') }}</th>
            </tr>
        </thead>
        <tbody>
            <?php
            for($i=0;$i<count($perfilvisita);$i++)
            {
              echo '<tr>';
              foreach ($nombreempresa[0] as $value) {
              print_r("<td>".$value."</td>");
              }
              foreach ($perfilvisita[$i] as $valor) {
              print_r("<td>".$valor."</td>");
            }
            echo '</tr>';
            }
            
            ?>
        </tbody>
    </table>
</div>
<br>
<h4>{{ trans('traduccion.pendiente') }}</h4>
<div class="table-responsive">
    <table class="table" id="table-visita">
        <thead class="thead-dark">
            <tr>
                <th scope="col">{{ trans('traduccion.tdCompany') }}</th>
                <th scope="col">{{ trans('traduccion.Fecha') }}</th>
                <th scope="col">{{ trans('traduccion.comentario') }}</th>
            </tr>
        </thead>
        <tbody>
            <?php
            for($i=0;$i<count($visitapendiente);$i++)
            {
              echo '<tr>';
              foreach ($nombreempresa[0] as $value) {
              print_r("<td>".$value."</td>");
              }
              foreach ($visitapendiente[$i] as $valor) {
              print_r("<td>".$valor."</td>");
            }
            echo '</tr>';
            }
            
            ?>
        </tbody>
    </table>
</div>
<br>
<h4>{{ trans('traduccion.realizads') }}</h4>
<div class="table-responsive">
    <table class="table" id="table-visita">
        <thead class="thead-dark">
            <tr>
                <th scope="col">{{ trans('traduccion.tdCompany') }}</th>
                <th scope="col">{{ trans('traduccion.Fecha') }}</th>
                <th scope="col">{{ trans('traduccion.comentario') }}</th>
            </tr>
        </thead>
        <tbody>
            <?php
            for($i=0;$i<count($visitarealizada);$i++)
            {
              echo '<tr>';
              foreach ($nombreempresa[0] as $value) {
              print_r("<td>".$value."</td>");
              }
              foreach ($visitarealizada[$i] as $valor) {
              print_r("<td>".$valor."</td>");
            }
            echo '</tr>';
            }
            
            ?>
        </tbody>
    </table>
</div>
<script>
    var infoEmpresa = {!! json_encode($perfilempresa->toArray(), JSON_HEX_TAG) !!};
    var infoAcuerdo = {!! json_encode($perfilacuerdo->toArray(), JSON_HEX_TAG) !!};
    var infoAlumno = {!! json_encode($perfilalumno->toArray(), JSON_HEX_TAG) !!};
    var infoTutor = {!! json_encode($perfiltutor->toArray(), JSON_HEX_TAG) !!};


    var Rol = "{{ auth()->user()->Nombre }}";
    var listaLabels = [
        "",
        "{{ trans('traduccion.acuDataAlta') }}",
        "{{ trans('traduccion.Fecha_acuerdo_firmado') }}",
        "{{ trans('traduccion.acuFi') }}",
        "",
    ];
    if($.trim($("li a").eq(7).text()) == "EMPRESA"){
      crearFormulario("h1", infoAcuerdo, "/home/empresa/"+infoEmpresa[0]["id"]+"/"+infoAcuerdo[0]["id"], "GET", true, "form-perfil", listaLabels);
    }else if($.trim($("li a").eq(7).text()) == "ALUMNO"){
      crearFormulario("h1", infoAcuerdo, "/home/alumno/"+infoAlumno[0]["id"]+"/"+infoAcuerdo[0]["id"], "GET", true, "form-perfil", listaLabels);
    }else if($.trim($("li a").eq(7).text()) == "TUTOR"){
      crearFormulario("h1", infoAcuerdo, "/home/tutor/"+infoTutor[0]["id"]+"/"+infoAcuerdo[0]["id"], "GET", true, "form-perfil", listaLabels);
    }
    $(document).ready(function() {
    if(isNaN($("li a").eq(7)))
    {
      if($.trim($("li a").eq(7).text()) == "EMPRESA")
      {
        for(var datos in infoEmpresa)
        {
          $("li a").eq(8).text(infoEmpresa[datos]["Empresa"]);
        }
      }else if($.trim($("li a").eq(7).text()) == "ALUMNO"){
        for(var datos in infoEmpresa)
        {
          $("li a").eq(8).text(infoAlumno[datos]["Nombre"]);
        }
      }else if($.trim($("li a").eq(7).text()) == "TUTOR"){
        for(var datos in infoEmpresa)
        {
          $("li a").eq(8).text(infoTutor[datos]["Nombre"]);
        }
      }
    }  
    }); 
</script>
@stop