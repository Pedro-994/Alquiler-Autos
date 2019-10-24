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
						<ul class="pagination justify-content-center">
							<li class="page-item disabled">
								<a class="page-link" href="#" tabindex="-1">Previous</a>
							</li>
							<li class="page-item"><a class="page-link" href="#">1</a></li>
							<li class="page-item"><a class="page-link" href="#">2</a></li>
							<li class="page-item"><a class="page-link" href="#">3</a></li>
							<li class="page-item">
								<a class="page-link" href="#">Next</a>
							</li>
						</ul>
					</nav>
				</div>
	</section>
	</main>
	@endsection