@extends('layouts.admin.app')
@push('css')

@endpush

@section('content')
<h1 class="mt-4">Personal</h1>
@include('admin.personal._tab')
<div class="card mb-4">
  <div class="card-body table-resonsive">
    <div class="container">
      <div class="row">
        <form action="{{ route('admin.personal.store') }}" method="POST">
          @csrf
          <div class="col-md-6">
            <div class="card border-primary">
              <div class="card-body">
                <div class="mb-3">
                  <label for="run" class="form-label">Run</label>
                  <input type="text" class="form-control" name="run" required>
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Correo</label>
                  <input type="email" class="form-control" name="email" required>
                </div>
                <div class="mb-3">
                  <label for="tipo" class="form-label">Tipo</label>
                  {{-- <select class="form-select form-select-lg" name="tipo" id="tipo"> --}}
                    <select class="form-select" name="tipo" id="tipo">
                    <option value="Administrativo/Colaborador">Administrativo/Colaborador</option>
                    <option value="Docente">Docente</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="" class="form-label">Imagen</label>
                  <input type="file" class="form-control" name="" id="" placeholder=""/>
                </div>
                <div class="text-end">
                  <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
              </div>
            </div>

          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
@push('js')

@endpush
