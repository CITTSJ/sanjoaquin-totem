@extends('layouts.admin.app')
@push('css')

@endpush

@section('content')
<h1 class="mt-4">Nuevo Sector</h1>
@include('admin.sector._tab')
<div class="card mb-4">
  <div class="card-body table-resonsive">
    <div class="container">
      <div class="row">
        <form action="{{ route('admin.sector.store') }}"  class="form-submit" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="col-md-6">
            <div class="card border-primary">
              <div class="card-body">
                <div class="mb-3">
                  <label for="ubicacion" class="form-label">Ubicación</label>
                  <input type="text" class="form-control" name="ubicacion" required>
                </div>
                <div class="mb-3">
                  <label for="nombre" class="form-label">Nombre</label>
                  <input type="text" class="form-control" name="nombre" required>
                </div>
                <div class="mb-3">
                  <label for="descripcion" class="form-label">Descripcion</label>
                  <input type="text" class="form-control" name="descripcion" required>
                </div>
                <div class="mb-3">
                  <label for="piso" class="form-label">Piso</label>
                  <select class="form-select" name="piso" id="piso">
                    @for ($i = -1; $i < 9; $i++)
                      @continue($i == 0)
                      <option value="Piso {{ $i }}">PISO {{ $i }}</option>
                    @endfor
                  </select>
                </div>
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
