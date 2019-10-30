@extends('layouts/head')
@section('title')
	Editar auto 
@endsection
@extends('layouts.forms')
@section('titulo')
<i class="fas fa-users fa-fw"></i> EDITAR AUTO
<div class="container-fluid">
  <ul class="full-box list-unstyled page-nav-tabs">
      <li>
          <a href="/autos/create"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR AUTO</a>
      </li>
      <li>
          <a href="/autos"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE AUTOS</a>
      </li>
      <li>
          <a href="client-search.html"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR AUTOS</a>
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
{!! Form::model($auto,['method'=> 'POST','action'=> ['autossController@update',$auto->idauto]]) !!}
{!! Form::token() !!}
<input type="hidden" name="_method" value="PUT">
<legend><i class="fas fa-user"></i> &nbsp; Información básica</legend>
<div class="container-fluid">
  <div class="row">
  <div class="col-12 col-md-1">
    <div class="form-group">
      {!! Form::label('', ('Id auto'), ['class'=> 'bmd-label-floating']) !!}
      {!! Form::text('idauto',$conteo, ['readonly','class' =>'form-control text-center']) !!}
    </div>
  </div>
  <div class="col-12 col-md-5">
    <div class="form-group">
      {!! Form::label('', ('Matricula')) !!}
      {!! Form::text('matricula',old('matricula'), ['class' =>'form-control']) !!}
      @if($errors->first('matricula'))
        <div class="alert alert-danger">
          {{$errors->first('matricula')}}
        </div>
      @endif
    </div>
  </div>
  <div class="col-12 col-md-5">
    <div class="form-group">
      {!! Form::label('', ('Modelo')) !!}
      {!! Form::text('modelo',old('modelo'), ['class' =>'form-control']) !!}
      @if($errors->first('modelo'))
        <div class="alert alert-danger">
          {{$errors->first('modelo')}}
        </div>
      @endif
    </div>
  </div>
          <div class="col-12 col-md-3">
            <div class="form-group">
              {!! Form::label('', ('Color'), ['class'=> 'col-md-4 col-form-label']) !!}
              {!! Form::text('color',old('color'), ['class' =>'form-control col-md-8']) !!}
              @if($errors->first('color'))
                <div class="alert alert-danger">
                  {{$errors->first('color')}}
                </div>
              @endif
            </div>
          </div>
          <div class="col-12 col-md-2">
              <div class="form-group">
                  {!! Form::label('', ('Km')) !!}
                  {!! Form::text('kilometraje',old('kilometraje'), ['class' =>'form-control col-md-9']) !!}
                @if($errors->first('kilometraje'))
                <div class="alert alert-danger">
                  {{$errors->first('kilometraje')}}
                </div>
                @endif
              </div>
          </div>
          <div class="col-12 col-md-3">
                <div class="form-group">
                    {!! Form::label('', ('Seguro')) !!}
                    {!! Form::text('seguro',old('seguro'), ['class' =>'form-control']) !!}
                  @if($errors->first('seguro'))
                  <div class="alert alert-danger">
                    {{$errors->first('seguro')}}
                  </div>
                  @endif
                </div>
          </div>
          <div class="col-12 col-md-4">
            <div class="form-group">
              {!! Form::label('', ('Situacion')) !!}
              {!! Form::text('situacion',old('situacion'), ['class' =>'form-control']) !!}
              @if($errors->first('situacion'))
                <div class="alert alert-danger">
                  {{$errors->first('situacion')}}
                </div>
              @endif
            </div>
          </div>
          <div class="col-12 col-md-4">
            <div class="form-group">
              {!! Form::label('', ('Marca')) !!}
              <select name='idmarca'  class='form-control'>
              @foreach($marcas as $marca)
                <option value='{{$marca->idmarca}}'>{{$marca->nombre}}</option>
              @endforeach
              </select>
              @if($errors->first('idmarca'))
              <div class="alert alert-danger">
                {{$errors->first('idmarca')}}
              </div>
            @endif
            </div>
          </div>
          <div class="col-12 col-md-4">
            <div class="form-group">
              {!! Form::label('', ('Aseguradora')) !!}
              <select name='idaseguradora'  class='form-control'>
              @foreach($aseguradoras as $aseguradora)
                <option value='{{$aseguradora->idaseguradora}}'>{{$aseguradora->nombre}}</option>
              @endforeach
              </select>
              @if($errors->first('idaseguradora'))
              <div class="alert alert-danger">
                {{$errors->first('idaseguradora')}}
              </div>
            @endif
            </div>
          </div>
          <div class="col-12 col-md-4">
            <div class="form-group">
              {!! Form::label('', ('Categoria')) !!}
              <select name='idcategoria'  class='form-control'>
              @foreach($categorias as $categoria)
                <option value='{{$categoria->idcategoria}}'>{{$categoria->nombre}}</option>
              @endforeach
             </select>
             @if($errors->first('idcategoria'))
             <div class="alert alert-danger">
               {{$errors->first('idcategoria')}}
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
      