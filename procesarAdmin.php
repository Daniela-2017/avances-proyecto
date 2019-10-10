<?php


    //header('Content-Type: application/json'); //Tipod MIME
    include_once('clases/class-admin.php');
    include_once('clases/class-database.php');

  $database = new Database();

if ($_POST!=null){
      $nuevoAdmin= new Administrador(
            $_POST['primerNombreAdmin'],
            $_POST['primeroApellidoAdmin'],
            $_POST['pais'],
            $_POST['direccionAdmin'],
            $_POST['correo'],
            $_POST['clave']);

      $nuevoAdmin->updateAdmin($database->getDB(),$_POST['keyAdmin']);


    
  exit();

}

?>