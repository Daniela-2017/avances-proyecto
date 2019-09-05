
 <?php


    if ($_POST!=null){
    	//obtengo los datos del archivo usuarios.php

		$contenidoArchivo=file_get_contents('usuarios.json');
		$usuarios=json_decode($contenidoArchivo,true);
		$usuarios[] = $_POST;

		$archivo= fopen('usuarios.json', 'w');
		fwrite($archivo, json_encode($usuarios));
		fclose($archivo);

        echo "<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta http-equiv='REFRESH' content='0.2' ;URL=Registrar-cliente.html'>
</head>
<body>

</body>
</html>";

}

else if ($_SERVER['REQUEST_METHOD']=='GET'){
    $rutaArchivo = 'usuarios.json';
        $_PUT=array();
        if ($_SERVER['REQUEST_METHOD'] == 'GET'){
            parse_str(file_get_contents("php://input"), $_PUT);
            //var_dump($_PUT);
        }
        
        //header('Content-Type: application/json'); //tipos MIME
        $contenido = file_get_contents($rutaArchivo);
        $usuarios = json_decode($contenido,true);

        $usuarios[$_GET['indice']] = $_GET;
        unset($usuarios[$_GET['indice']]['indice']);
        
        $archivo=fopen($rutaArchivo,'w');
        fwrite($archivo, json_encode($usuarios));
        fclose($archivo);
        echo json_encode($usuarios);
        //echo json_encode($_PUT);

        header("Location: login.html");
}
?>
