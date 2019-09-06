<?php
echo $_SERVER['REQUEST_METHOD'];
if ($_SERVER['REQUEST_METHOD']=='GET'){
    $rutaArchivo = 'empresas.json';
        $_PUT=array();
        if ($_SERVER['REQUEST_METHOD'] == 'GET'){
            parse_str(file_get_contents("php://input"), $_PUT);
            //var_dump($_PUT);
        }
        
        //header('Content-Type: application/json'); //tipos MIME
        $contenido = file_get_contents($rutaArchivo);
        $empresa = json_decode($contenido,true);

        $empresa[$_GET['indice']] = $_GET;
        unset($empresa[$_GET['indice']]['indice']);
        
        $archivo=fopen($rutaArchivo,'w');
        fwrite($archivo, json_encode($empresa));
        fclose($archivo);
        //echo json_encode($empresa);

        header("Location: login.html");
}
?>