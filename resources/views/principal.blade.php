<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="styles.css">
<title>Untitled Document</title>
</head>

<body>
<div class="container-fluid bg-dark header-top d-none d-md-block">
	<div class="container">
		<div class="row text-light pt-2 pb-2">
			<div class="col-md-5"><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="{{ url('/') }}">Alquiler de Autos</a></div>
			<div class="col-md-3">		
			</div>
			<div class="col-md-2"><i class="fa fa-user-o" aria-hidden="true"></i> <a href="{{ url('/contacto') }}">Cotacto</a></div>
		</div>
	</div>
</div>

<div class="container-fluid bg-black">
	<nav class="container navbar navbar-expand-lg navbar-dark bg-black">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
</nav>
</div>
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
	<div class="carousel-inner">
	  <div class="carousel-item active">
		<img class="d-block w-100"  src="images/{{$s1}}"  alt="First slide">
	  </div>
	  <div class="carousel-item">
		<img class="d-block w-100"  src="images/{{$s2}}"  alt="Second slide">
	  </div>
	  <div class="carousel-item">
		<img class="d-block w-100"  src="images/{{$s3}}"  alt="Third slide">
	  </div>
	</div>
	<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
	  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
	  <span class="sr-only">Previous</span>
	</a>
	<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
	  <span class="carousel-control-next-icon" aria-hidden="true"></span>
	  <span class="sr-only">Next</span>
	</a>
</div>

<div class="container-fluid bg-light-gray">
<div class="container pt-5">
	<div class="row">
		<h3>Autos disponibles</h3>
	</div>
	<div class="underline"></div>
</div>
<div class="container mt-5">
	<div class="row">
		@foreach($autos as $auto)
		<div class="col-md-3">
			<div class="card">
			<img  src="images/{{$auto->ruta}}"class="card-img-top">
				<div class="card-body">
					<h5>Modelo:{{$auto->modelo}}</h5>
					<h5>{{$auto->kilometraje}} km</h5>
					<h5>Color:{{$auto->color}}</h5>
				</div>
			</div>
		</div>
		@endforeach
	</div>
</div>



<footer>
	<div class="container-fluid pt-5 bg-dark text-light">
		<div class="container">
			<div class="row">
		
			</div>
		</div>
	</div> 
</footer>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
</body>
</html>
