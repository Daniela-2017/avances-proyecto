

 <?php
 //corregir
 	//echo '<script>alert("jkvfk")</script>';


    //header('Content-Type: application/json'); //Tipod MIME
    include_once('clases/class-cliente.php');
    $rutaArchivo = 'usuarios.json';

    if ($_POST!=null){
    	//obtengo los datos del archivo usuarios.php


		    $cliente = new Usuario(
                
            $_POST['nombre'],
            $_POST['apellido'],
            $_POST['pais'],
            $_POST['direccion'],
            $_POST['correo'],
            $_POST['clave'],
            $_POST['confirmacionClave']);

        $cliente->createUser($rutaArchivo,$_POST['correo']);

        //header("Location: Registrar-cliente.html");
}

?>

