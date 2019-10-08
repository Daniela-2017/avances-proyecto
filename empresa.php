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
	<!--<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false"></script>--><!--llamado parael mapa de sucursales-->
	</head>

	<body>
		<div style="color: white; padding: 12px; background: linear-gradient(white,blue);" align="center">
		</div>
		<?php

include_once('clases/class-empresa.php');
include_once('clases/class-database.php');
include_once('clases/class-producto.php');
include_once('clases/class-sucursal.php');
include_once('clases/class-promocion.php');


    //$rutaArchivo = 'empresas.json';

  $database = new Database();

  $key = $_GET['id'];
  $infor = Empresa::getEmpresa($database->getDB(),$key);
	$json=json_decode($infor);

foreach($json as $k=>$v){
  if($k=='id'){
    $nombre= $v;
  }
  if($k=='urlBanner'){
    $banner=$v[0];
  }
	  if($k=='urlLogotipo'){
    $logo=$v[0];
  }

	if($k=='latitud'){
	$latitud=$v;
	}
		if($k=='longitud'){
	$longitud=$v;
	}
	}

		echo
	 "<div id='bannerEmpresa' style='width: auto;'>
		<div class='banner'><img class='bannerImagen' src='fotosEmpresa$banner' alt='banner'>
		<div class='logotipo' style='background-image:url(fotosEmpresa$logo)'>
			
		</div>	
		 <h1 style='color:wheat;text-align: center;' id='tituloEmpresa'>$nombre</h1>";
		
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
	    include_once('clases/class-empresa.php');
    	include_once('clases/class-database.php');
    //$rutaArchivo = 'empresas.json';

  $database = new Database();

				 $empresa = Empresa::getEmpresa($database->getDB(),$key);
				$jsonEmpresa = json_decode($empresa,true);
					 $nombre = $jsonEmpresa['id'];
					 $pais=$jsonEmpresa['pais'];
					 $direccion = $jsonEmpresa['direccion'];
					 $latitud = $jsonEmpresa['latitud'];
					 $longitud = $jsonEmpresa['longitud'];
					 $urlBanner = $jsonEmpresa['urlBanner'][0];
					 $urlLogotipo = $jsonEmpresa['urlLogotipo'][0];
					 $facebook= $jsonEmpresa['facebook'];
					 $whatsapp=$jsonEmpresa['whatsapp'];
					 $twitter=$jsonEmpresa['twitter'];
					 $instagram=$jsonEmpresa['instagram'];
					 $correo=$jsonEmpresa['correo'];
					 //$clave=$jsonEmpresa['clave'];
					 $RedesSociales = $jsonEmpresa['RedesSociales'];
					 
					 

	echo "
		<form id='formularioEditarEmpresa' enctype='multipart/form-data' role='form' method='POST'>
		
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
					<input type='text' id='empresaKey' style='display:none' value='$key'>
	          <input class='form-control ActualizarEmpresa' type='text' id='nombreEmpresa-nuevo' value='$nombre' name='id' placeholder='Escriba el Nombre de la Empresa'>
			 <br> 
			  <input class='form-control ActualizarEmpresa' name='pais' type='text' id='pais-nuevo' placeholder='Escriba el País de Origen' value='$pais'>
			 <br> 
			  <textarea class='form-control ActualizarEmpresa' style='width:-moz-available' value='$direccion' id='direccion-nuevo' name='direccion'  placeholder='Escriba aquí la Dirección' rows='3' cols='20'>$direccion</textarea><br> 
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
			<textarea  class='form-control ActualizarEmpresa' id='RedesSociales-nuevo'  name='redes' placeholder='Otras Redes Sociales...'>$RedesSociales</textarea> 
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
			<input type='password' id='ClaveEmpresaNueva' name='clave' class='form-control ActualizarEmpresa' placeholder='Escriba una contraseña segura' style='width:-moz-available'>	
					<div class='valid-feedback' style='text-align:right'>Ok</div>
					<div class='invalid-feedback' style='text-align:right; margin-bottom:9px'>
					Las contraseñas no coinciden
					</div>
			</div>
			<br> 
			<input type='password' id='ConfirmacionEmpresaNueva' name='claveConfirmacion' class='form-control ActualizarEmpresa' placeholder='Confirme su Contraseña' style='width:-moz-available; margin-left:auto'>		
			        </div>
			        <div class='modal-footer'>
			          <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>
			          <button id='actualizarEmpresa' type='button' class='btn btn-primary'>Guardar Cambios</button>
			        </div>
			      </div>
			    </div>
				</div>
				</form>
				";
	?>

		<!--__________Modal para agregar productos_________-->
	<form id="formularioAgregarProductos" enctype="multipart/form-data" role="form" method="POST">
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
	<?php echo "
	<input type='text' name='Empresa' id='empresa' style='display:none' value='$key'>
