	<!DOCTYPE html>
<html>

<head >
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Promociones</title>

<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="master.css">
<link rel="shortcut icon" type="image/png" href="img/empresa.png">
<link rel="stylesheet" href="BootstrapCSS/bootstrap.min.css">
</head>

<body>
  <a class='btn btn-primary' href='index.php' style='margin-right: 3px;' type='button' >Volver al menu principal</a>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top" style="background-color:#255eb3 !important;">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault"
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <form class="form-inline my-2 my-lg-0 ml-auto">
      <a class='btn btn-primary' href='index.php' style='margin-right: 3px;' type='button' >Volver al menu principal</a>
        <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
 
        <button class="btn btn-primary" style="margin-right: 3px;" type="submit">Buscar Promoción</button>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formulario-actualizar-cliente">
          Editar Perfil
        </button>

      </form>
    </div>
  </nav>
  
  
  <section class="mostrarPerfil" id="promocion">
<?php 

include_once('clases/class-cliente.php');
include_once('clases/class-promocion.php');
include_once('clases/class-producto.php');
include_once('clases/class-database.php');
    //$rutaArchivo = 'empresas.json';

  $database = new Database();

  $key = $_GET['id'];
  $infor = Usuario::getUser($database->getDB(),$key);
$json=json_decode($infor);
foreach($json as $k=>$v){
  if($k=='nombre'){
    $nombreUsuario= $v;
  }
  if($k=='foto'){
    $foto=$v[0];
  }

}

           
  

//$nombre=$infor['nombre'];
 // $foto=$infor['foto'[0]];//verificar e investigar como se hace
echo "<div id='bannerEmpresa' class='' style='width: auto;'>
    <div class='logotipo' style='background-image:url(fotosClientes$foto);margin-top: 4rem;'>

    </div> 
</div> 

     <h1 style='color:wheat;text-align: center;' id='tituloEmpresa' class='producto'>Hola! $nombreUsuario Bienvenido</h1>
"?>
    <div class='row divProductos'>
      <h5 class='categoria col-xl-12 col-md-12 col-sm-12' style='margin-top: 4rem;'>Promociones</h5>

<?php


  				$promocion = Promocion::getPromociones($database->getDB());

				$jsonPromociones = json_decode($promocion,true);
        $i=0;
				//print_r($productos);
				foreach($jsonPromociones as $indice=>$valor){
$i=$i+1;
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
           $fechaInicio=$jsonPromociones[$indice]['fechaInicio'];
           $fechaFinal=$jsonPromociones[$indice]['fechaFinal'];
           $idEstrellas=$i+11;
           $id2=$i;
echo "
      <div class='col-xl-3 col-md-2 col-sm-12'>
        <div class='producto'>

          <span class='descuento col-xl-12'>$descuento%</span>

          <img src=img/oferta.png style='height: 5.3rem'>

          <h3>$nombre</h3>
          <div class='precioRebaja'>
            <div class='precioNormal'>$precioReal</div>
            <div class='precioOferta'>$precioOferta</div>
          </div>
          <!--imagenes-->
          <div id='carouselExampleSlidesOnly' class='carousel slide carousel' data-ride='carousel'>
            <div class='carousel-inner'>
              <div class='carousel-item active'>
                <img src='fotosProductos$url' class='d-block w-100 imgCarousel' alt='...'>
              </div>
              <div class='carousel-item'>
                <img src='fotosProductos$url' class='d-block w-100 imgCarousel' alt='...'>
              </div>
              <div class='carousel-item'>
                <img src='fotosProductos$url' class='d-block w-100 imgCarousel' alt='...'>
              </div>
            </div>
          </div>
          <br>
          <div id='$idEstrellas'>

          </div>
          <hr>
          <span class='fecha'>Del $fechaInicio al $fechaFinal, Aprovecha!</span>
          <div class='row'>
          
            <form onsubmit='agregarComentario()' method='POST'><!--este form es solo para enviar el comentario al archivo-->
              
              
              <input type='text' style='display: none' id='usuario' name='usuario' value='debe ir el usuario'>
              <input type='text' id='comentar' name='comentario' class='form-control inputProducto' placeholder='Comenta la promoción' style='margin:3px;width:-moz-available'
              value=''>
            <button class='col-xl-6' type='submit' style='margin-left: 5rem;'>Comentar</button>
            </form>

            
            <br>
            <select id=$id2 class='custom-select'>
        <option value=''>Califica el producto</option>
        <option value='1' onclick='calificarPoducto($idEstrellas,$id2)'>1</option>
        <option value='2' onclick='calificarPoducto($idEstrellas,$id2)'>2</option>
        <option value='3' onclick='calificarPoducto($idEstrellas,$id2)'>3</option>
        <option value='4' onclick='calificarPoducto($idEstrellas,$id2)'>4</option>
        <option value='5' onclick='calificarPoducto($idEstrellas,$id2)'>5</option>
    </select>

            <button type='button' data-toggle='modal' style='margin: 8px;' data-target='#formulario-comprar-producto'>Comprar Artículo</button>
            <button class='col-xl-6' style='margin-left: 5rem;' data-toggle='modal' data-target='#formulario-VerMas'>Ver Detalles</button>
          </div>
        </div>
        </div>";
      }
