
<?php
    include_once('clases/class-cliente.php');
    include_once('clases/class-database.php');
    //$rutaArchivo = 'empresas.json';

  $database = new Database();



    if ($_POST!=null ){
    	//obtengo los datos del archivo usuarios.php
    
 if($_FILES){
        $pathDestino="./fotosClientes";
        mkdir($pathDestino,0700);
        foreach($_FILES as $file){
          if($file["error"]==UPLOAD_ERR_OK){
            $pathsFoto[]='/'.'fotos'."/".$file["name"];
            move_uploaded_file($file["tmp_name"],
            $pathDestino.'/'.'fotos'.'/'.$file["name"]);//aquiiii vooooy
          }
          else{
            $message.="No se ha recibido ningun archivo";
          }
        }
      }
     
//probar
		    $cliente = new Usuario(
            $pathsFoto,
            $_POST['nombreCliente'],
            $_POST['apellidoCliente'],
            $_POST['paisCliente'],
            $_POST['direccionCliente'],
            $_POST['correoCliente'],
            $_POST['claveCliente']);

            
           // $_POST['foto'],
            //$_POST['confirmacionClave

        $cliente->createUser($database->getDB(),$_POST['correo']);
        exit();
        //header("Location: Registrar-cliente.html");
}




?>

