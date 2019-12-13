@extends('layouts/head')
@section('title')
	Editar usuario 
@endsection
@extends('layouts.forms')
@section('titulo')
<i class="fas fa-users fa-fw"></i> EDITAR USUARIO
<div class="container-fluid">
  <ul class="full-box list-unstyled page-nav-tabs">  
      <li>
          <a href="/usuarios/create"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR USUARIO</a>
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
@section('formulario')
@if(session('update'))
  <div class="alert alert-success mt-3">
    {{session('update')}}
  </div>
@endif
{!! Form::model($usuario,['method'=> 'POST','action'=> ['usuariosController@update',$usuario->idusuario]]) !!}
{!! Form::token() !!}
<input type="hidden" name="_method" value="PUT">
<legend><i class="fas fa-user"></i> &nbsp; Actualiza información</legend>
<div class="container-fluid">
  <div class="row">
    <div class="col-12 col-md-1">
      <div class="form-group">
        {!! Form::label('', ('Idusuario')) !!}
        {!! Form::text('idusuario',old('idusuario') , ['readonly','class' =>'form-control text-center']) !!}
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
        {!! Form::label('', ('Primer Apellido')) !!}
        {!! Form::text('primerapellido',old('primerapellido'), ['class' =>'form-control']) !!}
        @if($errors->first('primerapellido'))
        <div class="alert alert-danger">
          {{$errors->first('primerapellido')}}
        </div>
        @endif
      </div>
    </div>
    <div class="col-12 col-md-5">
      <div class="form-group">
        {!! Form::label('', ('Segundo Apellido')) !!}
        {!! Form::text('segundoapellido',old('segundoapellido'), ['class' =>'form-control']) !!}
        @if($errors->first('segundoapellido'))
          <div class="alert alert-danger">
            {{$errors->first('segundoapellido')}}
          </div>
        @endif
      </div>
    </div>
    <div class="col-12 col-md-5">
      <div class="form-group">
            {!! Form::label('', ('Fecha nacimiento')) !!}
            {!! Form::date('fechanacimiento', old('fechanacimiento'), ['class' =>'form-control text-center']) !!}
            @if($errors->first('fechanacimiento'))
            <div class="alert alert-danger">
              {{$errors->first('fechanacimiento')}}
            </div>
            @endif
      </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="form-group">
            {!! Form::label('', ('Correo')) !!}
            {!! Form::text('correo',old('correo'), ['class' =>'form-control']) !!}
            @if($errors->first('correo'))
            <div class="alert alert-danger">
              {{$errors->first('correo')}}
            </div>
            @endif
        </div>
    </div>
    <div class="col-12 col-md-3">
      <div class="form-group">
        {!! Form::label('', ('Telefono')) !!}
        {!! Form::text('telefono',old('telefono'), ['class' =>'form-control', ])!!}
        @if($errors->first('telefono'))
          <div class="alert alert-danger">
            {{$errors->first('telefono')}}
          </div>
        @endif
      </div>
    </div>
    <div class="col-12 col-md-5">
      <div class="form-group">
        {!! Form::label('', ('Password')) !!}
        {!! Form::text('password',old('password'),['class' =>'form-control']) !!}
        <span class="col-ms-6 form-text text-muted">
          Su contraseña debe tener más de 8 caracteres<br>debe contener al menos 1 mayúscula, 1 minúscula,1 numero y 1 carácter especial.
        </span>
        @if($errors->first('password'))
          <div class="alert alert-danger">
            {{$errors->first('password')}}
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
