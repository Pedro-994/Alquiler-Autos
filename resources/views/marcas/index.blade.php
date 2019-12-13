@extends('layouts/head')
@section('title')
	Marcas
@endsection
@extends('layouts.tables')
@section('titulo')
<i class="fas fa-file-invoice-dollar fa-fw"></i> LISTA MARCAS
<div class="container-fluid">
  <ul class="full-box list-unstyled page-nav-tabs">
      <li>
          <a href="/marcas/create"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR MARCA</a>
      </li>
      <li>
          <a href="/marcas"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE MARCAS</a>
      </li>
      <li>
          <a href="client-search.html"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR MARCA</a>
      </li>
  </ul>	
</div>
@endsection
@section('tabla')
<thead>
    <tr>
      <th>ID Marca</th>
      <th>Nombre</th>
      <th>Actualizar</th>
      <th>Eliminar</th>
    </tr>
  </thead>
<tbody>
  @foreach ($marcas as $marca)
  <tr>
      <td>{{$marca-> idmarca}}</td>
      <td>{{$marca-> nombre}}</td>
      <td>
        <a href="{{route('marcas.edit', $marca->idmarca)}}" class="btn btn-success">
          <i class="fas fa-sync-alt"></i>	
    </a>
    </td>
    <td>
      <form method="POST" action="{{route('marcas.destroy', $marca->idmarca)}}">
        @method('DELETE')
        {!! Form::token() !!}
        <button type="submit" class="btn btn-warning" value="DELETE" name="_method">
          <i class="far fa-trash-alt"></i>
        </button>
    </form>
      </td>
  </tr>
  @endforeach
</tbody>
@endsection
@include('layouts.footer')
