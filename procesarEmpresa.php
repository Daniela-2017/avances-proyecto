 <?php
    include_once('clases/class-empresa.php');
    include_once('clases/class-database.php');
    //$rutaArchivo = 'empresas.json';

  $database = new Database();
    if ($_POST!=null){
    	//obtengo los datos del archivo usuarios.php

 if($_FILES){
        $pathDestino="./fotosEmpresa";
        mkdir($pathDestino,0700);
        
        //foreach($_FILES as $file){
        //  $imagen=$_FILES['banner'][0]['tmp_name'];
          if($_FILES["error"]==UPLOAD_ERR_OK){
           // print_r ($imagen);
            $pathsBanners[]='/'.'banners'."/".$_FILES["banner"]["name"];
            move_uploaded_file($_FILES["banner"]["tmp_name"],
            $pathDestino.'/'.'banners'.'/'.$_FILES["banner"]["name"]);//aquiiii vooooy


          $pathsLogotipos[]='/'.'logotipos'."/".$_FILES["logotipo"]["name"];
            move_uploaded_file($_FILES["logotipo"]["tmp_name"],
            $pathDestino.'/'.'logotipos'.'/'.$_FILES["logotipo"]["name"]);
          }
          else{
            $message.="No se ha recibido ningun archivo";
          }
        //}
      }

		    $empresa = new Empresa(
            $pathsBanners,
            $pathsLogotipos,
            $_POST['nombreEmpresa'],
            $_POST['pais'],
            $_POST['direccion'],
            $_POST['latitud'],
            $_POST['longitud'],
            $_POST['facebook'],
            $_POST['whatsapp'],
            $_POST['twitter'],
            $_POST['instagram'],
            $_POST['RedesSociales'],
            $_POST['correo'],
            $_POST['ClaveEmpresa']);

        $empresa->createEmpresa($database->getDB(),$_POST['id']);
        exit();
}
?>