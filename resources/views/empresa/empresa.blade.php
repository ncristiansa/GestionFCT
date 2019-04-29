@extends('layouts/general')
@section('pageTitle', 'Empresa')
@section('content')
        <h2>Listado de Empresas</h2>
<div class="table-responsive">
    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Tipologia</th>
      <th scope="col">Perfil</th>
      <th scope="col">Idiomas</th>
      <th scope="col">Horario</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mantenimiento de equipos informáticos.</td>
      <td>Capacidad de interactuar con el alumnado con la supervisión del maestro.</td>
      <td>CA</td>
      <td>De 9- 14h</td>
      <td>
          <button type="button" class="btn btn-danger"><img class="img-iconos" src="{{URL::asset('images/trashcan.svg')}}"></button>
          <button type="button" class="btn btn-info"><img class="img-iconos" src="{{URL::asset('images/pencil.svg')}}"></button>
      </td>
    </tr>
  </tbody>
</table>
</div>
<button type="button" class="btn btn-success"><img class="img-iconos" src="{{URL::asset('images/plus.svg')}}"></button>
@stop