"?>
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
					<button type="button" class="btn btn-primary" id="registrarProducto" >Guardar Producto</button>
					
					<br>
					<a type="button" data-toggle="modal" data-target="#formulario-ver-productos">

					 <button type="button" class="btn btn-primary" id="verProductos">Ver Registro de Productos</button></a>		
	      </div>
	    </div>
	  </div>
	</div>
	</form>


			<!--__________Ver productos-->
	<div id="formulario-ver-productos" class="modal" style="color:aliceblue" tabindex="-1" role="dialog">
	  <div class="modal-dialog" role="document" style="background-color: black">
	    <div class="modal-content modals" style="width:958px">
	      <div class="modal-header">
	        <h5 class="modal-title">Ver Productos Existentes</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
			<?php

				 $productos = Producto::getProductos($database->getDB());
				$jsonProductos = json_decode($productos,true);
				//print_r($productos);
				foreach($jsonProductos as $indice=>$valor){
					if($jsonProductos[$indice]['Empresa']==$key){
					 $nombre = $jsonProductos[$indice]['nombreProducto'];
					 $descripcion=$jsonProductos[$indice]['descripcion'];
					 $precio = $jsonProductos[$indice]['precio'];
				echo "Nombre: $nombre, 
						  	Descripción: $descripcion, 
								Precio: $precio<br><br>"
						 ;
				}
				}
			?>

			</div>
			      <div class="modal-footer">

			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			
	      </div>
	    </div>
	  </div>
	</div>
		<!--_______________________________-->

		<!--____________Modal para agregar Promociones___________-->
<form id="formularioAgregarPromociones" enctype="multipart/form-data" role="form" method="POST">
	<div id="formulario-agregar-promocion" class="modal" style="color:aliceblue" tabindex="-1" role="dialog" >
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
		<?php echo "
<input type='text' style='display:none' value='$key' id='empresa' name='empresa'> "
?>
	<select name="producto" id="producto" class="custom-select form-control">
		<option value="">Seleccione el Producto en Promoción</option>
		<?php 
				 $productos = Producto::getProductos($database->getDB());
				$jsonProductos = json_decode($productos,true);
				//print_r($productos);
				foreach($jsonProductos as $indice=>$valor){
					if($jsonProductos[$indice]['Empresa']==$key){
					 $nombre = $jsonProductos[$indice]['nombreProducto'];
					 $descripcion=$jsonProductos[$indice]['descripcion'];
					 $precio = $jsonProductos[$indice]['precio'];
				echo "<option value=$indice>$nombre $descripcion $precio lps</opcion>"
						 ;
				}
				}
	?>
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
	<input type="text" id="precioOferta" name="precio" class="form-control inputPromocion" placeholder="Precio" style="width:-moz-available" value="">	<br>
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
				</div><div class="valid-feedback" style="text-align:right">Ok
				</div>
	            <div class="invalid-feedback" style="text-align:right">
	            Campo obligatorio
				</div>
	</div>

	<br>


	<div class="input-group mb-3 row">

				<label class="col-xl-12">Sucursales donde está disponible la promoción</label><br>
				<form id="sucursal">
							<?php 
				 $sucursales = Sucursal::getSucursales($database->getDB());
				$jsonSucursales = json_decode($sucursales,true);
				//print_r($productos);
				$value=0;
				foreach($jsonSucursales as $indice=>$valor){
					if($jsonSucursales[$indice]['empresa']==$key){
						$value=$value+1;
					 $nombre = $jsonSucursales[$indice]['nombreSucursal'];
				echo "<input id='sucursales' class='col-xl-4' value='$indice' name='sucursales' type='checkbox' aria-label='Checkbox for following text input'><label class='col-xl-6'>$nombre</label><br>";
					 ;
				}
				}
?>	
</form>
	</div>

	<div>
				<div class="valid-feedback" style="text-align:right">Ok
				</div>
	            <div class="invalid-feedback" style="text-align:right">
	            Campo obligatorio
				</div>
	</div>
	</div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-primary" id="registrarPromocion">Guardar Promocion</button>
					
					<br>	
	<a type="button" data-toggle="modal" data-target="#formulario-ver-promociones">
				
					 <button type="button" class="btn btn-primary" id="verProductos">Ver Registro de Promociones</button>	</a>
				</div>
												
	      </div>
	    </div>
	  </div>
	</div>
