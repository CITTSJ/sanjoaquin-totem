@extends('layouts.admin.app')
@push('css')

<link rel="stylesheet" href="{{ asset('assets/jquery.dataTables.css') }}" />

<style>
</style>
@endpush

@section('content')

<h1 class="mt-4">Sectores de Duoc San Joaquín</h1>
@include('admin.sector._tab')
<div class="card mb-4">
  <div class="card-body table-resonsive">
    <table id="datatablesSimple" class="table table-sm table-hover">
      <thead>
        <tr>
          <th>IMG</th>
          <th>PISO</th>
          <th>NOMBRE</th>
          <th>UBICACIÓN</th>
          {{-- <th>TIPO</th> --}}
          {{-- <th>CARGO</th> --}}
          {{-- <th>UBICACION</th> --}}
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($sectores as $s)
        <tr>
          {{-- $table->string('ubicacion')->nullable();
          $table->string('nombre')->nullable();
          $table->string('imagen')->nullable();
          $table->string('piso')->nullable();
          $table->string('descripcion')->nullable();
          $table->boolean('mostrar')->default(true);
          $table->boolean('activo')->default(true); --}}
          <td><img src="{{ asset($s->getPhoto()) }}" alt="" width="80px"></td>
          <td>{{ $s->piso }}</td>
          <td><small>{{ $s->getName() }}</small></td>
          <td><small>{{ $s->ubicacion }}</small></td>
          {{-- <td>{{ $p->tipo }}</td> --}}
          {{-- <td>{{ $p->cargo }}</td> --}}
          {{-- <td>{{ $p->ubicacion }}</td> --}}
          {{-- <td>{{ $p->puesto }}</td> --}}
          <td>
            <a href="{{ route('admin.sector.edit', $s->id ) }}" class="btn btn-sm btn-warning">Editar</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection
@push('js')
<script src="{{ asset('assets/jquery.dataTables.js') }}"></script>
<script>
  $(document).ready( function () {
    $('#datatablesSimple').DataTable();
} );
</script>
@endpush
