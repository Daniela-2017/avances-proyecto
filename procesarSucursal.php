  <?php
    include_once('clases/class-sucursal.php');
    require_once('clases/class-database.php');

  $database = new Database();
    if ($_POST!=null){
		    $sucursal = new Sucursal(
            $_POST['empresa'],
		        $_POST['nombreSucursal'],
            $_POST['latitudSucursal'],
            $_POST['longitudSucursal']);

        $sucursal->createSucursal($database->getDB(),$_POST['nombreSucursal']);
  
}
?>