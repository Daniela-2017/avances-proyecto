 <?php
    if ($_POST!=null){

    	//obtengo los datos del archivo empresas.php
		$contenidoArchivo=file_get_contents('empresas.json');
		$empresas=json_decode($contenidoArchivo,true);
		$empresas[] = $_POST;

		$archivo= fopen('empresas.json', 'w');
		fwrite($archivo, json_encode($empresas));
		fclose($archivo);
  
                header("Location: RegistrarEmpresa.html");
}



?>