@extends('layouts/head')
@section('title')
	Usuarios
@endsection
@extends('layouts.tables')
@section('titulo')
<i class="fas  fa-user-secret fa-fw"></i> LISTA USUARIOS	
<div class="container-fluid"> 
  <ul class="full-box list-unstyled page-nav-tabs">
      <li>
          <a href="/usuarios/create"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR USUARIOS</a>
      </li>
      <li>
          <a href="/usuarios"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE USUARIOS</a>
      </li>
      <li>
          <a href="client-search.html"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR USUARIO</a>
      </li>
  </ul>	
</div>
@endsection

@section('tabla')
@if(session('eliminar'))
  <div class="alert alert-success mt-3">
    {{session('eliminar')}}
  </div>
@endif
<thead>
    <tr>
      <th>Id Usuario</th>
      <th>Nombre</th>
      <th>Primer Apellido</th>
      <th>Segundo Apellido</th>
      <th>Fecha Nacimiento</th>
      <th>Correo</th>
      <th>Telefono</th>
      <th>Contraseña</th>
      <th>Actualizar</th>
      <th>Eliminar</th>
    </tr>
  </thead>
<tbody>
  @foreach ($usuarios as $usuario)
  <tr>
      <td>{{$usuario-> idusuario}}</td>
      <td>{{$usuario-> nombre}}</td>
      <td>{{$usuario-> primerapellido}}</td>
      <td>{{$usuario-> segundoapellido}}</td>
      <td>{{$usuario-> fechanacimiento}}</td>
      <td>{{$usuario-> correo}}</td>
      <td>{{$usuario-> telefono}}</td>
      <td>{{$usuario-> password}}</td>
      <td> 
      <a href="{{route('usuarios.edit', $usuario->idusuario)}}" class="btn btn-success">
            <i class="fas fa-sync-alt"></i>	
      </a>
      </td>
      <td>
        <form method="POST" action="{{route('usuarios.destroy', $usuario->idusuario)}}">
          @method('DELETE')
          {!! Form::token() !!}
          <button type="submit" class="btn btn-warning" value="DELETE" name="_method">
            <i class="far fa-trash-alt"></i>
          </button>
      </form>
      </td>
  @endforeach
</tbody>
@endsection
@section('paginacion')
{{$usuarios->links()}}
@endsection
@include('layouts.footer')
 
