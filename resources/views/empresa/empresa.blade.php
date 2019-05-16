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
                <th scope="col">{{ trans('traduccion.tdTopology') }}</th>
                <th scope="col">{{ trans('traduccion.tdProfile') }}</th>
                <th scope="col">{{ trans('traduccion.tdLanguages') }}</th>
                <th scope="col">{{ trans('traduccion.tdSchedule') }}</th>
                <th scope="col">{{ trans('traduccion.tdTracing') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($empresa as $emp)
            <tr data-id="{{$emp->id}}">
                    <td>
                        <a href="{{route('empresa.destroy',$emp->id)}}" class="btn btn-danger delete-record"><img class="img-iconos" src="../images/trashcan.svg"></a>
                        <a href="{{route('empresa.edit', $emp->id)}}" class="btn btn-warning"><img class="img-iconos" src="../images/eye.svg"></a>
                    </td>
                    <td>{{$emp->id}}</td>
                    <td>{{$emp->Empresa}}</td>
                    <td>{{$emp->NIF}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div id="mensaje">
</div>
<button type="button" class="btn btn-success"><img class="img-iconos" src="{{URL::asset('images/plus.svg')}}"></button>

<div class="modal" tabindex="-1" role="dialog" id="modal-edit">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Eliminando registro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>¿Estás seguro de eiminar éste registro?</p>
        {!! Form::open(['id' => 'form-delete', 'method' => 'DELETE']) !!}
        {!! Form::close() !!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button id="si-seguro" type="button" class="btn btn-danger">Si estoy seguro</button>
      </div>
    </div>
  </div>
</div>

@stop