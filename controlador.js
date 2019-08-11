var registros=[];
var localStorage=window.localStorage;
var CamposLogin =[
   {campo:'clave', valido:false},
   {campo:'usuario', valido:false},
  
];

var CamposEmpresaRegistro=[
    {campo:'nombreEmpresa', valido:false},
    {campo:'pais', valido:false},
    {campo:'direccion', valido:false},
    {campo:'latitud', valido:false},
    {campo:'longitud', valido:false},
    {campo:'url-archivo', valido:false},
    {campo:'url-archivo2', valido:false},
    {campo:'RedesSociales', valido:false},
    {campo:'correo',valido:false},
    {campo:'ClaveEmpresa',valido:false}
    
];

var camposClienteRegistro=[
    {campo:'nombreCliente', valido: false},
    {campo:'apellidoCliente', valido: false},
    {campo:'paisCliente', valido: false},
    {campo:'direccionCliente', valido: false},
    {campo:'correoCliente', valido: false},
    {campo:'claveCliente',valido:false}
] 
;

function validar(){//llamada desde el boton de registro de empresa
    RegistrarEmpresa();
    ValidarClave();
    validarCorreo('correo');
}

function validarRegistroCliente(){
    RegistrarCliente();
    ValidarClaveCliente();
    validarCorreoCliente('correoCliente')
}
//para el formulario de registro del cliente
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
              alert('primer if')
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
function registrarLogin(){ //para el formuario de login
/*Seccion de login*/
    for(let i=0; i<CamposLogin.length; i++)
         CamposLogin[i].valido=validarCampos(CamposLogin[i].campo);
    
    for(let i=0; i<CamposLogin.length; i++)
       if(!CamposLogin[i].valido==true) return;

    let empresa={
        clave:document.getElementById('clave').value,
        usuario:document.getElementById('usuario').value,
        tipo:document.getElementById('tipo').value,
    };
    registros.push(empresa);
        console.log(registros);
}
/*Seccion de registro de empresa*/
function RegistrarEmpresa(){

    for(let i=0; i<CamposEmpresaRegistro.length; i++){
                 CamposEmpresaRegistro[i].valido=validarCampos(CamposEmpresaRegistro[i].campo);
        console.log(CamposEmpresaRegistro[i].valido)
    }
       

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

function validarCorreo(id){//empresa
    let re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    let valido= re.test(document.getElementById(id).value);

    if (valido==true){
        document.getElementById(id).classList.remove('is-invalid');
        document.getElementById(id).classList.add('is-valid');
         CamposEmpresaRegistro[8].valido=true;
        for(let i=0; i<CamposEmpresaRegistro.length; i++)
        if(!CamposEmpresaRegistro[i].valido) return;
/*seccion para agregar al localstorage la empresa, se ubica en esta funcion
    porque es la ultima que ejecuta el boton ingresar empresa*/
     let empresa=
            {nombreEmpresa:document.getElementById('nombreEmpresa').value,
            pais:document.getElementById('pais').value,
            direccion:document.getElementById('direccion').value,
            latitud:document.getElementById('latitud').value,
            longitud:document.getElementById('longitud').value,
            banner:document.getElementById('url-archivo').value,
            logotipo:document.getElementById('url-archivo2').value,
            RedesSociales:document.getElementById('RedesSociales').value,
            correo:document.getElementById('correo').value,
            ClaveEmpresa:document.getElementById('ClaveEmpresa').value,
            ConfirmacionEmpresa:document.getElementById('ConfirmacionEmpresa').value
            }
        if(localStorage.length==0){
             localStorage.setItem(document.getElementById('nombreEmpresa').value,JSON.stringify(empresa));
             alert('Su empresa ha sido agregada satisfactoriamente');
              alert('primer if')
        }
        else{
        for(let i=0; i<localStorage.length;i++){
          if(localStorage.key(i)==document.getElementById('nombreEmpresa').value){
            alert('Ya existe una empresa con el mismo nombre'); return//no la agrega
          }
        }
    localStorage.setItem(document.getElementById('nombreEmpresa').value,JSON.stringify(empresa));
    alert('Su empresa ha sido agregada satisfactoriamente');
  }
    return true;
    }

    else{
        document.getElementById(id).classList.remove('is-valid');
        document.getElementById(id).classList.add('is-invalid');
        CamposEmpresaRegistro[8].valido=false;
        return false;        
    }
    
   
}

/*Seccion de registro de empresa y cliente*/

function ValidarClave(){//empresa
    var ClaveEmpresa=document.getElementById('ClaveEmpresa').value;
    var ConfirmacionEmpresa=document.getElementById('ConfirmacionEmpresa').value;

    CompararClave(ClaveEmpresa,ConfirmacionEmpresa,'ClaveEmpresa');

}

function CompararClave(clave,confirmar,id){//empresa
    if(clave!= confirmar || clave==''){
        document.getElementById(id).classList.remove('is-valid');
        document.getElementById(id).classList.add('is-invalid');
            CamposEmpresaRegistro[9].valido=false;
        }


    else if (clave==confirmar){
        document.getElementById(id).classList.remove('is-invalid');
        document.getElementById(id).classList.add('is-valid');
            CamposEmpresaRegistro[9].valido=true;
        }

}

