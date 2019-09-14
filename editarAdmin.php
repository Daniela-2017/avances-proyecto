<?php
if ($_SERVER['REQUEST_METHOD']=='GET'){
    $rutaArchivo = 'administrador.json';
        $_PUT=array();
        if ($_SERVER['REQUEST_METHOD'] == 'GET'){
            parse_str(file_get_contents("php://input"), $_PUT);
            //var_dump($_PUT);
        }
        
        //header('Content-Type: application/json'); //tipos MIME
        $contenido = file_get_contents($rutaArchivo);
        $administrador = json_decode($contenido,true);

        $administrador[$_GET['indice']] = $_GET;
        unset($administrador[$_GET['indice']]['indice']);
        
        $archivo=fopen($rutaArchivo,'w');
        fwrite($archivo, json_encode($administrador));
        fclose($archivo);
        echo json_encode($administrador);
        //echo json_encode($_PUT);

        header("Location: login.html");
}
?>