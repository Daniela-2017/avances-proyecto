  <?php

    include_once('clases/class-producto.php');
    require_once('clases/class-database.php');
    //$rutaArchivo = 'productos.json';

  $database = new Database();
    if ($_POST!=null){
     if($_FILES){
        $pathDestino="./fotosProductos";
        mkdir($pathDestino,0700);
 
          if($_FILES["error"]==UPLOAD_ERR_OK){

            $pathsProductos[]='/'.'productos'."/".$_FILES["urlImagen"]["name"];
            move_uploaded_file($_FILES["urlImagen"]["tmp_name"],
            $pathDestino.'/'.'productos'.'/'.$_FILES["urlImagen"]["name"]);

          }
          else{
            $message.="No se ha recibido ningun archivo";
          }
        //}
      }
		    $producto = new Producto(
            $pathsProductos,
		        $_POST['empresa'],
            $_POST['CodigoProducto'],
            $_POST['NombreProducto'],
            $_POST['PrecioProducto'],
            $_POST['descripcionProducto']);

        $producto->createProducto($database->getDB(),$_POST['codigoProducto']);


};
?>