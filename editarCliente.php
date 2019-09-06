<?php
if ($_SERVER['REQUEST_METHOD']=='GET'){
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