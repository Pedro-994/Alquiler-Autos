@extends('layouts/head')
@section('title')
	Editar aseguradora
@endsection
@extends('layouts.forms')
@section('titulo')
<i class="fas  fa-user-secret fa-fw"></i> EDITAR ASEGURADORA
<div class="container-fluid">
  <ul class="full-box list-unstyled page-nav-tabs">
      <li>
          <a href="/aseguradoras/create"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR ASEGURADORA</a>
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
@section('formulario')
@if(session('update'))
  <div class="alert alert-success mt-3">
    {{session('update')}}
  </div>
@endif
{!! Form::model($aseguradora,['method'=> 'POST','action'=> ['aseguradorasController@update',$aseguradora->idaseguradora]]) !!}
{!! Form::token() !!}
<input type="hidden" name="_method" value="PUT">
<legend><i class="fas fa-user"></i> &nbsp; Actualiza información </legend>
<div class="container-fluid">
  <div class="row">
      <div class="col-12 col-md-1">
        <div class="form-group">
          {!! Form::label('', ('Idaseguradora')) !!}
          {!! Form::text('idaseguradora',old('idaseguradora'), ['readonly','class' =>'form-control text-center']) !!}
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
      <div class="col-12 col-md-5">
        <div class="form-group">
           {!! Form::label('', ('Tipo de Aseguradora'))!!}
          {!! Form::text('tipoAseguradora', old('tipoAseguradora'), ['class' =>'form-control']) !!}
          @if($errors->first('tipoAseguradora'))
            <div class="alert alert-danger">
              {{$errors->first('tipoAseguradora')}}
            </div>
          @endif
        </div>
      </div>
      <div class="col-12 col-md-5">
        <div class="form-group">
          {!! Form::label('', ('Marca'),['class'=> 'col-form-label']) !!}
          <select name='idmarca'  class='form-control col-md-8'>
          @foreach($marcas as $marca)
            <option value='{{$marca->idmarca}}'>{{$marca->nombre}}</option>
          @endforeach
          </select>
        </div>
      </div>
      <div class="float-left">
        {!! Form::submit('Enviar', ['class'=>'btn btn-outline-primary btn-lg mt-3']) !!}
      </div>
  </div>
</div>        
{!! Form::close() !!}
@endsection
@include('layouts.footer')

