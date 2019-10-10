
 <?php

//no me funciona :(
    if ($_POST!=null){
    	//obtengo los datos del archivo usuarios.php


		$contenidoArchivo=file_get_contents('comentarios.json');
		$comentarios=json_decode($contenidoArchivo,true);
		$comentarios[] = $_POST;

		$archivo= fopen('comentarios.json', 'w');
		fwrite($archivo, json_encode($comentarios));
		fclose($archivo);

        header("Refresh:3;url=promociones.php");

}

?>
