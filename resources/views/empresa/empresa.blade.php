@extends('layouts/general')
@section('pageTitle', 'Empresa')
@section('content')
        <h2>Listado de Empresas</h2>
        <table class="table">
            <thead>
                <tr class="bg-primary">
                    <th scope="col">Cod. Empresa</th>
                    <th scope="col">Tipologia de trabajo</th>
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
                            <button type="button" class="btn btn-danger">Baja</button>
                            <button type="button" class="btn btn-info">Modificación</button>
                        </td>
                  </tr>
                </tbody>
        </table>
        <button type="button" class="btn btn-success">Alta</button>
@stop