</form>

	<!--__________modal para agregar sucursales______-->
	<form id="formularioAgregarSucursales" enctype="multipart/form-data" role="form" method="POST">
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
		<?php echo "
					<input type='text' name='empresa' id='empresa' style='display:none' value=$key>
				"?>
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
							<button type="button" class="btn btn-primary" id="registrarSucursal">Guardar Sucursal</button>
							
							<br>	
							 <a data-toggle="modal" data-target="#formulario-ver-sucursales"><button class="btn btn-primary">Ver Registro de Sucursales</button></a>			
	      </div>
	    </div>
	  </div>
	</div>
	</form>
	<!--_______________________________-->
		<!--__________Ver Sucursales_______-->
	<div id="formulario-ver-sucursales" class="modal" style="color:aliceblue" tabindex="-1" role="dialog">
	  <div class="modal-dialog" role="document" style="background-color: black">
	    <div class="modal-content modals">
	      <div class="modal-header">
	        <h5 class="modal-title">Ver Sucursales Existentes</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
			<?php

				$sucursales = Sucursal::getSucursales($database->getDB());
				$jsonSucursales = json_decode($sucursales,true);
				//print_r($productos);
				foreach($jsonSucursales as $indice=>$valor){
					if($jsonSucursales[$indice]['empresa']==$key){
					 $nombre = $jsonSucursales[$indice]['nombreSucursal'];
					 $latitudSucursal=$jsonSucursales[$indice]['latitudSucursal'];
					 $longitudSucursal = $jsonSucursales[$indice]['longitudSucursal'];
				echo "Nombre: $nombre, 
						  	Latitud: $latitudSucursal, 
								Longitud: $longitudSucursal<br><br>"
						 ;
				}
				}
			?>

			</div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			
	      </div>
	    </div>
	  </div>
	</div>
		<!--_______________________________-->
		<!--__________Ver Promociones_______-->
	<div id="formulario-ver-promociones" class="modal" style="color:aliceblue" tabindex="-1" role="dialog">
	  <div class="modal-dialog" role="document" style="background-color: black">
	    <div class="modal-content modals">
	      <div class="modal-header">
	        <h5 class="modal-title">Ver Promociones Existentes</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
			<?php

			$promocion = Promocion::getPromociones($database->getDB());


				$jsonPromociones = json_decode($promocion,true);
				//print_r($productos);
				foreach($jsonPromociones as $indice=>$valor){
					if($jsonPromociones[$indice]['empresa']==$key){
						$idProducto = $jsonPromociones[$indice]['producto'];
						
						$productoJson = Producto::getProducto($database->getDB(),$idProducto);
					$producto = json_decode($productoJson,true);
					 $nombre = $producto['nombreProducto'];
					 $descripcion=$producto['descripcion'];
					 $precio = $producto['precio'];
				echo "Nombre: $nombre, Descripción: $descripcion, Precio: $precio
						  	<br><br>";
					
				}
				}
			?>

			</div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			
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
<?php
  $productos = Producto::getProductos($database->getDB());
$jsonProductos = json_decode($productos,true);
				
				 foreach($jsonProductos as $indice=>$valor){
					 if($jsonProductos[$indice]['Empresa']==$key){
					 $nombre = $jsonProductos[$indice]['nombreProducto'];
					 $descripcion=$jsonProductos[$indice]['descripcion'];
					 $precio = $jsonProductos[$indice]['precio'];
					 $url=$jsonProductos[$indice]['urlImagen'][0];
                echo "<div class='col-xl-3 col-md-2 col-sm-12'>
          <div class='producto'>
        <h3>$nombre</h3>
        <p class='descripcion'>$descripcion</p>
        <div class='precio'>$precio lps</div>
        <!--imagenes-->
        <div id='carouselExampleSlidesOnly' class='carousel slide carousel' data-ride='carousel'>
      <div class='carousel-inner'>
        <div class='carousel-item active'>
            <img src='fotosProductos$url' class='d-block w-100 imgCarousel'  alt='...'>
        </div>
        <div class='carousel-item'>
          <img src='fotosProductos$url' class='d-block w-100 imgCarousel' alt='...'>
        </div>
        <div class='carousel-item'>
          <img src='fotosProductos$url' class='d-block w-100 imgCarousel'  alt='...'>
        </div>
        </div>
            <button type='button' data-toggle='modal' style='margin: 8px;' data-target='#formulario-agregar-promocion'>Agregar a Promociones</button>
    </div>
        <hr>
        </div>
      </div>";
					 }
}
?>

	</div>
	
	<!--__________modal para ver ficha de promocion______-->
	<div id="formulario-ficha-promocional" class="modal" style="color:aliceblue" tabindex="-1" role="dialog">
