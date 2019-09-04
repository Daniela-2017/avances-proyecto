 <?php
    if ($_POST!=null){

    	//obtengo los datos del archivo empresas.php
		$contenidoArchivo=file_get_contents('empresas.json');
		$empresas=json_decode($contenidoArchivo,true);
		$empresas[] = $_POST;

		$archivo= fopen('empresas.json', 'w');
		fwrite($archivo, json_encode($empresas));
		fclose($archivo);
    }


?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta http-equiv="REFRESH" content="0.2;URL=RegistrarEmpresa.html">
</head>
<body>

</body>
</html>