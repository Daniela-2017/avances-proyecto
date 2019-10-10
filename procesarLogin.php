<?php 


    include_once('clases/class-cliente.php');
    include_once('clases/class-empresa.php');
    include_once('clases/class-database.php');
    include_once('clases/class-admin.php');

  $database = new Database();

if ($_POST!=null){
    if($_SERVER['REQUEST_METHOD']=='POST' && $_POST['tipoIngreso']=='Usuario' && isset($_GET['accion']) && $_GET['accion']=='login'){
     Usuario::login($_POST['Usuario'],$_POST['Clave'],$database->getDB());

		exit();
    }

	else if($_SERVER['REQUEST_METHOD']=='POST' && $_POST['tipoIngreso']=='Empresa' && isset($_GET['accion']) && $_GET['accion']=='login'){
      Empresa::login($_POST['Usuario'],$_POST['Clave'],$database->getDB());
      exit();
    }

	else if($_SERVER['REQUEST_METHOD']=='POST' && $_POST['tipoIngreso']=='Super Administrador' && isset($_GET['accion']) && $_GET['accion']=='login'){
	Administrador::login($_POST['Usuario'],$_POST['Clave'],$database->getDB());
		exit();
	}
}

?>
