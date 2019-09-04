<!--<script type="text/javascript">
 	var camposClienteRegistro=[
    {campo:'nombreCliente', valido: false},
    {campo:'apellidoCliente', valido: false},
    {campo:'paisCliente', valido: false},
    {campo:'direccionCliente', valido: false},
    {campo:'correoCliente', valido: false},
    {campo:'claveCliente',valido:false}
] 
;
    RegistrarCliente();
    ValidarClaveCliente();
    validarCorreoCliente('correoCliente');


 function RegistrarCliente(){
    for(let i=0; i<camposClienteRegistro.length; i++)
         camposClienteRegistro[i].valido=validarCampos(camposClienteRegistro[i].campo);
    
}

function validarCorreoCliente(id){//cliente
    let re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    let valido= re.test(document.getElementById(id).value);
let correo=document.getElementById('correoCliente').value;
    if (valido==true){
        document.getElementById(id).classList.remove('is-invalid');
        document.getElementById(id).classList.add('is-valid');
         camposClienteRegistro[4].valido=true;
        for(let i=0; i<camposClienteRegistro.length; i++)
        if(!camposClienteRegistro[i].valido) return;
/*seccion para agregar al localstorage la empresa, se ubica en esta funcion
    porque es la ultima que ejecuta el boton ingresar empresa*/
     let cliente=
        {   nombreCliente:document.getElementById('nombreCliente').value,
            apellidoCliente:document.getElementById('apellidoCliente').value,
            paisCliente:document.getElementById('paisCliente').value,
            direccionCliente:document.getElementById('direccionCliente').value,
            correoCliente:document.getElementById('correoCliente').value,
            claveCliente:document.getElementById('claveCliente').value,
            }
        if(localStorage.length==0){
             localStorage.setItem(document.getElementById('nombreEmpresa').value,JSON.stringify(empresa));
             alert('Su empresa ha sido agregada satisfactoriamente');
        }
        else{
        for(let i=0; i<localStorage.length;i++){
          if(localStorage.key(i)==correo){
            alert('Ya existe una cuenta cliente con el mismo correo'); return//no la agrega
          }
        }
    localStorage.setItem(correo,JSON.stringify(cliente));
    alert('Su cuenta cliente ha sido agregada satisfactoriamente');
  }
    return true;
    }

    else{
        document.getElementById(id).classList.remove('is-valid');
        document.getElementById(id).classList.add('is-invalid');
        camposClienteRegistro[4].valido=false;
        return false;        
    }
    
   
}

function ValidarClaveCliente(){
    let ClaveCliente=document.getElementById('claveCliente').value;
    let confirmacionCliente=document.getElementById('clave2Cliente').value;

    CompararClaveCliente(ClaveCliente,confirmacionCliente,'claveCliente');

}

function validarCampos(id){
    /*console.log(document.getElementById(id).value);*/
    if(document.getElementById(id).value==''){
        document.getElementById(id).classList.remove('is-valid');
        document.getElementById(id).classList.add('is-invalid');
        return false;
    }
    else{
        document.getElementById(id).classList.remove('is-invalid');
        document.getElementById(id).classList.add('is-valid');
        return true;
    }
}
function CompararClaveCliente(clave,confirmar,id){//cliente
    if(clave!= confirmar || clave==''){
        document.getElementById(id).classList.remove('is-valid');
        document.getElementById(id).classList.add('is-invalid');
            camposClienteRegistro[5].valido=false
        }


    else if (clave==confirmar){
        document.getElementById(id).classList.remove('is-invalid');
        document.getElementById(id).classList.add('is-valid');
            camposClienteRegistro[5].valido=true
        }

}

 </script>-->
 <?php

    if ($_POST!=null){
    	//obtengo los datos del archivo usuarios.php
		$contenidoArchivo=file_get_contents('usuarios.json');
		$usuarios=json_decode($contenidoArchivo,true);
		$usuarios[] = $_POST;

		$archivo= fopen('usuarios.json', 'w');
		fwrite($archivo, json_encode($usuarios));
		fclose($archivo);
    

}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta http-equiv="REFRESH" content="0.2;URL=Registrar-cliente.html">
</head>
<body>

</body>
</html>