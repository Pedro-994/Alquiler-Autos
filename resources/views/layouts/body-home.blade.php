@extends('layouts/sidebar')
@section('title')
Home
@endsection
@section('cuerpo')
<h3 class="text-left">
	<i class="fab fa-dashcube fa-fw"></i> &nbsp; HOME
</h3>
<div class="full-box tile-container">
	<a href="/usuarios" class="tile">
		<div class="tile-tittle">USUARIOS</div>
		<div class="tile-icon">
			<i class="fas fa-users fa-fw"></i>
			<p>{{$usuarios.' Registrados'}}</p>
		</div>
	</a>
	<a href="/autos" class="tile">
		<div class="tile-tittle">AUTOS</div>
		<div class="tile-icon">
			<i class="fas fa-pallet fa-fw"></i>
		<p>{{$autos.' Registrados'}}</p>
		</div>
	</a>
	<a href="/aseguradoras" class="tile">
		<div class="tile-tittle">ASEGURADORAS</div>
		<div class="tile-icon">
			<i class="fas fa-file-invoice-dollar fa-fw"></i>
			<p>{{$aseguradoras.' Registrados'}}</p>
		</div>
	</a>
	<a href="/marcas" class="tile">
		<div class="tile-tittle">MARCAS</div>
		<div class="tile-icon">
			<i class="fas fa-user-secret fa-fw"></i>
			<p>{{$marcas.' Registrados'}}</p>
		</div>
	</a>
	<a href="/categorias" class="tile">
		<div class="tile-tittle">CATEGORIAS</div>
		<div class="tile-icon">
			<i class="fas fa-store-alt fa-fw"></i>
			<p>{{$categorias.' Registrados'}}</p>
		</div>
	</a>
</div>
</section>
</main>
@endsection