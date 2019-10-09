

<?php
//borrar este archivo
    include_once('clases/class-cliente.php');
    include_once('clases/class-database.php');
    //$rutaArchivo = 'empresas.json';

  $database = new Database();

$clave=password_hash('asd.456',PASSWORD_DEFAULT);
$db=$database->getDB();
          $result=$db->getReference('Administrador')
        ->push([
        'nombre'=>'Daniela',
        'apellido'=>'Zavala',
        'pais'=>'Honduras',
        'direccion'=>'Colonia Flor del campo zona2',
        'correoAdmin'=>'danny15zavalalic@gmail.com',
        'clave'=>$clave
    ]);
?>