?>
</div>
  </section>

  <!--Modal para simular compra-->
  <div id="formulario-comprar-producto" class="modal" style="color:aliceblue" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content modals">
        <div class="modal-header">
          <h5 class="modal-title">Hacer Compra de Producto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">

          <div>
            <input type="text" id="nTarjeta" class="form-control inputProducto" placeholder="Proporione su numero de tarjeta" style="width:-moz-available"
              value="">
            <div class="valid-feedback" style="text-align:right">Ok
            </div>
            <div class="invalid-feedback" style="text-align:right">
              Campo obligatorio
            </div>
          </div>

          <br>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary" onclick="comprarProducto()">Comprar</button>
        </div>
      </div>
    </div>
  </div>

  <!--Modal para mas opciones en cada producto-->
  <div id="formulario-VerMas" class="modal" style="color:aliceblue" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content modals">
        <div class="modal-header">
          <h5 class="modal-title">Más opciones</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body row">

          <button type="button" class="btn btn-primary btnVerMas col-xl-12 col-md-12 col-sm-12" onclick="VerEmpresaAsociada()">Ver Empresa Asociada</button>
          <button type="button" class="btn btn-primary btnVerMas col-xl-12 col-md-12 col-sm-12" onclick="">Ver en Google Maps</button>
          <button type="button" class="btn btn-primary btnVerMas col-xl-12 col-md-12 col-sm-12" onclick="">Guardar Promoción como favorita</button>
          <button type="button" class="btn btn-primary btnVerMas col-xl-12 col-md-12 col-sm-12" onclick="">Guardar Empresa como favorita</button>


          <br>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

        </div>
      </div>
    </div>
  </div>
<!--Modal para ver comentarios-->
  <div id="ver-comentarios" class="modal" style="color:aliceblue" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content modals">
        <div class="modal-header">
          <h5 class="modal-title">Comentarios</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">

          <div>
<!--mostrar aqui los comentarios-->
          </div>

          <br>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
  <!--Modal para actualizar cliente-->
  <div class="modal fade" id="formulario-actualizar-cliente" style="color: aliceblue" ; tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content modals">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Actualizar Clientes</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!--agregar metodo-->
          <?php
  	    include_once('clases/class-cliente.php');
    	  include_once('clases/class-database.php');
    //$rutaArchivo = 'empresas.json';

        $database = new Database();

				 $usuario = Usuario::getUser($database->getDB(),$key);
				  $jsonUsuario = json_decode($usuario,true);
					 $nombre = $jsonUsuario['nombre'];
					 $apellido=$jsonUsuario['apellido'];
					 $pais = $jsonUsuario['pais'];
					 $direccion = $jsonUsuario['direccion'];
					 $clave = $jsonUsuario['clave'];
					 $correo = $jsonUsuario['correo'];
					 $urlFoto = $jsonUsuario['foto'][0];


          echo "<form id='formularioEditarCliente' enctype='multipart/form-data' role='form' method='POST'>
          <input value=$key name='indice' id='keyCliente' style='display:none'>
          <input class='form-control ActualizarCliente' type='text' id='primerNombre-nuevo' name='nombre' value='$nombre' placeholder='Primer Nombre'><br>
			<!-- Campo ficticio para simular el path del archivo -->
			<div>
				<input type='text' value='$urlFoto' id='url-foto' name='urlFoto' class='input-url form-control' />
				<!-- label para simular el boton 'seleccionar archivo' -->
				<label class='cargar' style='cursor:pointer'>
	Subir Foto para Perfil
	<span>
	
		    <input type='file' id='foto' name='foto' style='display:none'/>
	</span></label>
				<!-- Campo original file -->

			</div>
<br><br><br>
          <input class='form-control ActualizarCliente' type='text' id='primeroApellido-nuevo' name='apellido' placeholder='Primer Apellido' value='$apellido'>
          <br>
          <input class='form-control ActualizarCliente' type='text' id='pais-nuevo' placeholder='Escriba su País de Origen' name='pais' value='$pais'>
          <br>
          <textarea class='form-control ActualizarCliente' id='direccion-nuevo' name='direccion' placeholder='Escriba aquí la Dirección' style='width:-moz-available' rows='3' cols='20'>$direccion</textarea>
            
          <br>

          <div class='form-row align-items-center'>
            <div class='input-group'>
              <div class='input-group-prepend' style='height: 40px'>
                <div class='input-group-text'>@</div>
                <input type='text' id='correo-nuevo-cliente' class='form-control ActualizarCliente' name='correo' placeholder='Escriba el correo electrónico' value='$correo'
                  style='width:-moz-available'>
                <div class='valid-feedback' style='text-align:right'>Ok</div>
                <div class='invalid-feedback' style='text-align:right; margin-bottom:9px'>
                  Correo no válido
                </div>

              </div>
            </div>

          </div>
          <br>
          <div>
            <input type='password' id='ClaveCliente-nueva' class='form-control ActualizarCliente' placeholder='Escriba una contraseña segura'
              style='width:-moz-available' name='clave' value=''>
            <div class='valid-feedback' style='text-align:right'>Ok</div>
            <div class='invalid-feedback' style='text-align:right; margin-bottom:9px'>
              Las contraseñas no coinciden
            </div>
          </div>
          <br>
          <div>
            <input type='password' name='confirmacionClave' value='' id='ConfirmacionCliente-nueva' class='form-control ActualizarCliente' placeholder='Confirme su Contraseña'
              style='width:-moz-available; margin-left:auto'>
          </div>
        </div>
        <div class='modal-footer'>
          <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>
          <button type='button' class='btn btn-primary' id='actualizarCliente'>Guardar Cambios</button>
        </div>
      </div>
    </div>
  </div>
  </form>
  ";

?>
  <!--_________________________________-->


<script src="jquery/jquery-3.4.1.min.js"></script>
<script src="popper/popper.min.js"></script>
<script src="BootstrapJS/bootstrap.min.js"></script>
<script src="BootstrapJS/all.js"></script>
<script src="controlador.js"></script>
<script>
//llamado para actualizar cliente
$('#actualizarCliente').click(function(event){
	validarClienteNuevo('#formularioEditarCliente');
});
</script>
</body>
</html>