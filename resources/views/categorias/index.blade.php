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
    </tr>
  </thead>
<tbody>
  @foreach ($categorias as $categoria)
  <tr>
      <td>{{$categoria-> idcategoria}}</td>
      <td>{{$categoria-> nombre}}</td>
      <td>{{$categoria-> descripcion}}</td>
  </tr>
  @endforeach
</tbody>
@endsection
@include('layouts.footer')
