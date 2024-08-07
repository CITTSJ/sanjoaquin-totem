@extends('layouts.public.app')
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
            <p class="text-dark">Encuentra tu docente y/o Colaborador</p>
          </div>
          <img src="{{ asset('pd/img/logo.png') }}" class="mt-1" width="100"  alt="">
        </div>
      </div>
    </section>

    <div class="py-3 bg-body-tertiary">
      <div class="container">
{{--
        <div class="row">


          <div class="col-md-3">
            <div class="card text-start bg-warning">
              <div class="card-body">
                <h4 class="card-title">Escuela de Informatica</h4>
                <p class="card-text">Cristian Barra</p>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="card text-start bg-warning">
              <div class="card-body">
                <h4 class="card-title">Escuela de Informatica</h4>
                <p class="card-text">Cristian Barra</p>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="card text-start bg-warning">
              <div class="card-body">
                <h4 class="card-title">Escuela de Informatica</h4>
                <p class="card-text">Cristian Barra</p>
              </div>
            </div>
          </div>
        </div> --}}

        <div class="row">
          <div class="col-md-3 row" style="max-height: 600px;">
            <div class="col-md-12 mb-1">
              <div class="card text-start bg-warning">
                <div class="card-body">
                  <h5 class="card-title"><strong>Jóse Luis Donoso</strong></h5>
                  <small class="bg-white">
                    Téc. en Energías Renovables <br>
                    Téc. En Mecánica Automotriz y autotrónica
                  </small>
                </div>
              </div>
            </div>


          </div>
          <div class="col mt-2">
            <div class="card text-white bg-secondary">
              <div class="card-body row">
                <div class="container">
                  <div class="row">

                    <div class="col">
                      <div class="col-md-12 row">
                        <select class="form-select js-basic-single col mx-3" id="select_personal" onchange="handleFind()">
                          <option>--- BÚSCADOR DE DOCENTE Y/O COLABORADOR ---</option>
                          @foreach ($raw_personales as $p)
                            <option value="{{ $p['id'] }}">{{ $p['nombre'] }}</option>
                          @endforeach
                        </select>
                      </div>
                      <form>
                        <div class="mb-3">
                          <div class="bg-warning pt-4 text-center pb-1">
                            <p class="text-dark" id="p_puesto">-------</p>
                          </div>
                        </div>
                        <div class="mb-3">
                          <div class="bg-warning pt-4 text-center pb-1">
                            <p class="text-dark" id="p_correo">-------</p>
                          </div>
                        </div>
                        <div class="mb-3">
                          <div class="bg-warning pt-4 text-center pb-1">
                            <p class="text-dark" id="p_cargo">--------</p>
                          </div>
                        </div>
                        <div class="mb-3">
                          <div class="bg-warning pt-4 text-center pb-1">
                            <p class="text-dark" id="p_direccion">--------</p>
                          </div>
                        </div>
                      </form>
                    </div>
                    <div class="col-5">
                      <div class="text-center">
                        <img src="{{ asset('pd/img/media/default.png') }}" id="p_imagen" class="rounded shadow-lg" style="width: 300px; height: 100%;" alt="">
                      </div>
                    </div>
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
    <script>

      // var personal = "{{ json_encode($raw_personales) }}";
      var personales = @json($raw_personales);

      $(document).ready(function() {
        $('.js-basic-single').select2({
          allowClear: true,
          width: 'resolve'
        });

      });

      function handleFind() {
        var id = $('#select_personal').val();
        var personal = personales.find(p => p.id == id);
        console.log(personal);

        $('#p_imagen').attr('src', personal.imagen);
        // $('#p_nombre').html(personal.nombre);
        $('#p_puesto').html(personal.puesto);
        $('#p_correo').html(personal.correo);
        $('#p_cargo').html(personal.cargo);
        $('#p_direccion').html(personal.ubicacion);
      }
    </script>
@endpush
