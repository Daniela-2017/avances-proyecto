


<?php 

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
					$pais = $value['pais'];
					$direccion = $value['direccion'];
					$latitud=$value['latitud'];
					$longitud= $value['longitud'];
					$urlBanner= $value['urlBanner'];
					$urlLogotipo= $value['urlLogotipo'];
					$facebook= $value['facebook'];
					$whatsapp= $value['whatsapp'];
					$twitter= $value['twitter'];
					$instagram= $value['instagram'];
					$redes= $value['redes'];
					$correo= $value['correo'];
					$clave= $value['clave'];
					$claveConfirmacion= $value['claveConfirmacion'];

					$encontrado=true;
				
					header("Location: empresa.php?id=$id&pais=$pais&direccion=$direccion&latitud=$latitud&longitud=$longitud&urlBanner=$urlBanner&urlLogotipo=$urlLogotipo&facebook=$facebook&whatsapp=$whatsapp&twitter=$twitter&instagram=$instagram&redes=$redes&correo=$correo&clave=$clave&claveConfirmacion=$claveConfirmacion");
				}
				
		}
						if ($encontrado!=true) {
					header("Location: login.html");
				}
		}

	elseif ($_POST['tipoIngreso']=='Super Administrador') {
			$contenidoArchivo=file_get_contents('administrador.json');
			$admin=json_decode($contenidoArchivo,true);
			//$admin[] = $POST;

			foreach ($admin as $key => $value) {
				if ($value['correo']==$_POST['Usuario'] && $value['clave']==$_POST['Clave']) {
					$nombre=$value['nombre'];
					$apellido=$value['apellido'];
					$pais=$value['pais'];
					$direccion=$value['direccion'];
					$id=$value['correo'];
					$clave=$value['clave'];
					$claveConf=$value['confirmacionClave'];

					$encontrado=true;
					header("Location: admin.php?id=$id&nombre=$nombre&apellido=$apellido&pais=$pais&direccion=$direccion&clave=$clave&claveconf=$claveConf");

				}
				if ($encontrado!=true) {
					header("Location: login.html");
				}
				
		}

	}
    }
?>
