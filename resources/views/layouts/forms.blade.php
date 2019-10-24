@extends('layouts/sidebar')
@section('cuerpo')
<div>
<h3 class="text-left">
    &nbsp; @yield('titulo')
</h3>
</div>
<div class="container-fluid">
    @yield('formulario')
</div>
</section>
</main>
@endsection