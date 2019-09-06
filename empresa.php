	 <!DOCTYPE html>
	<html>
	<head>
		<title>Mi Empresa</title>
			<meta charset="utf-8"></meta>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" type="text/css" href="master.css">
		<link rel="shortcut icon" type="image/png" href="img/empresa.png">
		<link rel="stylesheet" href="BootstrapCSS/bootstrap.min.css">
	<!--llamado para cargar el mapa-->
	<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false"></script><!--llamado parael mapa de sucursales-->
	</head>

	<body>
		<div style="color: white; padding: 12px; background: linear-gradient(white,blue);" align="center">
		</div>
		<?php
		$id=$_GET['id'];
		$pais=$_GET['pais'];
		$direccion=$_GET['direccion'];
		$latitud=$_GET['latitud'];
		$longitud=$_GET['longitud'];
		$urlBanner=$_GET['urlBanner'];
		$urlLogotipo=$_GET['urlLogotipo'];
		$facebook=$_GET['facebook'];
		$whatsapp=$_GET['whatsapp'];
		$twitter=$_GET['twitter'];
		$instagram=$_GET['instagram'];
		$redes=$_GET['redes'];
		$correo=$_GET['correo'];
		$clave=$_GET['clave'];
		$claveConfirmacion=$_GET['claveConfirmacion'];

		echo
	 "	<div id='bannerEmpresa' style='width: auto;'>
		<div class='banner'><img class='bannerImagen' src='$urlBanner' alt='banner'>
		<div class='logotipo' style='background-image:url($urlLogotipo)'>
			
		</div>	
		 <h1 style='color:wheat;text-align: center;' id='tituloEmpresa'>$id</h1>";
		
		?>
		
	    </div>
	</div>	
		<style type="text/css">
			body {
			background-image: url("img/fondo1.jpg");
			background-repeat: repeat;
			background-attachment: fixed
			}
			</style>

			
		<nav class="navegacion-empresa">
			<ul class="menu">
				<li class="seccion" id="actualizar">
					<a type="button" data-toggle="modal" data-target="#formulario-actualizar-Empresa">
						<img src="img/empresa/actualizar.png" alt="Actualizar" class="imagen" >
						<span class="text-item menuEmp">Actualizar Perfil</span>
						<span class="down-item"></span>
					</a>
				</li>

				<li class="seccion">
					<a type="button" data-toggle="modal" data-target="#formulario-agregar-sucursal">
						<img src="img/empresa/sucursales.png" alt="empresa" class="imagen">
						<span class="text-item menuEmp" >Registro de Sucursales</span>
						<span class="down-item"></span>
					</a>
				</li>

				<li class="seccion">
					<a type="button" data-toggle="modal" data-target="#formulario-agregar-producto">
						<img src="img/empresa/productos.png" alt="Administrador" class="imagen">
						<span class="text-item menuEmp" >Registro de Productos</span>
						<span class="down-item"></span>
					</a>
				</li>

				<li class="seccion">
					<a type="button" data-toggle="modal" data-target="#formulario-agregar-promocion">
						<img src="img/empresa/promociones.jpg" alt="Misión y Visión" class="imagen">
						<span class="text-item menuEmp" >Registro de Promociones</span>
						<span class="down-item"></span>
					</a>
				</li>

				<li  class="seccion" id="dashboard">
					<a href="dashboard.html">
						<img src="img/empresa/dashboard.png" alt="contacto" class="imagen">
						<span class="text-item menuEmp">Dashboard Administrativo</span>
						<span class="down-item"></span>
					</a>
	            </li>
		</nav>

		  <!-- Modal para actualizar empresa-->
	<?php

	          $contenidoArchivo=file_get_contents('empresas.json');
	          $empresa=json_decode($contenidoArchivo,true);
	          for ($i=0; $i <  sizeof($empresa); $i++) { //buscar el indice del arreglo en el archivo donde esta ubicado el registro
	            if ($empresa[$i]['id']==$_GET['id']) {
	              $indice=$i;
	        }
	    }

	echo "
		<form action='editarEmpresa.php' method='PUT'>
		<input value=$indice name='indice' style='display:none'>
		
		<div class='modal fade' id='formulario-actualizar-Empresa' style='color: aliceblue'; tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
	    <div class='modal-dialog' role='document'>
	      <div class='modal-content modals'>
	        <div class='modal-header'>
	          <h5 class='modal-title' id='exampleModalLabel'>Actualizar Empresa</h5>
	          <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
	            <span aria-hidden='true'>&times;</span>
	          </button>
	        </div>
	        <div class='modal-body'>
	          <input class='form-control ActualizarEmpresa' type='text' id='nombreEmpresa-nuevo' value='$id' name='id' placeholder='Escriba el Nombre de la Empresa'>
			 <br> 
			  <input class='form-control ActualizarEmpresa' sname='pais' type='text' id='pais-nuevo' placeholder='Escriba el País de Origen' value='$pais'>
			 <br> 
			  <textarea class='form-control ActualizarEmpresa' style='width:-moz-available' id='direccion-nuevo' name='direccion'  placeholder='Escriba aquí la Dirección' rows='3' cols='20'>$direccion</textarea><br> 
			<input class='form-control ActualizarEmpresa' name='latitud' type='text' id='latitud-nuevo' placeholder='Escriba su latitud' value='$latitud' style='width:-moz-available'/>
						<br> 
			<input class='form-control ActualizarEmpresa' name='longitud' id='longitud-nuevo' type='text' placeholder='Escriba aqui su longitud'  value='$longitud' style='width:-moz-available'>
			<br> 
				<div>

					<input type='text' value='$urlBanner' id='url-banner' name='urlBanner' class='input-url form-control' />
					<!-- label para simular el boton 'seleccionar archivo' -->
					<label class='cargar' style='cursor:pointer'>
		Subir Banner
		<span>
		
			    <input type='file' id='archivo' value='' style='display:none'/>
		</span></label>
					<!-- Campo original file -->
					<div class='valid-feedback' style='text-align:right'>Ok
					</div>

					<div class='invalid-feedback' style='text-align:right'>
						Campo obligatorio
					</div>
				</div>
				<!-- -->
				<br><br><br>


				<!-- label para simular el boton 'seleccionar archivo' -->
				<div>
					<input type='text' value='$urlLogotipo' id='url-logotipo' name='urlLogotipo' class='input-url form-control' />
					<label class='cargar' style='cursor:pointer'>
			    Subir Logotipo<span>
			    <!-- Campo original file -->
			<input type='file' id='archivo2' name='archivo' style='display:none'/>
				</span>
			</label>

					<div class='valid-feedback' style='text-align:right'>Ok
					</div>

					<div class='invalid-feedback' style='text-align:right'>
						Campo obligatorio
					</div>
				</div>
				<br><br><br>
			<div class='row'>
				<br>
			<input id='facebook-nuevo' name='facebook' type='text' value='$facebook' placeholder='Facebook' class='col-xl-6 ActualizarEmpresa' style='width:-moz-available;padding:5px'>
			<br> 
			<input id='whatsapp-nuevo' name='whatsapp' type='text' value='$whatsapp' placeholder='Whatsapp' class='col-xl-6 ActualizarEmpresa' style='width:-moz-available;padding:5px'>
			<br> 
			</div>

			<div class='row'>
				<br> 
			<input id='twitter-nuevo' name='twitter' type='text' value='$twitter' placeholder='Twitter' class='col-xl-6 ActualizarEmpresa' style='width:-moz-available;padding:5px'>
			<br> 
			<input id='instagram-nuevo' name='instagram' type='text' value='$instagram' placeholder='Instagram' class='col-xl-6 ActualizarEmpresa' style='width:-moz-available;padding:5px'>
			</div>
			<br> 
			<textarea  class='form-control ActualizarEmpresa' id='RedesSociales-nuevo'  name='redes' placeholder='Otras Redes Sociales...'>$redes</textarea> 
			<br>
			<div class='form-row align-items-center'> 
				<div class='input-group'>
					<div class='input-group-prepend' style='height: 40px'>
						<div class='input-group-text'>@</div>
				<input type='text' id='correo-nuevoEmpresa' value='$correo' name='correo' class='form-control ActualizarEmpresa' placeholder='Escriba el correo electrónico' style='width:-moz-available'>
					<div class='valid-feedback' style='text-align:right'>Ok</div>
					<div class='invalid-feedback' style='text-align:right; margin-bottom:9px'>
					Correo no válido
					</div>
							
					</div>			
				</div>	

			</div>
			<br> 
			<div>
			<input type='password' id='ClaveEmpresaNueva' name='clave' class='form-control ActualizarEmpresa' placeholder='Escriba una contraseña segura' style='width:-moz-available' value='$clave'>	
					<div class='valid-feedback' style='text-align:right'>Ok</div>
					<div class='invalid-feedback' style='text-align:right; margin-bottom:9px'>
					Las contraseñas no coinciden
					</div>
			</div>
			<br> 
			<input type='password' value='$claveConfirmacion' id='ConfirmacionEmpresaNueva' name='claveConfirmacion' class='form-control ActualizarEmpresa' placeholder='Confirme su Contraseña' style='width:-moz-available; margin-left:auto'>		
			        </div>
			        <div class='modal-footer'>
			          <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>
			          <button id='btn-guardar' type='submit' class='btn btn-primary' onclick='validarEmpresaNuevo()'>Guardar Cambios</button>
			        </div>
			      </div>
			    </div>
				</div>
				</form>
				";
	?>

		<!--__________Modal para agregar productos_________-->
	<form action="procesarProducto.php" method="POST">
	<div id="formulario-agregar-producto" class="modal" style="color:aliceblue" tabindex="-1" role="dialog">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content modals">
	      <div class="modal-header">
	        <h5 class="modal-title">Agregar Producto</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">

	<div>
		<input type="text" name="Empresa" style="display: none">
					<input type="text" name="codigoProducto" id="CodigoProducto" class="form-control inputProducto" placeholder="Codigo" style="width:-moz-available" value="">	
				<div class="valid-feedback" style="text-align:right">Ok
				</div>
	            <div class="invalid-feedback" style="text-align:right">
	            Campo obligatorio
				</div>
	</div>
					<br>
	<div>
	<input type="text" name="nombreProducto" id="NombreProducto" class="form-control inputProducto" placeholder="Nombre del producto" style="width:-moz-available" value="">	

				<div class="valid-feedback" style="text-align:right">Ok
				</div>
	            <div class="invalid-feedback" style="text-align:right">
	            Campo obligatorio
				</div>
	</div>
	<br>
	<div>
	<input type="text" id="PrecioProducto" name="precio" class="form-control inputProducto" placeholder="Precio" style="width:-moz-available" value="">	
				<div class="valid-feedback" style="text-align:right">Ok
				</div>
	            <div class="invalid-feedback" style="text-align:right">
	            Campo obligatorio
				</div>
	</div>
	<br>
	<div>
	<textarea  class="form-control inputProducto" name="descripcion" id="descripcionProducto" name="redes" placeholder="Descripción"></textarea> 
				<div class="valid-feedback" style="text-align:right">Ok
				</div>
	            <div class="invalid-feedback" style="text-align:right">
	            Campo obligatorio
				</div>
	</div>
	<br>
	<div class="input-group mb-3">
	  <div class="input-group-prepend">
	    <span class="input-group-text" id="inputGroupFileAddon01">Subir Fotos</span>
	  </div>
	  <div class="custom-file">
			<div>
			<input id="imagenProducto" name="urlImagen" type="file" class="custom-file-input" multiple id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
			<label class="custom-file-label" for="inputGroupFile01">Buscar Archivos</label>
					<div class="valid-feedback" style="text-align:right">Ok
				</div>
	            <div class="invalid-feedback" style="text-align:right">
	            Campo obligatorio
				</div>	
		</div>
	  </div>
	</div>

	</div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-primary" onclick="agregarProducto()">Guardar Producto</button>
					
					<br>	
					 <button type="button" class="btn btn-primary">Ver Registro de Productos</button>			
	      </div>
	    </div>
	  </div>
	</div>
	</form>

		<!--____________Modal para agregar Promociones___________-->

	<div id="formulario-agregar-promocion" class="modal" style="color:aliceblue" tabindex="-1" role="dialog">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content modals">
	      <div class="modal-header">
	        <h5 class="modal-title">Agregar Promoción</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	<div>
	<select name="" id="producto" class="custom-select form-control">
		<option value="1">Seleccione el Producto en Promoción</option>
	</select>
				<div class="valid-feedback" style="text-align:right">Ok
				</div>
	            <div class="invalid-feedback" style="text-align:right">
	            Campo obligatorio
				</div>
	</div>
	<br>
	<br>
	<div>
	<input type="text" id="descuento" class="form-control inputPromocion" placeholder="% de descuento" style="width:-moz-available" value="">	
				<div class="valid-feedback" style="text-align:right">Ok
				</div>
	            <div class="invalid-feedback" style="text-align:right">
	            Campo obligatorio
				</div>
	</div>
	<br>
	<div>
	<input type="text" id="precioProductoPromocion" class="form-control inputPromocion" placeholder="Precio Real" style="width:-moz-available" value="">	<br>
					<div class="valid-feedback" style="text-align:right">Ok
				</div>
	            <div class="invalid-feedback" style="text-align:right">
	            Campo obligatorio
				</div>
	</div>

	<div>
	<input type="text" id="precioOferta" class="form-control inputPromocion" placeholder="Precio" style="width:-moz-available" value="">	<br>
							<div class="valid-feedback" style="text-align:right">Ok
				</div>
	            <div class="invalid-feedback" style="text-align:right">
	            Campo obligatorio
				</div>
			

	</div>
	<label>Fecha de Inicio de promoción</label>
	<div>
	<input type="date" id="fechaInicio" class="form-control inputPromocion" placeholder="Precio" style="width:-moz-available" value="">	<br>
				<div class="valid-feedback" style="text-align:right">Ok
				</div>
	            <div class="invalid-feedback" style="text-align:right">
	            Campo obligatorio
				</div>
	</div>
	<label>Fecha final de promoción</label>
	<div>
	<input type="date" id="fechaFinal" class="form-control inputPromocion" placeholder="Precio" style="width:-moz-available" value="">	<br>
								<div class="valid-feedback" style="text-align:right">Ok
				</div>
	            <div class="invalid-feedback" style="text-align:right">
	            Campo obligatorio
				</div>
	</div>

	<br>


	<div class="input-group mb-3 row">

				<input class="col-xl-4" type="checkbox" aria-label="Checkbox for following text input"><label class="col-xl-6">Sucursal 1</label><br>
				
				<input class="col-xl-4" type="checkbox" aria-label="Checkbox for following text input"><label class="col-xl-6">Sucursal 2</label><br>
				
				<input class="col-xl-4" type="checkbox" aria-label="Checkbox for following text input"><label class="col-xl-6">Sucursal 3</label><br>
				

	</div>

	<div>
	<select name="" id="sucursal" class="custom-select form-control">
		<option value="1">Seleccione la sucursal en la que existe la Promoción</option>
	</select>
				<div class="valid-feedback" style="text-align:right">Ok
				</div>
	            <div class="invalid-feedback" style="text-align:right">
	            Campo obligatorio
				</div>
	</div>
	</div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-primary" onclick="agregarPromocion()">Guardar Producto</button>
					
					<br>	
					 <button type="button" class="btn btn-primary">Ver Registro de Promociones</button>			
	      </div>
	    </div>
	  </div>
	</div>


	<!--__________modal para agregar sucursales______-->
	<form action="procesarSucursal.php" method="POST">
	<div id="formulario-agregar-sucursal" class="modal" style="color:aliceblue" tabindex="-1" role="dialog">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content modals">
	      <div class="modal-header">
	        <h5 class="modal-title">Agregar Sucursal</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	<div>
					<input type="text" name="nombreSucursal" id="nombreSucursal" class="form-control inputProducto" placeholder="Nombre del lugar donde está ubicada la sucursal" style="width:-moz-available" value="">	
				<div class="valid-feedback" style="text-align:right">Ok
				</div>
	            <div class="invalid-feedback" style="text-align:right">
	            Campo obligatorio
				</div>
	</div>
					<br>
	<div>
	<input type="text" id="latitudSucursal" name="latitudSuc" class="form-control inputProducto" placeholder="Ingrese la latitud" style="width:-moz-available" value="">	

				<div class="valid-feedback" style="text-align:right">Ok
				</div>
	            <div class="invalid-feedback" style="text-align:right">
	            Campo obligatorio
				</div>
	</div>
	<br>
	<div>
			<input type="text" name="longitudSuc" id="longitudSucursal" class="form-control inputProducto" placeholder="Ingrese la longitud" style="width:-moz-available" value="">	
						<div class="valid-feedback" style="text-align:right">Ok
						</div>
			            <div class="invalid-feedback" style="text-align:right">
			            Campo obligatorio
						</div>
			</div>

			</div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
							<button type="submit" class="btn btn-primary" onclick="agregarSucursal()">Guardar Producto</button>
							
							<br>	
							 <button class="btn btn-primary">Ver Registro de Sucursales</button>			
	      </div>
	    </div>
	  </div>
	</div>
	</form>
	<!--_______________________________-->

	<!--__________modal para agregar ver ficha de promocion______-->
	<div id="formulario-ficha-promocional" class="modal" style="color:aliceblue" tabindex="-1" role="dialog">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content modals">
	      <div class="modal-header">
	        <h5 class="modal-title">Ficha Promocional</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	  
		  <div class="promocion">
				<span class="descuento" style="padding-left: 2rem;color: red;">15% de Descuento</span>
		<h3 style="text-align: center;">Nombre</h3>
		<h3>Precio Normal: lps. 200</h3>
		<h3>Precio De Oferta: lps. 120</h3>	

	    <img src="img/index/descuentos.jpg" class="d-block w-100 imgCarousel"  alt="...">

	  </div>

		<hr>

	</div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

					 <button type="button" class="btn btn-primary">Imprimir</button>			
	      </div>
	    </div>
	  </div>
	</div>
	<!--_______________________________-->
	<!--Visualizacion de Perfil-->


		<!--Productos-->
	<section class="mostrarPerfil" id="perfil">
	<div class="row divProductos">
			<h5 class="categoria col-xl-12 col-md-12 col-sm-12">Ubicación Principal</h5>
		<div class="col-md-12 d-none d-sm-block" id="mapaPrincipal" style="width: 450px; height: 350px">

	</div>


		<h5 class="categoria col-xl-12 col-md-12 col-sm-12">Productos</h5>
	  <div class="col-xl-3 col-md-2 col-sm-12">
		  <div class="producto">
		<h3>Nombre</h3>
		<p class="descripcion">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, dolorem.</p>
		<div class="precio">100.00 lps</div>
		<!--imagenes-->
		<div id="carouselExampleSlidesOnly" class="carousel slide carousel" data-ride="carousel">
	  <div class="carousel-inner">
	    <div class="carousel-item active">
	        <img src="img/index/descuentos.jpg" class="d-block w-100 imgCarousel"  alt="...">
	    </div>
	    <div class="carousel-item">
	      <img src="img/index/ofertas.jpeg" class="d-block w-100 imgCarousel" alt="...">
	    </div>
	    <div class="carousel-item">
	      <img src="img/index/rebajas.png" class="d-block w-100 imgCarousel"  alt="...">
	    </div>
		</div>
			<button type="button" data-toggle="modal" style="margin: 8px;" data-target="#formulario-ficha-promocional">Ficha Promocional</button>
	</div>
		<hr>
		</div>
	  </div>

	 
	    <div class="col-xl-3 col-md-2 col-sm-12">
			 <div class="producto">
		<h3>Nombre</h3>
		<p class="descripcion">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, dolorem.</p>
		<div class="precio">500.00 lps</div>
		<!--imagenes-->
		<div id="carouselExampleSlidesOnly" class="carousel slide carousel" data-ride="carousel">
	  <div class="carousel-inner">
	    <div class="carousel-item active">
	        <img src="img/index/descuentos.jpg" class="d-block w-100 imgCarousel"  alt="...">
	    </div>
	    <div class="carousel-item">
	      <img src="img/index/ofertas.jpeg" class="d-block w-100 imgCarousel" alt="...">
	    </div>
	    <div class="carousel-item">
	      <img src="img/index/rebajas.png" class="d-block w-100 imgCarousel"  alt="...">
	    </div>
		</div>
		<button type="button" data-toggle="modal" style="margin: 8px;" data-target="#formulario-ficha-promocional">Ficha Promocional</button>
	</div>
		<hr>
	  </div>
	  </div>
	</div>


	<!--Promociones-->
	  <div class="row divPromociones">

		<h5 class="categoria col-xl-12 col-md-12 col-sm-12">Promociones</h5>
	  <div class="col-xl-3 col-md-2 col-sm-12">
		  <div class="promocion">
				<span class="descuento">15%</span>
				<img src="img/oferta.png">
		<h3>Nombre</h3>
		<div class="precioRebaja"><div class="precioNormal">100</div>
		<div class="precioOferta">200</div></div>
		<!--imagenes-->
		<div id="carouselExampleSlidesOnly" class="carousel slide carousel" data-ride="carousel">
	  <div class="carousel-inner">
	    <div class="carousel-item active">
	        <img src="img/index/descuentos.jpg" class="d-block w-100 imgCarousel"  alt="...">
	    </div>
	    <div class="carousel-item">
	      <img src="img/index/ofertas.jpeg" class="d-block w-100 imgCarousel" alt="...">
	    </div>
	    <div class="carousel-item">
	      <img src="img/index/rebajas.png" class="d-block w-100 imgCarousel"  alt="...">
	    </div>
		</div>
			<button type="button" data-toggle="modal" style="margin: 8px;" data-target="#formulario-ficha-promocional">Ficha Promocional</button>
	</div>
		<hr>
		</div>
		</div>
	 

	  <div class="col-xl-3 col-md-2 col-sm-12">
		  <div class="promocion">
				<span class="descuento">15%</span>
				<img src="img/oferta.png">
		<h3>Nombre</h3>
		<div class="precioRebaja"><div class="precioNormal">100</div>
		<div class="precioOferta">200</div></div>
		<!--imagenes-->
		<div id="carouselExampleSlidesOnly" class="carousel slide carousel" data-ride="carousel">
	  <div class="carousel-inner">
	    <div class="carousel-item active">
	        <img src="img/index/descuentos.jpg" class="d-block w-100 imgCarousel"  alt="...">
	    </div>
	    <div class="carousel-item">
	      <img src="img/index/ofertas.jpeg" class="d-block w-100 imgCarousel" alt="...">
	    </div>
	    <div class="carousel-item">
	      <img src="img/index/rebajas.png" class="d-block w-100 imgCarousel"  alt="...">
	    </div>
		</div>
		<button type="button" data-toggle="modal" style="margin: 8px;" data-target="#formulario-ficha-promocional">Ficha Promocional</button>
		
	</div>
		<hr>
		</div>
		</div>

	 </div>

		<!--sucursales-->
	  <div class="row divPromociones">
		<h5 class="categoria col-xl-12 col-md-12 col-sm-12">Sucursales</h5>
	  <div class="col-xl-12 col-md-12 col-sm-12" id="mapaSuc">

		</div>
		</div>
	</section>


		<script src="jquery/jquery-3.4.1.min.js"></script>
		<script src="popper/popper.min.js"></script>
		<script src="BootstrapJS/bootstrap.min.js"></script>
		<script src="controlador.js"></script>
			<script>
			/* Seccion para obtener y simular la url del input file
	 En el change del campo file, cambiamos el val del campo ficticio por el del verdadero */
			$('#archivo').change(function () {
				$('#url-banner').val($(this).val());
			});

			$('#archivo2').change(function () {
				$('#url-logotipo').val($(this).val());
			});

		</script>
		
	</body>
	</html>
