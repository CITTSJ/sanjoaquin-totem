@extends('layouts.public.app')
@push('css')
<style>
  .card {
    transition: transform 0.3s;
  }

  .card:hover {
    transform: scale(1.05); /* Aumenta el tamaño al pasar el ratón */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    cursor: pointer;
  }
</style>
@endpush

@section('content')
  <main class="bg-dark">
    <section class="py-5 text-center container">
        <div class="row py-lg-3">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Módulo de autoatención</h1>
                <img src="{{ asset('pd/img/logo.png') }}" width="100"  alt="">
                {{-- <p class="lead text-body-secondary">Something short and leading about the collection below—its contents,
                    the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it
                    entirely.</p>
                <p>
                    <a href="#" class="btn btn-primary my-2">Main call to action</a>
                    <a href="#" class="btn btn-secondary my-2">Secondary action</a>
                </p> --}}
            </div>
        </div>
    </section>

    <div class="py-3 bg-body-tertiary">
      <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
          <div class="col">
            <div class="card shadow-sm bg-warning" style="height: 300px" onclick="window.location = '{{ route('sector') }}'">
              <div class="justify-content-center text-center">
                <img class="bd-placeholder-img my-3" width="80px" src="{{ asset('pd/img/media/image235.svg')}}" alt="">
              </div>
              <div class="card-body bg-warning">
                <h4 class="card-text text-center">
                  <strong>Busca salas, laboratorios o áreas de servicio de la sede</strong>
                </h4>
              </div>
            </div>
            {{-- <p class="text-dark text-center mt-2">
              Pincha aquí y encuentra tu sala, laboratorio o taller.
            </p> --}}
          </div>

          <div class="col">
            <div class="card shadow-sm bg-warning" style="height: 300px" onclick="window.location = '{{ route('personal') }}'">
              <div class="justify-content-center text-center">
                <img class="bd-placeholder-img my-3" width="100px" src="{{ asset('pd/img/media/image237.svg')}}" alt="">
              </div>
              <div class="card-body bg-warning">
                <h4 class="card-text text-center">
                  <strong>Busca los datos de contacto de docentes o administrativos de la sede</strong>
                </h4>
              </div>
            </div>
            {{-- <p class="text-dark text-center mt-2">
              Pincha aquí y encuentra el correo de tu docente o de algún colaborador.
            </p> --}}
          </div>

          <div class="col">
            <div class="card shadow-sm bg-warning" style="height: 300px" onclick="window.location = '{{ route('faq') }}'">
              <div class="justify-content-center text-center">
                <img class="bd-placeholder-img my-3" width="110px" src="{{ asset('pd/img/media/image239.svg')}}" alt="">
              </div>
              <div class="card-body bg-warning">
                <h4 class="card-text text-center">
                  <strong>Revisa las respuestas a tus preguntas de distintas áreas de la sede</strong>
                </h4>
              </div>
            </div>
            {{-- <p class="text-dark text-center mt-2">
              Pincha aquí y encuentra las respuestas a tus preguntas frecuentes.
            </p> --}}
          </div>
        </div>
      </div>
    </div>
  </main>

  {{-- <footer class="text-body-secondary py-5">
      <div class="container">
          <p class="float-end mb-1">
              <a href="#">Back to top</a>
          </p>
          <p class="mb-1">Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
          <p class="mb-0">New to Bootstrap? <a href="/">Visit the homepage</a> or read our <a
                  href="/docs/5.3/getting-started/introduction/">getting started guide</a>.</p>
      </div>
  </footer> --}}
@endsection
