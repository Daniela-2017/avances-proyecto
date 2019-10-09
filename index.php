
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8"></meta>
	<title>Consiguelo!</title>
	<link rel="stylesheet" type="text/css" href="master.css">
	<link rel="shortcut icon" type="image/png" href="img/icono2.png">
	<link rel="stylesheet" href="BootstrapCSS/bootstrap.min.css">

</head>

<body>
	<div style="color: white; padding: 12px; background: linear-gradient(white,blue);" align="center"><img id="banner" src="img/banner.png" alt="">
	</div>

	<style type="text/css">
		/*propiedades css para el fondo*/

		body {
			background-image: url("img/fondo1.jpg");
			background-repeat: repeat;
			background-attachment: fixed
		}
	</style>

	<nav class="navegacion">
		<!--Menu para opciones-->
		<ul class="menu">
			<!--<li class="first-item">
				<a href="#">
					<img src="img/inicio.png" alt="inicio" class="imagen" >
					<span class="text-item" id="inicio">Inicio</span>
					<span class="down-item"></span>
				</a>
			</li>
-->
			<li class="seccion-menu">
				<a href="#">
					<img src="img/cliente.png" alt="cliente" class="imagen">
					<span class="text-item">Cliente</span>
					<span class="down-item"></span>
				</a>

				<ul class="submenu" style="position:absolute">
					<form method="get" action="Registrar-cliente.html ">
						<button class="opciones btn btn-outline-danger">Registrarme</button>
					</form>

					<form method="get" action="clienteSinRegistrar.php">
						<button class="opciones btn btn-outline-danger">Ver promociones sin registrar</button>
					</form>

					<form method="get" action="login.html">
						<button class="opciones btn btn-outline-danger">Entrar a mi Perfil</button>
					</form>
				</ul>
			</li>

			<li class="seccion-menu" style="position:relative">
				<a href="#">
					<img src="img/empresa.png" alt="empresa" class="imagen">
					<span class="text-item" >Empresa</span>
					
					<span class="down-item"></span>

				</a>
				<ul class="submenu" style="position:absolute">
					<form method="get" action="RegistrarEmpresa.html ">
						<button class="opciones btn btn-outline-danger">Añadir Empresa</button>
					</form>

					<form method="get" action="login.html">
						<button class="opciones btn btn-outline-danger">Ingresar a Mi Empresa</button>
					</form>
				</ul>
			</li>

			<li class="seccion">
				<a href="login.html">
					<img src="img/admin.png" alt="Administrador" class="imagen">
					<span class="text-item">Súper Administrador</span>
					<span class="down-item"></span>
				</a>
			</li>

			<li class="seccion" id="mision">
				<a href="misionVision.html">
					<img src="img/mision.png" alt="Misión y Visión" class="imagen">
					<span class="text-item">Misión y Visión</span>
					<span class="down-item"></span>
				</a>
			</li>

			<li class="seccion" id="contacto">
				<a href="contacto.html">
					<img src="img/contacto.png" alt="contacto" class="imagen">
					<span class="text-item" >Contáctanos</span>
					<span class="down-item"></span>
				</a>
			</li>
	</nav>
	<br>
	<br>
	<br>
	<br>
	<br>
	<hr>
	<!--Carousel-->
	<div id="carouselExampleSlidesOnly" class="carousel slide carousel" data-ride="carousel">
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img src="img/index/descuentos.jpg" class="d-block w-100 imgCarousel" alt="...">
			</div>
			<div class="carousel-item">
				<img src="img/index/ofertas.jpeg" class="d-block w-100 imgCarousel" alt="...">
			</div>
			<div class="carousel-item">
				<img src="img/index/rebajas.png" class="d-block w-100 imgCarousel" alt="...">
			</div>
		</div>
	</div>

	<hr>
	<script src="jquery/jquery-3.4.1.min.js"></script>
	<script src="popper/popper.min.js"></script>
	<script src="BootstrapJS/bootstrap.min.js"></script>
	<script src="controlador.js"></script>

</body>

</html>
