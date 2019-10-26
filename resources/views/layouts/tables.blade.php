	@extends('layouts/sidebar')
	@section('cuerpo')
<div>
	<h3 class="text-left">
		 &nbsp; @yield('titulo')
	</h3>
</div>
				<!-- Content here-->
				<div class="container-fluid">
					<div class="table-responsive">
						<table class="table table-dark table-sm text-center">
							@yield('tabla')
						</table>
					</div>
					<nav aria-label="Page navigation example">
						@yield('paginacion')
					</nav>
				</div>
	</section>
	</main>
	@endsection