@extends('layouts.public.app')
@push('css')
<style>
  .clickable-card {
      cursor: pointer;
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
          <div class="col-md-3" style="max-height: 500px; overflow-y: auto;">
            <ul class="list-group">
                @foreach ($jefaturas as $je)
                    <li class="list-group-item mb-1 p-0" onclick="handleJefatura({{$je->id}})">
                        <div class="card text-start bg-warning">
                            <div class="card-body">
                                <h5 class="card-title"><strong>{{ $je->nombre }}</strong></h5>
                                <div class="card text-white bg-dark">
                                    <div class="card-body">
                                        <small>{{ $je->glosa }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
          <div class="col mt-2">
            <div class="card text-white bg-secondary">
              <div class="card-body row">
                <div class="container" style="max-height: 500px; overflow-y: auto;">
                  <div class="row" id="cards-container">
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

      function handleJefatura(id_jefatura) {
        const container = document.getElementById('cards-container');
        container.innerHTML = '';
        personales.forEach(dato => {

            if (dato.jefatura != id_jefatura) {
                return;
            }
            const cardHTML = `
                <div class="col-md-3 mb-3">
                    <div class="card clickable-card" style="" onclick="handleJefatura(${dato.jefatura})">
                      <img src="${dato.imagen}" class="card-img-top" alt="Foto de Perfil">
                      <div class="card-body text-center">
                        // <h5 class="card-title">${dato.nombre}</h5>
                        <small><strong>${dato.nombre}</strong></small>
                        <small>${dato.correo}</small>
                      </div>
                    </div>
                </div>`;
            container.innerHTML += cardHTML;
        });
      }

      document.addEventListener('DOMContentLoaded', handleJefatura(10));
    </script>
@endpush
