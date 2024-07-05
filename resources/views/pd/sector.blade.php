@extends('layouts.public.app')
@push('css')
{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/zoomist@2/zoomist.css" /> --}}

{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"/> --}}

<link rel="stylesheet" href="{{ asset('assets/fancybox.css') }}">

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

  .select2-container .select2-selection--single {
    height: 40px;
    font-size: 20px;
    align-content: center;
    justify-items: center;
    justify-content: center;
  }

  #p_imagen {
    transition: opacity 0.5s ease-in-out;
    opacity: 1;
  }

  /* Nueva clase para ocultar la imagen */
  #p_imagen.hidden {
    opacity: 0;
  }

  /* Estilos del esqueleto de carga */
  .skeleton {
    display: block;
    width: 100%;
    height: 100%;
    background-color: #f0f0f0;
    background-image: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
    background-size: 200% 100%;
    background-repeat: no-repeat;
    animation: loading 1s infinite;
  }

  @keyframes loading {
    0% { background-position: 0 0; }
    100% { background-position: 100% 0; }
  }

  /* Opcional: añadir una clase para mostrar el esqueleto */
  .image-skeleton {
    position: relative;
    overflow: hidden;
  }

  .image-skeleton .skeleton {
    position: absolute;
    top: 0;
    left: 0;
    z-index: 1;
  }

  .image-skeleton img {
    z-index: 2;
  }
</style>
@endpush

@section('content')
  <main class="bg-dark">
    <section class="py-1 text-center container">
      <div class="row py-lg-3">
        <div class="col-lg-6 col-md-8 mx-auto">
          <h1 class="fw-light">
            <a class="btn btn-warning" href="{{ route('root') }}">
              <img src="{{ asset('pd/img/media/image242.svg') }}" class="" width="30" height="30" alt="">
            </a>
            Módulo de autoatención
          </h1>
          <div class="bg-warning pt-2 text-center pb-1">
            <p class="text-dark">Encuentra tu sala o área de la sede</p>
          </div>
          <img src="{{ asset('pd/img/logo.png') }}" class="mt-1" width="100"  alt="">
        </div>
      </div>
    </section>

    <div class="py-3 bg-body-tertiary">
      <div class="container">
        <div class="col-md-12 row">
          {{-- <a class="btn btn-secondary col-1" href="{{ route('root') }}">Volver</a> --}}
        </div>
        <div class="col-md-12 mt-2">
          <div class="card text-white bg-secondary">
            <div class="card-body">
              <div class="container">
                <div class="row">
                  <div class="col-7">
                    <div class="text-center">
                      <div class="image-skeleton" id="image-container">
                        <div class="skeleton"></div>
                        <a href="{{ asset('pd/img/sector/template.png') }}" id="a_imagen" data-fancybox="gallery" data-caption="Single image">
                          <img src="{{ asset('pd/img/sector/template.png') }}" id="p_imagen" class="rounded img-responsive shadow-lg" style="width: 100%; height: 100%;" alt="">
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <form>
                      <div class="mb-3">
                        <select class="form-select form-lg-select  js-basic-single col" id="select_sector" onchange="handleFind()">
                          {{-- <option>--- BÚSCADOR DE DOCENTE Y/O COLABORADOR ---</option> --}}
                          @foreach ($raw_sectores as $s)
                            <option value="{{ $s['id'] }}">{{ str_replace('_',' ', $s['nombre']) }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="mb-3">
                        <div class="card bg-warning pt-4 text-center pb-1">
                          <h1 class="text-dark" id="p_piso">--------</h1>
                        </div>
                      </div>
                      {{-- <div class="mb-3">
                        <div class="bg-dark pt-4 text-center pb-1">
                          <h1 class="text-white" id="p_ubicacion">--------</h1>
                        </div>
                      </div> --}}
                      {{-- <div class="mb-3">
                        <div class="bg-primary pt-4 text-center pb-1">
                          <p class="text-dark" id="p_descripcion">--------</p>
                        </div>
                      </div> --}}
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection

@push('js')
  {{-- <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script> --}}
  <script src="{{ asset('assets/fancybox.umd.js')}}"></script>

  {{-- <script src="https://cdn.jsdelivr.net/npm/zoomist@2/zoomist.umd.js"></script> --}}
  <script>
    Fancybox.bind('[data-fancybox="gallery"]', {});

    var sectores = @json($raw_sectores);

    $(document).ready(function() {
      $('.js-basic-single').select2({
        allowClear: true,
        width: 'resolve'
      });

      // Llamar a handleFind() en el inicio para asegurar que se muestren los datos del primer sector
      handleFind();
    });

    function handleFind() {
      var id = $('#select_sector').val();
      var sector = sectores.find(p => p.id == id);

      // Referencia al contenedor de la imagen y a la imagen
      var container = $('#image-container');
      var imagen = $('#p_imagen');

      // Aplicar la clase que oculta la imagen actual y mostrar el esqueleto de carga
      imagen.addClass('hidden');
      container.find('.skeleton').show();

      // Cambiar la imagen después de un breve retraso
      setTimeout(function() {
        imagen.attr('src', sector.imagen);
        $('#a_imagen').attr('href', sector.imagen);

        // Ocultar el esqueleto de carga y mostrar la nueva imagen
        container.find('.skeleton').hide();
        imagen.removeClass('hidden');
      }, 500); // Tiempo debe coincidir con la duración de la transición

      // Actualizar los detalles del sector
      $('#p_piso').html(sector.piso);
      $('#p_ubicacion').html(sector.ubicacion);
    }
  </script>
@endpush
