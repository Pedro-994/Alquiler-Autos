@extends('layouts/head')
@section('title')
	Agregar categoria
@endsection
@extends('layouts.forms')
@section('titulo')
<i class="fas fa-store-alt fa-fw"></i> AGREGAR CATEGORIA
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
@section('formulario')
      {!! Form::open(['url' => '/categorias','method' => 'post','class'=> 'form-neon'])!!}
      {!! Form::token() !!}
      <legend><i class="fas fa-user"></i> &nbsp; Información básica</legend>
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-md-1">
            <div class="form-group">
              {!! Form::label('', ('Idcategoria'), ['class'=> 'bmd-label-floating']) !!}
              {!! Form::text('idcategoria',$idsigue, ['readonly','class' =>'form-control text-center']) !!}
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
          <div class="col-12 col-md-6">
            <div class="md-form">
                {!! Form::label('', ('Descripcion'), ['class'=> 'form-control']) !!}
                {!! Form::textarea('descripcion', old('descripcion'), ['class' =>'md-textarea form-control','rows' => '5']) !!}
                @if($errors->first('descripcion'))
                <div class="alert alert-danger">
                  {{$errors->first('descripcion')}}
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
        