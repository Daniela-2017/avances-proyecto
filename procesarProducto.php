  <?php

    include_once('clases/class-producto.php');
    require_once('clases/class-database.php');
    //$rutaArchivo = 'productos.json';

  $database = new Database();

    if ($_POST!=null){
     if($_FILES){
        $pathDestino="./fotosProductos";
        mkdir($pathDestino,0700);
        
        //foreach($_FILES as $file){
        //  $imagen=$_FILES['banner'][0]['tmp_name'];
          if($_FILES["error"]==UPLOAD_ERR_OK){
           // print_r ($imagen);
            $pathsProductos[]='/'.'productos'."/".$_FILES["urlImagen"]["name"];
            move_uploaded_file($_FILES["urlImagen"]["tmp_name"],
            $pathDestino.'/'.'productos'.'/'.$_FILES["urlImagen"]["name"]);//aquiiii vooooy

          }
          else{
            $message.="No se ha recibido ningun archivo";
          }
        //}
      }
		    $producto = new Producto(
		        $_POST['Empresa'],
            $_POST['codigoProducto'],
            $_POST['nombreProducto'],
            $_POST['precio'],
            $_POST['descripcion']);

        $producto->createProducto($database->getDB(),$_POST['codigoProducto']);


};
?>