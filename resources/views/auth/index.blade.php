@extends('layouts.public.app')
@push('css')
<style>
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
        <div class="row justify-content-center">

          <div class="col-md-4">

            <div class="card bg-secondary">
              <div class="card-body">
                <h4 class="card-title text-center"><strong>Acceso Plantilla Didáctica</strong></h4>
                {{-- <p class="card-text">Text</p> --}}
                <form action="{{ route('login') }}" method="POST"  class="form-submit">
                  @csrf
                  <div class="mb-3">
                    <label for="username" class="form-label">Correo</label>
                    <input type="email" class="form-control" name="email" required autofocus>
                  </div>
                  <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" name="pass" required>
                  </div>
                  <div class="d-grid">

                    <button type="submit" class="btn btn-dark btn-lg">Iniciar sesión</button>
                  </div>

                  <div class="text-end mt-2">
                    <small>V0.1</small>
                  </div>
                </form>

              </div>
            </div>
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
