<?php
 //corregir
 	//echo '<script>alert("jkvfk")</script>';


    //header('Content-Type: application/json'); //Tipod MIME
    include_once('clases/class-admin.php');
    include_once('clases/class-database.php');

  $database = new Database();

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
      $nuevoAdmin= new Administrador(
            $_POST['primerNombreAdmin'],
            $_POST['primeroApellidoAdmin'],
            $_POST['pais'],
            $_POST['direccion'],
            $_POST['direccionAdmin'],
            $_POST['correo'],
            $_POST['clave']);

      $nuevoAdmin->updateAdmin($database->getDB(),$_POST['keyAdmin']);


    
  exit();

        //header("Location: Registrar-cliente.html");
}

?>