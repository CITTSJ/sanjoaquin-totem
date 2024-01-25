@extends('layouts.admin.app')
@push('css')

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />

<style>
</style>
@endpush

@section('content')

<h1 class="mt-4">Personal</h1>
@include('admin.personal._tab')

<div class="card mb-4">
  <div class="card-body table-resonsive">
    <table id="datatablesSimple" class="table table-sm table-hover">
      <thead>
        <tr>
          <th>IMG</th>
          <th>NOMBRE</th>
          <th>CORREO</th>
          <th>PUESTO</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($personals as $p)
        <tr>
          <td><img src="{{ asset($p->getPhoto()) }}" alt="" width="80px"></td>
          <td><small>{{ $p->nombre }}</small></td>
          <td>{{ $p->correo }}</td>

          {{-- <td>{{ $p->tipo }}</td> --}}
          {{-- <td>{{ $p->cargo }}</td> --}}
          {{-- <td>{{ $p->ubicacion }}</td> --}}
          <td>{{ $p->puesto }}</td>
          <td>
            <a href="{{ route('admin.personal.edit', $p->id ) }}" class="btn btn-sm btn-warning">Editar</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection
@push('js')
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>

<script>
  $(document).ready( function () {
    $('#datatablesSimple').DataTable();
} );
</script>
@endpush
