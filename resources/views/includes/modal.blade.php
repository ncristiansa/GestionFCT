<!-- Modal Empresa -->
<div class="modal" tabindex="-1" role="dialog" id="modal-delete">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Eliminando registro / Empresa</h5>
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
        <button id="si-empresa" type="button" class="btn btn-danger">Si estoy seguro</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal Alumno -->
<div class="modal" tabindex="-1" role="dialog" id="modal-delete-alumno">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Eliminando registro / Alumno</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>¿Estás seguro de eiminar éste registro?</p>
        {!! Form::open(['id' => 'form-delete-alumno', 'method' => 'DELETE']) !!}
        {!! Form::close() !!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button id="si-alumno" type="button" class="btn btn-danger">Si estoy seguro</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal Tutor -->
<div class="modal" tabindex="-1" role="dialog" id="modal-delete-tutor">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Eliminando registro / Tutor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>¿Estás seguro de eiminar éste registro?</p>
        {!! Form::open(['id' => 'form-delete-tutor', 'method' => 'DELETE']) !!}
        {!! Form::close() !!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button id="si-tutor" type="button" class="btn btn-danger">Si estoy seguro</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal acuerdo -->
<div class="modal" tabindex="-1" role="dialog" id="modal-acuerdo">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Eliminando registro / Acuerdo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>¿Estás seguro de eiminar éste registro?</p>
        {!! Form::open(['id' => 'form-delete-acuerdo', 'method' => 'DELETE']) !!}
        {!! Form::close() !!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button id="si-seguro-acuerdo" type="button" class="btn btn-danger">Si estoy seguro</button>
      </div>
    </div>
  </div>
</div>
