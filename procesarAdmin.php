<?php
 //corregir
 	//echo '<script>alert("jkvfk")</script>';


    //header('Content-Type: application/json'); //Tipod MIME
    include_once('clases/class-admin.php');
    $rutaArchivo = 'administrador.json';


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_PUT=array();
            parse_str(file_get_contents("php://input"), $_PUT);
            //var_dump($_PUT);
        
		    $admin = new Administrador(
                
            $_POST['primerNombre'],
            $_POST['primerApellido'],
            $_POST['pais'],
            $_POST['direccion'],
            $_POST['correo'],
            $_POST['clave'],
            $_POST['claveConfirmacion']);

        $admin->updateAdmin($rutaArchivo,$_POST['correo']);

        //header("Location: Registrar-cliente.html");
}

?>