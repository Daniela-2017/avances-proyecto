<?php

    include_once('clases/class-promocion.php');
    require_once('clases/class-database.php');
    //$rutaArchivo = 'productos.json';

  $database = new Database();
    if ($_POST!=null){
		 $promocion = new Promocion(
		    $_POST['empresa'],
            $_POST['producto'],
            $_POST['descuento'],
            $_POST['precioProductoPromocion'],
            $_POST['precioOferta'],
            $_POST['fechaInicio'],
            $_POST['fechaFinal'],
            $_POST['sucursales']
            );

        $promocion->createPromocion($database->getDB(),$_POST['codigoProducto']);


};
?>
