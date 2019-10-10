<html>

<head>
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
  <section class="mostrarPerfil" id="perfil">
    <div class="row divProductos">
      <h5 class="categoria col-xl-12 col-md-12 col-sm-12">Promociones</h5>
  <?php 

include_once('clases/class-cliente.php');
include_once('clases/class-promocion.php');
include_once('clases/class-producto.php');
include_once('clases/class-database.php');

  $database = new Database();
  				$promocion = Promocion::getPromociones($database->getDB());

				$jsonPromociones = json_decode($promocion,true);
				//print_r($productos);
				foreach($jsonPromociones as $indice=>$valor){
						$idProducto = $jsonPromociones[$indice]['producto'];
						
						$productoJson = Producto::getProducto($database->getDB(),$idProducto);
					$producto = json_decode($productoJson,true);
					 $nombre = $producto['nombreProducto'];
					 $descripcion=$producto['descripcion'];
					 $descuento = $jsonPromociones[$indice]['descuento'];
					 $precioOferta = $jsonPromociones[$indice]['precioOferta'];
					 $url=$producto['urlImagen'][0];
echo "
      <div class='col-xl-3 col-md-2 col-sm-12'>
        <div class='producto'>
          <h3>$nombre</h3>
          <p class='descripcion'>$descripcion</p>
          <div class='precio'>$precioOferta lps</div>
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
          <hr>
        </div>
      </div>";
        }
?>

    
  </section>

  <script src="jquery/jquery-3.4.1.min.js"></script>
  <script src="popper/popper.min.js"></script>
  <script src="BootstrapJS/bootstrap.min.js"></script>
  <script src="controlador.js"></script>
</body>

</html>