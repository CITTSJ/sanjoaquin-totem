@extends('layouts.admin.app')
@push('css')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"/>

<style>


.zoomist-container {
  width: 100%;
  max-width: 800px;
  height: 400px;
}

.zoomist-image {
  width: 100%;
  aspect-ratio: 1;
}

.zoomist-image img {
  width: 100%;
  /* height: 400px; */
  object-fit: cover;
  object-position: center;
}


</style>
@endpush

@section('content')
<h1 class="mt-4">Nuevo Sector</h1>
@include('admin.sector._tab')
<div class="card mb-4">
  <div class="card-body table-resonsive">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
            <form action="{{ route('admin.sector.update',$s->id) }}" method="POST">
              @csrf
            <div class="card border-primary">
              <div class="card-body">
                <div class="mb-3">
                  <label for="ubicacion" class="form-label">Ubicación</label>
                  <input type="text" class="form-control" name="ubicacion" value="{{ $s->ubicacion }}" required>
                </div>
                <div class="mb-3">
                  <label for="nombre" class="form-label">Nombre</label>
                  <input type="text" class="form-control" name="nombre" value="{{ $s->nombre }}" required>
                </div>
                <div class="mb-3">
                  <label for="descripcion" class="form-label">Descripcion</label>
                  <input type="text" class="form-control" name="descripcion" value="{{ $s->descripcion }}" required>
                </div>
                <div class="mb-3">
                  <label for="tipo" class="form-label">Piso</label>
                  <select class="form-select" name="tipo" id="tipo">
                    @for ($i = -1; $i < 8; $i++)
                      @continue($i == 0)
                      <option value="{{ $i }}" {{ 'Piso ' . $i == $s->piso ? 'selected' : '' }}>PISO {{ $i }}</option>
                    @endfor
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
          <div class="card mb-3">
            <div class="card-body text-center">
              <a href="{{ asset($s->getImg()) }}" id="a_imagen" data-fancybox="gallery" data-caption="Single image">
                <img src="{{ asset($s->getImg()) }}" id="p_imagen" class="rounded img-responsive shadow-lg" style="width: 100%; height: 260px;" alt="">
              </a>
            </div>
          </div>
          <form action="{{ route('admin.sector.update',$s->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card border-dark">
              <div class="card-body">
                <div class="card-title"><strong>Editar imagen</strong></div>
                <div class="mb-3">
                  <label for="" class="form-label">Imagen</label>
                  <input type="file" class="form-control" name="" id="" placeholder=""/>
                </div>
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
@endsection
@push('js')
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<script>
  Fancybox.bind('[data-fancybox="gallery"]', {
  });

  Fancybox.getSlide()?.panzoom.zoomIn();
</script>
@endpush
