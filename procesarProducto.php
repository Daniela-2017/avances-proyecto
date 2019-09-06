  <?php

  echo "Producto agregado correctamente";
    if ($_POST!=null){

    	//obtengo los datos del archivo empresas.php
		$contenidoArchivo=file_get_contents('productos.json');
		$productos=json_decode($contenidoArchivo,true);
		$productos[] = $_POST;

		$archivo= fopen('productos.json', 'w');
		fwrite($archivo, json_encode($productos));
		fclose($archivo);
  
}
?>