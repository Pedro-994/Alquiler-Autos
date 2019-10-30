@extends('layouts/head')
@section('title')
	Autos
@endsection
@extends('layouts.tables')
@section('titulo')
<i class="fas fa-users fa-fw"></i> LISTA AUTOS
<div class="container-fluid">
  <ul class="full-box list-unstyled page-nav-tabs">
      <li>
          <a href="/autos/create"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR AUTO</a>
      </li>
      <li>
          <a href="/autos"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE AUTOS</a>
      </li>
      <li>
          <a href="client-search.html"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR AUTO</a>
      </li>
  </ul>	
</div>
@endsection
@section('tabla')
<thead>
    <tr>
      <th>ID Auto</th>
      <th>Matricula</th>
      <th>Modelo</th>
      <th>Color</th>
      <th>Km</th>
      <th>Seguro</th>
      <th>Situacion</th>
      <th>Marca</th>
      <th>Aseguradora</th>
      <th>Categoria</th>
      <th>Actualizar</th>
      <th>Eliminar</th> 
    </tr>
  </thead>
<tbody>
  @foreach ($autos as $auto)
  <tr>
      <td>{{$auto -> idauto}}</td>
      <td>{{$auto -> matricula}}</td>
      <td>{{$auto -> modelo}}</td>
      <td>{{$auto -> color}}</td>
      <td>{{$auto -> kilometraje}}</td>
      <td>{{$auto -> seguro}}</td>
      <td>{{$auto -> situacion}}</td>
      <td>{{$auto -> marca}}</td>
      <td>{{$auto -> aseguradora}}</td>
      <td>{{$auto -> categoria}}</td>
      <td> 
        <a href="{{route('autos.edit', $auto->idauto)}}" class="btn btn-success">
              <i class="fas fa-sync-alt"></i>	
        </a>
        </td>
        <td>
          <form method="POST" action="{{route('autos.destroy', $auto->idauto)}}">
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
@section('paginacion')
{{$autos->links()}}
@endsection
@include('layouts.footer')