<div class="modal-dialog" role="document"><div class="modal-content modals">
	<div class="modal-header"><h5 class="modal-title">Ficha Promocional</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
	</div>
	<!--_______________________________-->
	

	<!--Promociones-->
<div class="row divPromociones">

			<h5 class="categoria col-xl-12 col-md-12 col-sm-12">Promociones</h5>
		<?php 
				$promocion = Promocion::getPromociones($database->getDB());

				$jsonPromociones = json_decode($promocion,true);
				//print_r($productos);
				foreach($jsonPromociones as $indice=>$valor){
					if($jsonPromociones[$indice]['empresa']==$key){
						$idProducto = $jsonPromociones[$indice]['producto'];
						
						$productoJson = Producto::getProducto($database->getDB(),$idProducto);
					$producto = json_decode($productoJson,true);
					 $nombre = $producto['nombreProducto'];
					 $descripcion=$producto['descripcion'];
					 $precio = $producto['precio'];
					 $descuento = $jsonPromociones[$indice]['descuento'];
					 $precioOferta = $jsonPromociones[$indice]['precioOferta'];
					 $precioReal = $jsonPromociones[$indice]['precioReal'];
					 $url=$producto['urlImagen'][0];
					 $keyProducto=$indice;
	echo "
	<div class='col-xl-3 col-md-2 col-sm-12'>
		  <div class='promocion'>
					<span class='descuento'>$descuento%</span>
					<img src='img/oferta.png'>
				<h3>$nombre</h3>
				<div class='precioRebaja'>
				<div class='precioNormal'>$precioReal</div>
				<div class='precioOferta'>$precioOferta</div>
				</div>

			<!--imagenes-->
			<div id='carouselExampleSlidesOnly' class='carousel slide carousel' data-ride='carousel'>
				<div class='carousel-inner'>
						<div class='carousel-item active'>
								<img src='fotosProductos$url' class='d-block w-100 imgCarousel'  alt='...'>
						</div>
						<div class='carousel-item'>
							<img src='fotosProductos$url' class='d-block w-100 imgCarousel' alt='...'>
						</div>
						<div class='carousel-item'>
							<img src='fotosProductos$url' class='d-block w-100 imgCarousel'  alt='...'>
						</div>
				</div>
					<button type='button' data-toggle='modal' onclick='verFicha('".$nombre."')'>Ficha Promocional</button>
			</div>
			<hr>
			</div>
		</div>
		";		 
				 }
				}
				// data-target='#formulario-ficha-promocional'
?>	 
</div>
<!---->

	 

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



//llamado a agregar productos
   $('#registrarProducto').click(function(event) {
     agregarProducto('#formularioAgregarProductos');
	 });
	 
//llamado a agregar sucursales
$('#registrarSucursal').click(function(event){
	agregarSucursal('#formularioAgregarSucursales');
});

//llamado para agregar promociones
$('#registrarPromocion').click(function(event){
	agregarPromocion('#formularioAgregarPromociones');
});

//llamado para actualizar empresa
$('#actualizarEmpresa').click(function(event){
	validarEmpresaNuevo('#formularioEditarEmpresa');
});

//precioOferta,precioReal,descuento
function verFicha(nombre){
	/*
	var modal = document.getElementById('formulario-ficha-promocional');
	$('#formulario-ficha-promocional').append('<div class="modal-dialog" role="document"><div class="modal-content modals">\
	<div class="modal-header"><h5 class="modal-title">Ficha Promocional</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close">\
	<span aria-hidden="true">&times;</span>\
	        </button>\
	      </div>\
	      <div class="modal-body">\
		  <div class="promocion">\
				<span class="descuento" style="padding-left: 2rem;color: red;">15% de Descuento</span>\
		<h3 style="text-align: center;">Nombre</h3>\
		<h3>Precio Normal: lps. 200</h3>\
		<h3>Precio De Oferta: lps. 120</h3>\

	   <img src="img/index/descuentos.jpg" class="d-block w-100 imgCarousel"  alt="...">\

	  </div>\

		<hr>\

	</div>\
	      <div class="modal-footer">\
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>\
<button type="button" class="btn btn-primary">Imprimir</button>\
	      </div>\
	   </div>\
		</div>\
		</div>';
		)
		*/
		$('#formulario-ficha-promocional').modal('show');
	}


	</script>
	</body>
</html>