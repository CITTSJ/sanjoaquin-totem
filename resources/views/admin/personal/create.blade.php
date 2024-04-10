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
        <form action="{{ route('admin.personal.store') }}" method="POST" class="form-submit" enctype="multipart/form-data">
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
                  <label for="nombre" class="form-label">Nombre</label>
                  <input type="text" class="form-control" name="nombre" required>
                </div>
                <div class="mb-3">
                  <label for="puesto" class="form-label">Tipo</label>
                  {{-- <select class="form-select form-select-lg" name="tipo" id="tipo"> --}}
                    <select class="form-select" name="puesto" id="puesto">
                      <option value="Docente">Docente</option>
                      <option value="Administrativo/Colaborador">Administrativo/Colaborador</option>
                  </select>
                </div>

                <div class="mb-3">
                  <label for="jefatura" class="form-label">Jefatura</label>
                  <select class="form-select" name="jefatura" id="jefatura">
                    @foreach ($jefaturas as $jefatura)
                      <option value="{{ $jefatura->id }}">{{ $jefatura->nombre }}</option>
                    @endforeach
                  </select>
                </div>
                {{-- <div class="mb-3">
                  <label for="" class="form-label">Imagen</label>
                  <input type="file" class="form-control" name="" id="" placeholder=""/>
                </div> --}}

                <div class="mb-3">
                  <label class="form-label" for="image">Imagen<label>
                </div>
                <div class="mb-3">
                  <input type="file" class="form-control" name="image" accept="image/*" onchange="preview(this)" />
                </div>

                <div class="d-flex justify-content-center">
                  <div id="preview"></div>
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
<script src="{{ asset('admin/js/preview.js') }}"></script>

@endpush
