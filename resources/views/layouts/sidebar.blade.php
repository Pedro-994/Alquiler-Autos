<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>@yield('title') </title>
	<!-- Normalize V8.0.1 -->
	<link rel="stylesheet" href={{ asset('css/normalize.css') }}>
	<!-- Bootstrap V4.3 -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<!-- Bootstrap Material Design V4.0 -->
	<link rel="stylesheet" 
	<!-- Font Awesome V5.9.0 -->
	<link rel="stylesheet" href={{ asset('css/all.css') }}>
	<!-- Sweet Alerts V8.13.0 CSS file -->
	<link rel="stylesheet" href={{ asset('css/sweetalert2.min.css') }}>
	<!-- Sweet Alert V8.13.0 JS file-->
	<script src={{ asset('js/sweetalert2.min.js') }}></script>
	<!-- jQuery Custom Content Scroller V3.1.5 -->
	<link rel="stylesheet" href={{ asset('css/jquery.mCustomScrollbar.css') }}>
	<!-- General Styles -->
	<link rel="stylesheet" href={{ asset('css/style.css') }}>
</head>
<body>
	<!-- Main container -->
	<main class="full-box main-container">
		<!-- Nav lateral -->
		<section class="full-box nav-lateral">
			<div class="full-box nav-lateral-content">
				<figure class="full-box nav-lateral-avatar">
					<i class="far fa-times-circle show-nav-lateral"></i>
					<img src={{ asset('assets/avatar/Avatar.png') }} class="img-fluid" alt="Avatar">
					<figcaption class="roboto-medium text-center">
						{{ Auth::user()->name }} <br><small class="roboto-condensed-light">Admin</small>
					</figcaption>
				</figure>
				<nav class="full-box nav-lateral-menu">
					<ul>
						<li>
							<a href="/Admin"><i class="fab fa-dashcube fa-fw"></i> &nbsp; Dashboard</a>
						</li>

						<li>
							<a href="#" class="nav-btn-submenu"><i class="fas  fa-user-secret fa-fw"></i> &nbsp;
								Usuarios <i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="/usuarios/create"><i class="fas fa-plus fa-fw"></i> &nbsp; Nuevo
										usuario</a>
								</li>
								<li>
									<a href="/usuarios"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de
										usuarios</a>
								</li>
								<li>
									<a href="user-search.html"><i class="fas fa-search fa-fw"></i> &nbsp; Buscar
										usuario</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="#" class="nav-btn-submenu"><i class="fas fa-users fa-fw"></i> &nbsp; Autos <i
									class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="/autos/create"><i class="fas fa-plus fa-fw"></i> &nbsp; Agregar auto</a>
								</li>
								<li>
									<a href="/autos"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista
										de autos</a>
								</li>
								<li>
									<a href="client-search.html"><i class="fas fa-search fa-fw"></i> &nbsp; Buscar
										auto</a>
								</li>
							</ul>
						</li>

						<li>
							<a href="#" class="nav-btn-submenu"><i class="fas fa-pallet fa-fw"></i> &nbsp; Aseguradoras
								<i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="/aseguradoras/create"><i class="fas fa-plus fa-fw"></i> &nbsp; Agregar
										aseguradora</a>
								</li>
								<li>
									<a href="/aseguradoras"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de
										aseguradoras</a>
								</li>
								<li>
									<a href="item-search.html"><i class="fas fa-search fa-fw"></i> &nbsp; Buscar
										aseguradora</a>
								</li>
							</ul>
						</li>

						<li>
							<a href="#" class="nav-btn-submenu"><i class="fas fa-file-invoice-dollar fa-fw"></i> &nbsp;
								Marca <i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="/marcas/create"><i class="fas fa-plus fa-fw"></i> &nbsp; Nueva
										marca</a>
								</li>
								<li>
									<a href="/marcas"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp;
										Lista de marcas</a>
								</li>
								<li>
									<a href="reservation-search.html"><i class="fas fa-search-dollar fa-fw"></i> &nbsp;
										Buscar marca</a>
								</li>
							</ul>
						</li>

						<li>
							<a href="#" class="nav-btn-submenu"><i class="fas fa-store-alt fa-fw"></i> &nbsp; Categorias
								<i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="/categorias/create"><i class="fas fa-plus fa-fw"></i> &nbsp; Nueva categoria</a>
								</li>
								<li>
									<a href="/categorias"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de
										categorias</a>
								</li>
								<li>
									<a href="user-search.html"><i class="fas fa-search fa-fw"></i> &nbsp; Buscar
										categoria</a>
								</li>
							</ul>
						</li>
					</ul>
				</nav>
			</div>
		</section>

		<!-- Page content -->
		<section class="full-box page-content">
			<br>
			<nav class="full-box navbar-info">
				<a href="#" class="float-left show-nav-lateral">
					<i class="fas fa-exchange-alt"></i>
				</a>
				<ul class="navbar-nav ml-auto">
					<!-- Authentication Links -->
					@guest
					@else
						<li class="nav-item dropdown">
							<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
								{{ Auth::user()->name }} <span class="caret"></span>
							</a>

							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="{{ route('logout') }}"
								   onclick="event.preventDefault();
												 document.getElementById('logout-form').submit();">
									{{ __('Logout') }}
								</a>

								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									@csrf
								</form>
							</div>
						</li>
					@endguest
				</ul>
			</nav>

			
			<div class="full-box page-header">
				@yield('cuerpo')
			</div>
		</section>

