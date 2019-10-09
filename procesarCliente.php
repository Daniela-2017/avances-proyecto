
<?php
    include_once('clases/class-cliente.php');
    include_once('clases/class-database.php');
    //$rutaArchivo = 'empresas.json';

  $database = new Database();

  if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['keyCliente'])){
        //foreach($_FILES as $file){
        //  $imagen=$_FILES['banner'][0]['tmp_name'];
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
   

      $nuevoCliente= new Usuario(
            $pathsFoto,
            $_POST['nombreCliente'],
            $_POST['apellidoCliente'],
            $_POST['paisCliente'],
            $_POST['direccionCliente'],
            $_POST['correoCliente'],
            $_POST['claveCliente']);
      $nuevoCliente->updateUser($database->getDB(),$_POST['keyCliente']);
  exit();
  }

else if ($_SERVER['REQUEST_METHOD']=='POST'){
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
