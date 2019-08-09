var registros=[];
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
    {campo:'correo',valido:false}
];

var camposClienteRegistro=[
    {campo:'nombreCliente', valido: false},
    {campo:'apellidoCliente', valido: false},
    {campo:'paisCliente', valido: false},
    {campo:'direccionCliente', valido: false},
    {campo:'correoCliente', valido: false}
]
  
;

function validar(){
    RegistrarEmpresa();
    ValidarClave();
    validarCorreo('correo')
}

function validarRegistroCliente(){
    RegistrarCliente();
    ValidarClaveCliente();
    validarCorreo('correoCliente')
}
//para el formulario de registro del cliente
function RegistrarCliente(){
    for(let i=0; i<camposClienteRegistro.length; i++)
         camposClienteRegistro[i].valido=validarCampos(camposClienteRegistro[i].campo);
    
    for(let i=0; i<camposClienteRegistro.length; i++)
       if(!camposClienteRegistro[i].valido) return;
}

function ValidarClaveCliente(){
    let ClaveCliente=document.getElementById('claveCliente').value;
    let confirmacionCliente=document.getElementById('clave2Cliente').value;

    CompararClave(ClaveCliente,confirmacionCliente,'claveCliente');

}
function registrarLogin(){ //para el formuario de login
/*Seccion de login*/
    for(let i=0; i<CamposLogin.length; i++)
         CamposLogin[i].valido=validarCampos(CamposLogin[i].campo);
    
    for(let i=0; i<CamposLogin.length; i++)
       if(!CamposLogin[i].valido) return;

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

    for(let i=0; i<CamposEmpresaRegistro.length; i++)
       if(!CamposEmpresaRegistro[i].valido) return;


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

function validarCorreo(id){
    let re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    let valido= re.test(document.getElementById(id).value);

    if (valido==true){
        document.getElementById(id).classList.remove('is-invalid');
        document.getElementById(id).classList.add('is-valid');
        return true;
    }

    else{
        document.getElementById(id).classList.remove('is-valid');
        document.getElementById(id).classList.add('is-invalid');
        return false;        
    }
}

/*Seccion de registro de empresa*/

function ValidarClave(){
    var ClaveEmpresa=document.getElementById('ClaveEmpresa').value;
    var ConfirmacionEmpresa=document.getElementById('ConfirmacionEmpresa').value;

    CompararClave(ClaveEmpresa,ConfirmacionEmpresa,'ClaveEmpresa');

}

function CompararClave(clave,confirmar,id){
    if(clave!= confirmar || clave==''){
        document.getElementById(id).classList.remove('is-valid');
        document.getElementById(id).classList.add('is-invalid')}

    else if (clave==confirmar){
        document.getElementById(id).classList.remove('is-invalid');
        document.getElementById(id).classList.add('is-valid')}

}

