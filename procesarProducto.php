  <?php

    include_once('clases/class-producto.php');
    $rutaArchivo = 'productos.json';


    if ($_POST!=null){
    
		    $producto = new Producto(
		    $_POST['Empresa'],
            $_POST['codigoProducto'],
            $_POST['nombreProducto'],
            $_POST['precio'],
            $_POST['descripcion'],
            $_POST['urlImagen']);

        $producto->createProducto($rutaArchivo,$_POST['codigoProducto']);


};
?>