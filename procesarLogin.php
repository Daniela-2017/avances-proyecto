<?php 
    //cambiar por get
    if ($_POST!=null){
    	//obtengo los datos del archivo empresas.php
    	if($_POST['tipoIngreso']=='Usuario'){
			$contenidoArchivo=file_get_contents('usuarios.json');
			$usuarios=json_decode($contenidoArchivo,true);
			//$usuarios[] = $POST;

			foreach ($usuarios as $key => $value) {
				if ($value['correo']==$_POST['Usuario'] && $value['clave']==$_POST['Clave']) {
					header("Location: promociones.html");
				}
				else{
					header("Location: login.html");
				}
				
		}
			
		}

		elseif ($_POST['tipoIngreso']=='Empresa') {
						$contenidoArchivo=file_get_contents('empresas.json');
			$empresas=json_decode($contenidoArchivo,true);
			//$empresas[] = $POST;

			foreach ($empresas as $key => $value) {
				if ($value['id']==$_POST['Usuario'] && $value['clave']==$_POST['Clave']) {
					$id = $value['id'];
					header("Location: empresa.html");
				}
				else{
					header("Location: login.html");
				}
				
		}
		}
    }
?>
