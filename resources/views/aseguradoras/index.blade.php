@extends('layouts/head')
@section('title')
	Aseguradoras
@endsection
@extends('layouts.tables')
@section('titulo')
<i class="fas fa-pallet fa-fw"></i> LISTA ASEGURADORAS
<div class="container-fluid">
  <ul class="full-box list-unstyled page-nav-tabs">
      <li>
          <a href="/aseguradoras/create"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR ASEGURADORAS</a>
      </li>
      <li>
          <a href="/aseguradoras"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE ASEGURADORAS</a>
      </li>
      <li>
          <a href="client-search.html"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR ASEGURADORA</a>
      </li>
  </ul>	
</div>
@endsection
@section('tabla')
<thead>
    <tr>
        <th>ID Aseguradora</th>
        <th>Nombre</th>
        <th>Tipo Aseguradora</th>
        <th>Marca</th>
        <th>Actualizar</th>
        <th>Eliminar</th>
    </tr>
</thead>
<tbody>
    @foreach ($aseguradoras as $aseguradora)
    <tr>
        <td>
            {{$aseguradora-> idaseguradora}}
        </td>
        <td>{{$aseguradora-> nombre}}</td>
        <td>
            {{$aseguradora-> tipoAseguradora}}
        </td>
        <td>{{$aseguradora-> marca}}</td>
        <td>
        <a href="{{route('aseguradoras.edit', $aseguradora->idaseguradora)}}" class="btn btn-success">
        <i class="fas fa-sync-alt"></i>	
        </a>
          </td>
          <td>       
            <form method="POST" action="{{route('aseguradoras.destroy', $aseguradora->idaseguradora)}}">
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
@endsection @include('layouts.footer')