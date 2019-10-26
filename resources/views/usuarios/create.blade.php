@extends('layouts/head')
@section('title')
	Agregar usuario 
@endsection
@extends('layouts.forms')
@section('titulo')
<i class="fas fa-users fa-fw"></i> AGREGAR USUARIO
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
{!! Form::open(['url' => '/usuarios','method' => 'post','class'=> 'form-neon']) !!}
{!! Form::token() !!}
<legend><i class="fas fa-user"></i> &nbsp; Información básica</legend>
<div class="container-fluid">
  <div class="row">
    <div class="col-12 col-md-1">
      <div class="form-group">
        {!! Form::label('', ('Idusuario'), ['class'=> 'bmd-label-floating']) !!}
        {!! Form::text('idusuario',$conteo, ['readonly','class' =>'form-control text-center']) !!}
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
            {!! Form::date('fechanacimiento', 'fechanacimiento', ['class' =>'form-control text-center']) !!}
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
        {!! Form::password('password', ['class' =>'form-control']) !!}
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
    <div class="col-12 col-md-8">
      <div class="float-left">
        {!! Form::submit('Enviar', ['class'=>'btn btn-outline-primary btn-lg mt-3']) !!}   
      </div>
      <div class="float-right">  
        {!! Form::reset('Borrar', ['class'=>'btn btn-outline-primary btn-lg mt-3']) !!}
      </div>
    </div>
  </div>
</div>
{!! Form::close() !!}
@endsection
@include('layouts/footer')
