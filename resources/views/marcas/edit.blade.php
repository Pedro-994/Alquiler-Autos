@extends('layouts/head')
@section('title')
	Editar marca
@endsection
@extends('layouts.forms')
@section('titulo')
<i class="fas fa-file-invoice-dollar fa-fw"></i> EDITAR MARCA
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
@section('formulario')
@if(session('update'))
  <div class="alert alert-success mt-3">
    {{session('update')}}
  </div>
@endif
{!! Form::model($marca,['method'=> 'POST','action'=> ['marcasController@update',$marca->idmarca]]) !!}
{!! Form::token() !!}
<input type="hidden" name="_method" value="PUT">
<legend><i class="fas fa-user"></i> &nbsp; Actualiza información</legend>
<div class="container-fluid">
  <div class="row">
    <div class="col-12 col-md-1">
      <div class="form-group">
        {!! Form::label('', ('Id marca')) !!}
        {!! Form::text('idmarca',old('idusuario'), ['readonly','class' =>'form-control text-center']) !!}
      </div>
    </div>
    <div class="col-12 col-md-5">
      <div class="form-group">
        {!! Form::label('', ('Nombre')) !!}
        {!! Form::text('nombre',old('nombre'), ['class' =>'form-control']) !!}
        @if($errors->first('nombre'))
          <div class="alert alert-danger">
            {{$errors->first('nombre')}}
          </div>
        @endif
      </div>
    </div>
    <div class="float-left">
        {!! Form::submit('Enviar', ['class'=>'btn btn-outline-primary btn-lg mt-3']) !!}
      </div>
    </div>
  </div>     
  {!! Form::close() !!}
  @endsection
  @include('layouts/footer')
  