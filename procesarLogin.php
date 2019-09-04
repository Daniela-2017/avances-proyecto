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
					$id=$value['correo'];
					$nombre=$value['nombre'];
					$apellido=$value['apellido'];
					$pais=$value['pais'];
					$direccion=$value['direccion'];
					$clave=$value['clave'];
					$claveConf=$value['confirmacionClave'];

					$encontrado=true;
					header("Location: promociones.php?id=$id&nombre=$nombre&apellido=$apellido&pais=$pais&direccion=$direccion&clave=$clave&claveconf=$claveConf");

				}
				if ($encontrado!=true) {
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

					$encontrado=true;
					header("Location: empresa.html");
				}
				
		}
						if ($encontrado!=true) {
					header("Location: login.html");
				}
		}
    }
?>
