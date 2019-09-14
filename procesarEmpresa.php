 <?php
    include_once('clases/class-empresa.php');
    $rutaArchivo = 'empresas.json';

    if ($_POST!=null){
    	//obtengo los datos del archivo usuarios.php


		    $cliente = new Empresa(
            $_POST['id'],
            $_POST['direccion'],
            $_POST['latitud'],
            $_POST['longitud'],
            $_POST['urlBanner'],
            $_POST['urlLogotipo'],
            $_POST['facebook']);
            $_POST['whatsapp'],
            $_POST['twitter'],
            $_POST['instagram'],
            $_POST['redes'],
            $_POST['correo'],
            $_POST['clave'],
            $_POST['claveConfirmacion'],  ;

        $cliente->createUser($rutaArchivo,$_POST['correo']);



?>