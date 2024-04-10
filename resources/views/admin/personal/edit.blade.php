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
        <div class="col-md-6">
          <form action="{{ route('admin.personal.update',$p->id) }}" class="form-submit" method="POST">
            @csrf
            @method('PUT')
            <div class="card border-dark">
              <div class="card-body">
                {{-- <div class="mb-3">
                  <label for="run" class="form-label">Run</label>
                  <input type="text" class="form-control" name="run" value="{{ $p->run }}" required>
                </div> --}}
                <div class="mb-3">
                  <label for="nombre" class="form-label">Nombre</label>
                  <input type="text" class="form-control" name="nombre" value="{{ $p->nombre }}" required>
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Correo</label>
                  <input type="email" class="form-control" name="email" value="{{ $p->correo }}" required>
                </div>


                <div class="mb-3">
                  <label for="mostrar" class="form-label">Tipo {{ $p->puesto }}</label>
                  {{-- <select class="form-select form-select-lg" name="tipo" id="tipo"> --}}
                    <select class="form-select" name="puesto" id="puesto">
                      <option value="Docente" {{ $p->puesto == 'Docente' ? 'selected' : '' }}>Docente</option>
                      <option value="Administrativo/Colaborador" {{ $p->puesto == 'Docente' ? '' : 'selected' }}>Administrativo/Colaborador</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="mostrar" class="form-label">Mostrar</label>
                  <select class="form-select" name="mostrar" id="mostrar">
                    <option value="on" {{ $p->mostrar ? 'selected' : '' }}>Si</option>
                    <option value="off" {{ $p->mostrar ? '' : 'selected' }}>No</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="jefatura" class="form-label">Jefatura</label>
                  <select class="form-select" name="jefatura" id="jefatura">
                    @foreach ($jefaturas as $jefatura)
                      <option value="{{ $jefatura->id }}" {{ $p->jefatura_id == $jefatura->id ? 'selected' : '' }}>{{ $jefatura->nombre }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="text-end">
                  <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="col-md-6">
          <div class="container">
            <div class="d-flex justify-content-center">
              <div class="card mb-3">
                <img src="{{ asset($p->getPhoto()) }}" width="100px" alt="">
              </div>
            </div>
            <div class="row">
              <form action="{{ route('admin.personal.update.img',$p->id) }}" class="form-submit" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card border-dark">
                  <div class="card-body">

                    <div class="mb-3">
                      <label class="form-label" for="image">Imagen<label>
                    </div>
                    <div class="mb-3">
                      <input type="file" class="form-control" name="image" accept="image/*" onchange="preview(this)" />
                    </div>


                    <div class="d-flex justify-content-center">
                      <div id="preview"></div>
                    </div>
{{--
                    <div class="mb-3">
                      <label for="" class="form-label">Imagen</label>
                      <input type="file" class="form-control" name="image" id="" placeholder=""/>
                    </div> --}}
                    <div class="text-end">
                      <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
@push('js')
<script src="{{ asset('admin/js/preview.js') }}"></script>

@endpush
