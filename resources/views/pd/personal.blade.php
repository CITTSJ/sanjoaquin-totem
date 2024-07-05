@extends('layouts.public.app')
@push('css')
<style>
  .clickable-card {
      cursor: pointer;
  }

  .card-personal {
    transition: transform 0.3s;
  }

  .card-personal:hover {
    transform: scale(1.05); /* Aumenta el tamaño al pasar el ratón */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    cursor: pointer;
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
    animation: loading 1.5s infinite;
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

  /* Estilos específicos para el esqueleto de las tarjetas */
  .skeleton-card {
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
  }

  .skeleton-img {
    height: 180px;
    background-color: #f0f0f0;
  }

  .skeleton-text {
    height: 40px;
    background-color: #e0e0e0;
    margin-bottom: 10px;
  }
</style>
@endpush

@section('content')
  <main class="bg-dark">
    <section class="pt-1 text-center container">
      <div class="row py-lg-3">
        <div class="col-lg-6 col-md-8 mx-auto">
          <h1 class="fw-light">
            <a class="btn btn-warning" href="{{ route('root') }}">
              <img src="{{ asset('pd/img/media/image242.svg') }}" class="" width="30" height="30" alt="">
            </a>
            Módulo de autoatención
          </h1>
          <div class="bg-warning text-center">
            <p class="text-dark">Encuentra tu docente y/o Colaborador</p>
          </div>
          {{-- <img src="{{ asset('pd/img/logo.png') }}" class="mt-1" width="100"  alt=""> --}}
        </div>
      </div>
    </section>

    <div class="py-2 bg-body-tertiary">
      <div class="container">
        <div class="row">
          <div class="col-md-3" style="max-height: 550px; overflow-y: auto;">
            <ul class="list-group">
                @foreach ($jefaturas as $je)
                    <li class="list-group-item mb-2 p-0" onclick="handleJefatura({{$je->id}})">
                        <div class="card text-start bg-warning card-personal">
                            <div class="card-body">
                                <h5 class="card-title"><strong>{{ $je->nombre }}</strong></h5>
                                <div class="card text-white bg-dark">
                                    <div class="card-body" style="font-size: 12px;">
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
              <div class="card-body row" style="max-height: 550px; overflow-y: auto;">
                <div class="row" id="cards-container">
                  <!-- Skeleton Loader -->
                  <div class="col-md-3 mb-3 skeleton-card">
                    <div class="skeleton-img"></div>
                    <div class="skeleton-text"></div>
                    <div class="skeleton-text" style="width: 70%;"></div>
                  </div>
                  <div class="col-md-3 mb-3 skeleton-card">
                    <div class="skeleton-img"></div>
                    <div class="skeleton-text"></div>
                    <div class="skeleton-text" style="width: 70%;"></div>
                  </div>
                  <div class="col-md-3 mb-3 skeleton-card">
                    <div class="skeleton-img"></div>
                    <div class="skeleton-text"></div>
                    <div class="skeleton-text" style="width: 70%;"></div>
                  </div>
                  <div class="col-md-3 mb-3 skeleton-card">
                    <div class="skeleton-img"></div>
                    <div class="skeleton-text"></div>
                    <div class="skeleton-text" style="width: 70%;"></div>
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
  var personales = @json($raw_personales);

  function handleJefatura(id_jefatura) {
    const container = document.getElementById('cards-container');
    container.innerHTML = '';

    // Mostrar el esqueleto de carga
    container.innerHTML = `
      <div class="col-md-3 mb-3 skeleton-card">
        <div class="skeleton-img"></div>
        <div class="skeleton-text"></div>
        <div class="skeleton-text" style="width: 70%;"></div>
      </div>
      <div class="col-md-3 mb-3 skeleton-card">
        <div class="skeleton-img"></div>
        <div class="skeleton-text"></div>
        <div class="skeleton-text" style="width: 70%;"></div>
      </div>
      <div class="col-md-3 mb-3 skeleton-card">
        <div class="skeleton-img"></div>
        <div class="skeleton-text"></div>
        <div class="skeleton-text" style="width: 70%;"></div>
      </div>
      <div class="col-md-3 mb-3 skeleton-card">
        <div class="skeleton-img"></div>
        <div class="skeleton-text"></div>
        <div class="skeleton-text" style="width: 70%;"></div>
      </div>
    `;

    // Esperar un tiempo antes de ocultar el esqueleto de carga
    // setTimeout(() => {
      container.innerHTML = '';
      personales.forEach(dato => {
        if (dato.jefatura != id_jefatura) {
          return;
        }

        var name = dato.nombre;
        var addHtml = '';
        if (dato.cargo == "ADMINISTRATIVO") {
          name = dato.name_short;
          addHtml = `<br><small style="font-size: 12px;"><strong>${dato.puesto}</strong></small>`;
        }

        const cardHTML = `
          <div class="col-md-3 mb-3">
            <div class="card clickable-card card-personal">
              <img src="${dato.imagen}" class="card-img-top" alt="Foto de Perfil">
              <div class="card-footer text-center">
                <small><strong>${dato.nombre}</strong></small> <br>
                <small style="font-size: 12px;">${dato.correo}</small>
                ${addHtml}
              </div>
            </div>
          </div>
        `;
        container.innerHTML += cardHTML;
      });
    // }, 1000); // Tiempo de espera para el esqueleto de carga (1 segundo)
  }

  document.addEventListener('DOMContentLoaded', () => handleJefatura(140));
</script>
@endpush
