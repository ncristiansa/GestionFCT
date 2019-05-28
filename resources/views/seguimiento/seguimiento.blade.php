@extends('layouts/general')
@section('pageTitle', trans('traduccion.controlseguimiento'))
@section('content')
<h1>{{ trans('traduccion.controlseguimiento') }}</h1>
<?php
	$acunofinalizado = DB::select("SELECT e.Empresa FROM acuerdo ac, empresa e  WHERE e.id=ac.empresa_id AND DATE(ac.Fin)>CURDATE()");
	$acualumno = DB::select("SELECT a.Nombre FROM acuerdo ac, alumno a WHERE a.id=ac.alumno_id AND DATE(ac.Fin)>CURDATE()");
	$acututor = DB::select("SELECT t.Nombre FROM acuerdo ac, tutor t, acuerdo_tutor at , alumno al WHERE ac.id=at.acuerdo_id AND t.id=at.tutor_id AND al.id=at.alumno_id AND DATE(ac.Fin)>CURDATE()");
	$acuresponsable = DB::select("SELECT p.Tipo FROM persona p, acuerdo a WHERE p.empresa_id=a.empresa_id AND DATE(a.Fin)>CURDATE()");
	$descripsegui = DB::select("SELECT s.Descripcion FROM seguimiento s, acuerdo a WHERE a.id=s.acuerdo_id AND DATE(a.fin)>CURDATE()");

?>
<h4>{{ trans('traduccion.acordnoterminado') }}</h4>
<div class="table-responsive">
    <table class="table" id="table-visita">
        <thead class="thead-dark">
            <tr>
                <th scope="col">{{ trans('traduccion.tdCompany') }}</th>
                <th scope="col">{{ trans('traduccion.tdTracing') }}</th>
                <th scope="col">{{ trans('traduccion.student') }}</th>
                <th scope="col">Tutor</th>
                <th scope="col">{{ trans('traduccion.Responsable') }}</th>
            </tr>
        </thead>
        <tbody>
        	<?php
        	echo '<tr>';
            for($i=0;$i<count($acunofinalizado);$i++)
            {
              
              foreach ($acunofinalizado[$i] as $value) {
              	print_r("<td>".$value."</td>");
              }
              foreach($descripsegui[$i] as $value){
                print("<td>".$value."</td>");
              }
              foreach ($acualumno[$i] as $value) {
                print_r("<td>".$value."</td>");
              }
              foreach ($acututor[$i] as $value) {
                print_r("<td>".$value."</td>");
              }
              foreach ($acuresponsable[$i] as $value) {
                print_r("<td>".$value."</td>");
              }
              
              
            echo '</tr>';
            }
            
            ?>
       	</tbody>
    </table>
</div>
@stop