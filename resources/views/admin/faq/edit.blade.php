@extends('layouts.admin.app')
@push('css')
<link href="{{ asset('assets/summernote-lite.min.css') }}" rel="stylesheet">
@endpush

@section('content')
<h1 class="mt-4">Preguntas frecuentes nuevo</h1>
@include('admin.faq._tab')
<div class="card mb-4">
  <div class="card-body table-resonsive">
    <div class="container">
      <div class="row">
        <form action="{{ route('admin.faq.update', $faq->id) }}" method="POST" class="form-submit">
          @csrf
          @method('PUT')
          <div class="col-md-12">
            <div class="card border-primary">
              <div class="card-body">
                <div class="mb-3">
                  <label for="run" class="form-label">Pregunta</label>
                  <input type="text" class="form-control" name="pregunta" value="{{ $faq->pregunta }}" required>
                </div>

                <div class="mb-3">
                  <label for="" class="form-label">Respuesta</label>
                  <textarea class="form-control" name="respuesta" id="summernote" rows="3" required>{!! $faq->respuesta !!}</textarea>
                </div>

                <div class="mb-3">
                  <label for="mostrar" class="form-label">Mostrar</label>
                  <select class="form-select" name="mostrar" id="mostrar">
                    <option value="on" {{ $faq->mostrar ? 'selected' : '' }}>Si</option>
                    <option value="off" {{ $faq->mostrar ? '' : 'selected' }}>No</option>
                  </select>
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
<script src="{{ asset('assets/summernote-lite.min.js') }}"></script>

<script>
  $('#summernote').summernote({
    placeholder: '',
    tabsize: 2,
    height: 200
  });
</script>
@endpush
