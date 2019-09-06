
 <?php

    if ($_POST!=null){
    	//obtengo los datos del archivo usuarios.php


		$contenidoArchivo=file_get_contents('usuarios.json');
		$usuarios=json_decode($contenidoArchivo,true);
		$usuarios[] = $_POST;

		$archivo= fopen('usuarios.json', 'w');
		fwrite($archivo, json_encode($usuarios));
		fclose($archivo);

        header("Location: Registrar-cliente.html");

}

?>
