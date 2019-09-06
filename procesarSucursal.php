  <?php

  echo "Sucursal agregada correctamente";
    if ($_POST!=null){

    	//obtengo los datos del archivo empresas.php
		$contenidoArchivo=file_get_contents('sucursales.json');
		$sucursales=json_decode($contenidoArchivo,true);
		$sucursales[] = $_POST;

		$archivo= fopen('sucursales.json', 'w');
		fwrite($archivo, json_encode($sucursales));
		fclose($archivo);
  
}
?>