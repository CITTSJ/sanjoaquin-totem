@extends('pd.layouts.app')
@push('css')
    <style>
      .select2-container .select2-selection--single {
        height: 50px;
        font-size: 30px;
        align-content: center;
        justify-items: center;
        justify-content: center;
        padding-top: 10px;
        margin-top: 10px;
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
            Módulo de Auto Atención
          </h1>
          <div class="bg-warning pt-2 text-center pb-1">
            <p class="text-dark">Preguntas Frecuentes</p>
          </div>
          <img src="{{ asset('pd/img/logo.png') }}" class="mt-1" width="100"  alt="">
        </div>
      </div>
    </section>

    <div class="py-3 bg-body-tertiary">
      <div class="container">

        <div class="col-md-12 row">
          {{-- <a class="btn btn-secondary col-1" href="{{ route('root') }}">Volver</a> --}}

          <select class="form-select js-basic-single col" id="select_faq" onchange="handleFind()">
            {{-- <option>--- BÚSCADOR DE DOCENTE Y/O COLABORADOR ---</option> --}}
            @foreach ($faqs as $p)
              <option value="{{ $p->id }}">{{ $p->pregunta }}</option>
            @endforeach
          </select>
        </div>
        <div class="col-3">
          <div class="mb-3">
            <div class="bg-warning text-dark text-center my-3">
              <strong>Respuesta:</strong>
            </div>
          </div>
        </div>
        <div class="col-md-12 mt-2">
          <div class="card text-white bg-warning">
            <div class="card-body">
              <div class="container">
                <div class="row">
                  <div class="col">
                    <form>
                      <div class="mb-3">
                        <div class="bg-warning pt-4 text-center pb-1">
                          <h2>

                            <strong class="text-dark text-wrap" id="faq_respuesta">-------</strong>
                          </h2>
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
    </div>
  </main>
@endsection
@push('js')
    <script>

      var faqs = @json($faqs);

      $(document).ready(function() {
        $('.js-basic-single').select2({
          allowClear: true,
          width: 'resolve'
        });

      });

      function handleFind() {
        var id = $('#select_faq').val();
        var faq = faqs.find(f => f.id == id);

        $('#faq_respuesta').html(faq.respuesta);
      }


      handleFind();
    </script>
@endpush
