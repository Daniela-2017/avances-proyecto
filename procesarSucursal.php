  <?php
    include_once('clases/class-sucursal.php');
    $rutaArchivo = 'sucursales.json';


    if ($_POST!=null){



		    $sucursal = new Sucursal(
		    $_POST['nombreSucursal'],
            $_POST['latitudSuc'],
            $_POST['longitudSuc']);

        $sucursal->createSucursal($rutaArchivo,$_POST['nombreSucursal']);
  
}
?>