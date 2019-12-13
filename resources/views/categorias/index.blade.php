@extends('layouts/head')
@section('title')
	Categorias
@endsection
@extends('layouts.tables')
@section('titulo')
<i class="fas fa-store-alt fa-fw"></i></i> LISTA CATEGORIAS
<div class="container-fluid">
  <ul class="full-box list-unstyled page-nav-tabs">
      <li>
          <a href="/categorias/create"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR CATEGORIA</a>
      </li>
      <li>
          <a href="/categorias"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE CATEGORIAS</a>
      </li>
      <li>
          <a href="client-search.html"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR CATEGORIA</a>
      </li>
  </ul>	
</div>
@endsection
@section('tabla')
<thead>
    <tr>
      <th>ID Categoria</th>
      <th>Nombre</th>
      <th>Descripcion</th>
      <th>Actualizar</th>
      <th>Eliminar</th>
    </tr>
  </thead>
<tbody>
  @foreach ($categorias as $categoria)
  <tr>
      <td>{{$categoria-> idcategoria}}</td>
      <td>{{$categoria-> nombre}}</td>
      <td>{{$categoria-> descripcion}}</td>
      <td>
        <a href="{{route('categorias.edit', $categoria->idcategoria)}}" class="btn btn-success">
          <i class="fas fa-sync-alt"></i>	
    </a>
    </td>
    <td>
      <form method="POST" action="{{route('categorias.destroy', $categoria->idcategoria)}}">
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
