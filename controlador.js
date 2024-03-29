var registros=[];
var localStorage=window.localStorage;
var claveAdmin=123;
var usuarioAdmin='danny15zavalalic@gmail.com';
var clienteValido=false;
var empresaValida=false;
var productoValido=false;
var sucursalValida=false;
var adminValido=false;
//posteriormente inluir los datos por defeto del administrador
var compraProductos = [];
//arreglos pra almacenamiento de los registros y compras

var CamposLogin = [
   {campo:'clave', valido:false},
   {campo:'usuario', valido:false}, 
];

var tiposAcceso=["Empresa", "Usuario", "Super Administrador"];

var camposNuevoCliente=[
    {campo:'correo-nuevo', valido:false},
    {campo:'ClaveCliente-nueva', valido:false},

];

var camposNuevoAdmin=[
    {campo:'primerNombreAdmin-nuevo', valido:false},
    {campo:'primeroApellidoAdmin-nuevo', valido:false},
    {campo:'pais', valido:false},
    {campo:'direccionAdmin-nuevo', valido:false},
    {campo:'correo-nuevo-admin', valido:false},
    {campo:'ClaveAdmin-nueva', valido:false},
    {campo:'ConfirmacionAdmin-nueva', valido:false},
]

var camposNuevoEmpresa=[
    {campo:'correo-nuevoEmpresa', valido:false},
    {campo:'ClaveEmpresaNueva', valido:false}, 
]

var CamposEmpresaRegistro=[
    {campo:'nombreEmpresa', valido:false},
    {campo:'pais', valido:false},
    {campo:'direccion', valido:false},
    {campo:'latitud', valido:false},
    {campo:'longitud', valido:false},
    {campo:'url-archivo', valido:false},
    {campo:'url-archivo2', valido:false},
    {campo:'correo',valido:false},
    {campo:'ClaveEmpresa',valido:false},
    
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

var camposProducto=[
     {campo:'CodigoProducto', valido: false},
    {campo:'NombreProducto', valido: false},
    {campo:'PrecioProducto', valido: false},
    {campo:'descripcionProducto', valido: false},
    {campo:'imagenProducto',valido:false}   
]

var camposPromocion=[
    {campo:'producto', valido: false},
    {campo:'descuento', valido: false},
    {campo:'precioProductoPromocion', valido: false},
    {campo:'precioOferta', valido: false},
    {campo:'sucursales',valido:false},
    {campo:'fechaInicio', valido: false},
    {campo:'fechaFinal',valido:false}  
];

var camposSucursal=[
    {campo:'nombreSucursal', valido: false},
    {campo:'latitudSucursal', valido: false},
    {campo:'longitudSucursal', valido: false},
]

var campoCompra=[
    {campo:'nTarjeta', valido:false}
]

//rellenar select de tipos de acceso en la seccion login
for(let i=0; i<tiposAcceso.length; i++){
     if($("#tipo").length)
    document.getElementById("tipo").innerHTML+=`<option value="${tiposAcceso[i]}">${tiposAcceso[i]}</option>`

}

//llamada desde el boton de registro de empresa
function validar(formularioEmpresa){
    RegistrarEmpresa();
    ValidarClave();
    validarCorreo('correo',formularioEmpresa);

}

function validarRegistroCliente(formulario){
    RegistrarCliente();
    ValidarClaveCliente();
    validarCorreoCliente('correoCliente',formulario);
   

   if (clienteValido==true) {
    return true}
   else 
    return false
}

//para el formulario de registro del cliente
function RegistrarCliente(){
    for(let i=0; i<camposClienteRegistro.length; i++)
         camposClienteRegistro[i].valido=validarCampos(camposClienteRegistro[i].campo);
    
}

//agregar al formData clientes
function dataForm_Archivos(formulario){
    var nuevoFormulario = new FormData();   
    $(formulario).find(':input').each(function() {
        var elemento= this;
        //Si recibe tipo archivo 'file'
        if(elemento.type === 'file'){
           if(elemento.value !== ''){
              for(var i=0; i< $('#'+elemento.id).prop("files").length; i++){
                  nuevoFormulario.append(elemento.name, $('#'+elemento.id).prop("files")[i]);
               }
            }              
         }
        else{
            nuevoFormulario.append('nombreCliente',$('#nombreCliente').val());
            nuevoFormulario.append('apellidoCliente',$('#apellidoCliente').val());
            nuevoFormulario.append('paisCliente',$('#paisCliente').val());
            nuevoFormulario.append('direccionCliente',$('#direccionCliente').val());
            nuevoFormulario.append('correoCliente',$('#correoCliente').val());
            nuevoFormulario.append('claveCliente',$('#claveCliente').val());
        }

     })

  return nuevoFormulario;
}


function validarCorreoCliente(id,formulario){//cliente
    let re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    let valido= re.test(document.getElementById(id).value);
    let correo=document.getElementById('correoCliente').value;
    if (valido==true){
        document.getElementById(id).classList.remove('is-invalid');
        document.getElementById(id).classList.add('is-valid');
         camposClienteRegistro[4].valido=true;
        for(let i=0; i<camposClienteRegistro.length; i++)
        if(!camposClienteRegistro[i].valido) return;
//seccion para agregar al localstorage la empresa, se ubica en esta funcion
    //porque es la ultima que ejecuta el boton ingresar empresa
            clienteValido=true;
var datosForm = dataForm_Archivos(formulario);
      // console.log(datosForm.get("clave"));
        //console.log(datosForm.get("foto"));
        console.log(datosForm);
$.ajax({
    cache:false,
    contentType: false,
    processData: false,
    data: datosForm,    
    dataType:'json',                     
    type: 'POST',
    url: 'procesarCliente.php',

    });
            //let parametros = $('#formularioAgregarCliente').serialize();
                //console.log('Información a enviar al servidor: ' + parametros );

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

//para el formuario de login
//Seccion de login
function registrarlogin(){ 

    for(let i=0; i<CamposLogin.length; i++)
         CamposLogin[i].valido=validarCampos(CamposLogin[i].campo);
    
    for(let i=0; i<CamposLogin.length; i++)
       if(!CamposLogin[i].valido==true) return;
  // return true


    let parametros = $('#formularioRegistro').serialize();
    console.log('Información a enviar al servidor: ' + parametros);
  //  console.log(parametros['Usuario']);
    
    $.ajax({
        url:'procesarLogin.php?accion=login',
        method:'POST',
        data:parametros,//La informacion que se envia al servidor, URLEncoded
        dataType:'json',
        success:function(res){
            console.log(res);
            if(res.valido){//
                if(res.correo){
                id=res.clave;
                window.location.href="promociones.php?id="+id+"";
                }
            else if (res.id){
                id=res.clave;
                window.location.href="dashboard.php?id="+id+""
            }
            else if (res.correoAdmin){
                id=res.clave;
                window.location.href="admin.php?id="+id+""
            }
                
                //llevar a promociones pero con sus datos
            }
           // anexarRegistroTabla(persona,res.key);
        },
        error:function(error){
           console.error(error);
        }
    
    });

}

function promociones(parametros){
    let json = parametros.serialize();
    console.log('Información a enviar al servidor: ' + parametros)
     $.ajax({
        url:'promociones',
        method:'POST',
        data:parametros,//La informacion que se envia al servidor, URLEncoded
        dataType:'json',
        success:function(res){
            console.log(res);
            if(res.valido){
                //llevar a promociones pero con sus datos
            }
           // anexarRegistroTabla(persona,res.key);
        },
        error:function(error){
            console.error(error);
        }
    
    });

}

/*Seccion de registro de empresa*/
function RegistrarEmpresa(){

    for(let i=0; i<CamposEmpresaRegistro.length; i++){
                 CamposEmpresaRegistro[i].valido=validarCampos(CamposEmpresaRegistro[i].campo);
        console.log(CamposEmpresaRegistro[i].valido)
    }
       

}
//comprar producto
validarAdminNuevo
function comprarProducto(){
     for(let i=0; i<campoCompra.length; i++)
         campoCompra[i].valido=validarCampos(campoCompra[i].campo);

 for(let i=0; i<campoCompra.length; i++)
        if(!campoCompra[i].valido) return;
     let compra=
        {   
            nTarjeta:document.getElementById('nTarjeta').value,
            }
    
    compraProductos.push(compra);
        alert('Gracias por su compra, se enviará un mensaje de confirmación a su correo electrónico');
console.log(compraProductos);
    }
//calificar producto

function calificarPoducto(id,id2){
    document.getElementById(id).innerHTML = '';
        let calificacion= document.getElementById(id2).value;
    for (let i=0; i<calificacion; i++){
        document.getElementById(id).innerHTML += `<i class="fas fa-star" style="color:yellow"></i>`
    }
    for(let i=0; i<(5-calificacion); i++){
        document.getElementById(id).innerHTML += `<i class="far fa-star" style="color: yellow;"></i>`
    }
        document.getElementById(id2).value='';
}

//para agregar productos
//form data para productos
function dataForm_ArchivosProductos(formulario){
    var nuevoFormulario = new FormData();   
    $(formulario).find(':input').each(function() {
        var elemento= this;
        //Si recibe tipo archivo 'file'
        if(elemento.type === 'file'){
           if(elemento.value !== ''){
              for(var i=0; i< $('#'+elemento.id).prop("files").length; i++){
                  nuevoFormulario.append(elemento.name, $('#'+elemento.id).prop("files")[i]);
               }
            }              
         }
        else{
            nuevoFormulario.append('empresa',$('#empresa').val());
            nuevoFormulario.append('CodigoProducto',$('#CodigoProducto').val());
            nuevoFormulario.append('NombreProducto',$('#NombreProducto').val());
            nuevoFormulario.append('PrecioProducto',$('#PrecioProducto').val());
            nuevoFormulario.append('descripcionProducto',$('#descripcionProducto').val());
        }

     })

  return nuevoFormulario;
}
function RegistrarProducto(){
     for(let i=0; i<camposProducto.length; i++)
         camposProducto[i].valido=validarCampos(camposProducto[i].campo);

    }

function agregarProducto(formulario){
RegistrarProducto();

 for(let i=0; i<camposProducto.length; i++)
        if(!camposProducto[i].valido) return false;
    productoValido=true;
    
 //let parametros = $('#formularioAgregarProductos').serialize();
   // console.log('Información a enviar al servidor: ' + parametros);
    var datosForm = dataForm_ArchivosProductos(formulario);
      // console.log(datosForm.get("clave"));
        console.log(datosForm.get('urlImagen'));
$.ajax({
    cache:false,
    contentType: false,
    processData: false,
    data: datosForm,    
    dataType:'json',                     
    type: 'POST',
    url: 'procesarProducto.php',

    });

}


//para agregar promociones 
function dataForm_ArchivosPromocion(formulario){
    var nuevoFormulario = new FormData();  
        var suc=[];
    $(":checkbox[name=sucursales]").each(function(){
        if(this.checked){
            suc.push($(this).val());
        }

    }); 

            nuevoFormulario.append('empresa',$('#empresa').val());
            nuevoFormulario.append('producto',$('#producto').val());           
            nuevoFormulario.append('descuento',$('#descuento').val());
            nuevoFormulario.append('precioProductoPromocion',$('#precioProductoPromocion').val());
            nuevoFormulario.append('precioOferta',$('#precioOferta').val());
            nuevoFormulario.append('fechaInicio',$('#fechaInicio').val());
            nuevoFormulario.append('fechaFinal',$('#fechaFinal').val());
            for(let i=0; i<suc.length; i++){
                nuevoFormulario.append('sucursales[]',suc[i]);   
            }
            


  return nuevoFormulario;
}

function agregarPromocion(formulario){
RegistrarPromocion();
for(let i=0; i<camposPromocion.length; i++)
        if(!camposPromocion[i].valido) return;

    var datosForm = dataForm_ArchivosPromocion(formulario);
    //console.log(datosForm.get('producto'))
    $.ajax({
    cache:false,
    contentType: false,
    processData: false,
    data: datosForm,    
    dataType:'json',                     
    type: 'POST',
    url: 'procesarPromocion.php',

    });
}

function RegistrarPromocion(){
     for(let i=0; i<camposPromocion.length; i++)
         camposPromocion[i].valido=validarCampos(camposPromocion[i].campo);
}

//para agregar sucursales 
function dataForm_ArchivosSucursal(formulario){
    var nuevoFormulario = new FormData();   
            nuevoFormulario.append('empresa',$('#empresa').val());
            nuevoFormulario.append('nombreSucursal',$('#nombreSucursal').val());
            nuevoFormulario.append('latitudSucursal',$('#latitudSucursal').val());
            nuevoFormulario.append('longitudSucursal',$('#longitudSucursal').val());


  return nuevoFormulario;
}
function agregarSucursal(formulario){
RegistrarSucursal();
for(let i=0; i<camposSucursal.length; i++)
        if(!camposSucursal[i].valido) return false;
        sucursalValida=true;
    
    var datosForm = dataForm_ArchivosSucursal(formulario);

    $.ajax({
    cache:false,
    contentType: false,
    processData: false,
    data: datosForm,    
    dataType:'json',                     
    type: 'POST',
    url: 'procesarSucursal.php',

    });
}

function RegistrarSucursal(){
     for(let i=0; i<camposSucursal.length; i++)
         camposSucursal[i].valido=validarCampos(camposSucursal[i].campo);
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

//atualizar correo cliente , empresa y admin en actualizar datos
function correo(id,indice,array){
    let re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    let valido= re.test(document.getElementById(id).value);

        if (valido==true){
        document.getElementById(id).classList.remove('is-invalid');
        document.getElementById(id).classList.add('is-valid');
        array[indice].valido=true;
        }

        else{
        document.getElementById(id).classList.remove('is-valid');
        document.getElementById(id).classList.add('is-invalid');
        array[indice].valido=false;
        return false; 
        }

}
    
function ValidarClaveNueva(id1,id2,indice,array){
    var ClaveNueva=document.getElementById(id1).value;
    var ConfirmacionNueva=document.getElementById(id2).value;

    CompararClaveNueva(ClaveNueva,ConfirmacionNueva,id1,indice,array);

}

function CompararClaveNueva(clave,confirmar,id,indice,array){

    if(clave!= confirmar || clave==''){
        document.getElementById(id).classList.remove('is-valid');
        document.getElementById(id).classList.add('is-invalid');
            array[indice].valido=false;
        }

    else if (clave==confirmar){
        document.getElementById(id).classList.remove('is-invalid');
        document.getElementById(id).classList.add('is-valid');
            array[indice].valido=true;
        }

}

//acualizar cliente
function dataForm_ActualizarCliente(formulario){
    var nuevoFormulario = new FormData();   
    $(formulario).find(':input').each(function() {
        var elemento= this;
        //Si recibe tipo archivo 'file'
        if(elemento.type === 'file'){
           if(elemento.value !== ''){
              for(var i=0; i< $('#'+elemento.id).prop("files").length; i++){
                  nuevoFormulario.append(elemento.name, $('#'+elemento.id).prop("files")[i]);
               }
            }              
         }
        else{
            nuevoFormulario.append('keyCliente',$('#keyCliente').val());            
            nuevoFormulario.append('nombreCliente',$('#primerNombre-nuevo').val());
            nuevoFormulario.append('apellidoCliente',$('#primeroApellido-nuevo').val());
            nuevoFormulario.append('paisCliente',$('#pais-nuevo').val());
            nuevoFormulario.append('direccionCliente',$('#direccion-nuevo').val());
            nuevoFormulario.append('correoCliente',$('#correo-nuevo-cliente').val());
            nuevoFormulario.append('claveCliente',$('#ClaveCliente-nueva').val());
        }

     })

  return nuevoFormulario;
}
function validarClienteNuevo(formularioCliente){
correo('correo-nuevo-cliente',0,camposNuevoCliente);
ValidarClaveNueva('ClaveCliente-nueva','ConfirmacionCliente-nueva',1,camposNuevoCliente);
        for(let i=0; i<camposNuevoCliente.length; i++)
        if(!camposNuevoCliente[i].valido) return;
     var datosForm = dataForm_ActualizarCliente(formularioCliente);
      // console.log(datosForm.get("correo"));
        //console.log(datosForm.get("keyCliente"));
        
$.ajax({
    cache:false,
    contentType: false,
    processData: false,
    data: datosForm,    
    dataType:'json',                     
    method: 'POST',
    url: 'procesarCliente.php',
    success: function(){
        console.log('bien');
    },
    error: function(){
        console.log('error');
    }

    });
    return true;
        
}

    //actualizar empresa
function dataForm_ActualizarEmpresa(formulario){
    var nuevoFormulario = new FormData();   
    $(formulario).find(':input').each(function() {
        var elemento= this;
        //Si recibe tipo archivo 'file'
        if(elemento.type === 'file'){
           if(elemento.value !== ''){
              for(var i=0; i< $('#'+elemento.id).prop("files").length; i++){
                  nuevoFormulario.append(elemento.name, $('#'+elemento.id).prop("files")[i]);
               }
            }              
         }
        else{
            nuevoFormulario.append('empresaKey',$('#empresaKey').val());            
            nuevoFormulario.append('nombreEmpresa',$('#nombreEmpresa-nuevo').val());
            nuevoFormulario.append('pais',$('#pais-nuevo').val());
            nuevoFormulario.append('direccion',$('#direccion-nuevo').val());
            nuevoFormulario.append('latitud',$('#latitud-nuevo').val());
            nuevoFormulario.append('longitud',$('#longitud-nuevo').val());
            nuevoFormulario.append('facebook',$('#facebook-nuevo').val());
            nuevoFormulario.append('whatsapp',$('#whatsapp-nuevo').val());
            nuevoFormulario.append('twitter',$('#twitter-nuevo').val());
            nuevoFormulario.append('instagram',$('#instagram-nuevo').val());
            nuevoFormulario.append('RedesSociales',$('#RedesSociales-nuevo').val());
            nuevoFormulario.append('correo',$('#correo-nuevoEmpresa').val());
            nuevoFormulario.append('ClaveEmpresa',$('#ClaveEmpresaNueva').val());
        }

     })

  return nuevoFormulario;
}

function validarEmpresaNuevo(formularioEmpresa){
correo('correo-nuevoEmpresa',0,camposNuevoEmpresa);
ValidarClaveNueva('ClaveEmpresaNueva','ConfirmacionEmpresaNueva',1,camposNuevoEmpresa);
        for(let i=0; i<camposNuevoEmpresa.length; i++)
        if(!camposNuevoEmpresa[i].valido) return;

     var datosForm = dataForm_ActualizarEmpresa(formularioEmpresa);
      // console.log(datosForm.get("correo"));
        //console.log(datosForm.get("foto"));
$.ajax({
    cache:false,
    contentType: false,
    processData: false,
    data: datosForm,    
    dataType:'json',                     
    method: 'POST',
    url: 'procesarEmpresa.php',
    success: function(){
        console.log('bien');
    },
    error: function(){
        console.log('error');
    }

    });
    return true;

}
 //actualizar administrador
function dataForm_ActualizarAdmin(formulario){
    var nuevoFormulario = new FormData();   

            nuevoFormulario.append('keyAdmin',$('#keyAdmin').val());            
            nuevoFormulario.append('primerNombreAdmin',$('#primerNombreAdmin-nuevo').val());
            nuevoFormulario.append('primeroApellidoAdmin',$('#primeroApellidoAdmin-nuevo').val());
            nuevoFormulario.append('pais',$('#pais').val());
            nuevoFormulario.append('direccionAdmin',$('#direccionAdmin-nuevo').val());
            nuevoFormulario.append('correo',$('#correo-nuevo-admin').val());
            nuevoFormulario.append('clave',$('#ClaveAdmin-nueva').val());

  

  return nuevoFormulario;
}
function validarAdminNuevo(formularioAdmin){
    for(let i=0; i<camposNuevoAdmin.length; i++)
         camposNuevoAdmin[i].valido=validarCampos(camposNuevoAdmin[i].campo);
correo('correo-nuevo-admin',0,camposNuevoAdmin);
ValidarClaveNueva('ClaveAdmin-nueva','ConfirmacionAdmin-nueva',1,camposNuevoAdmin);

    
    for(let i=0; i<camposNuevoAdmin.length; i++)
       if(!camposNuevoAdmin[i].valido) return false;
   adminValido=true;

var datosForm = dataForm_ActualizarAdmin(formularioAdmin);
      /*console.log(datosForm.get("primerNombreAdmin"));
        console.log(datosForm.get("keyAdmin"));
        console.log(datosForm.get("primeroApellidoAdmin"));
        console.log(datosForm.get("pais"));
        console.log(datosForm.get("direccionAdmin"));
        console.log(datosForm.get("correo"));
        console.log(datosForm.get("clave"));*/
        
        
$.ajax({
    cache:false,
    contentType: false,
    processData: false,
    data: datosForm,    
    dataType:'json',                     
    method: 'POST',
    url: 'procesarAdmin.php',
    success: function(){
        console.log('bien');
    },
    error: function(){
        console.log('error');
    }

    });
    return true
}

function dataForm_ArchivosEmpresa(formulario){
    var nuevoFormulario = new FormData();   
    $(formulario).find(':input').each(function() {
        var elemento= this;
        //Si recibe tipo archivo 'file'
        if(elemento.type === 'file'){
           if(elemento.value !== ''){
              for(var i=0; i< $('#'+elemento.id).prop("files").length; i++){
                  nuevoFormulario.append(elemento.name, $('#'+elemento.id).prop("files")[i]);
               }
            }              
         }
        else{
            nuevoFormulario.append('nombreEmpresa',$('#nombreEmpresa').val());
            nuevoFormulario.append('pais',$('#pais').val());
            nuevoFormulario.append('direccion',$('#direccion').val());
            nuevoFormulario.append('latitud',$('#latitud').val());
            nuevoFormulario.append('longitud',$('#longitud').val());
            nuevoFormulario.append('facebook',$('#facebook').val());
            nuevoFormulario.append('whatsapp',$('#whatsapp').val());
            nuevoFormulario.append('twitter',$('#twitter').val());
            nuevoFormulario.append('instagram',$('#instagram').val());
            nuevoFormulario.append('RedesSociales',$('#RedesSociales').val());
            nuevoFormulario.append('correo',$('#correo').val());
            nuevoFormulario.append('ClaveEmpresa',$('#ClaveEmpresa').val());
        }

     })

  return nuevoFormulario;
}

function validarCorreo(id,formularioEmpresa){//empresa
    let re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    let valido= re.test(document.getElementById(id).value);

    if (valido==true){
        document.getElementById(id).classList.remove('is-invalid');
        document.getElementById(id).classList.add('is-valid');
         CamposEmpresaRegistro[7].valido=true;
        for(let i=0; i<CamposEmpresaRegistro.length; i++)
        if(!CamposEmpresaRegistro[i].valido) return;
/*seccion para agregar al localstorage la empresa, se ubica en esta funcion
    porque es la ultima que ejecuta el boton ingresar empresa*/

        empresaValida=true;
var datosForm = dataForm_ArchivosEmpresa(formularioEmpresa);
      // console.log(datosForm.get("clave"));
        //console.log(datosForm.get("foto"));
$.ajax({
    cache:false,
    contentType: false,
    processData: false,
    data: datosForm,    
    dataType:'json',                     
    type: 'POST',
    url: 'procesarEmpresa.php',

    });
    console.log('yes')
    return true;
    }

    else{
        document.getElementById(id).classList.remove('is-valid');
        document.getElementById(id).classList.add('is-invalid');
        CamposEmpresaRegistro[8].valido=false;
        return false;        
    }
    
   
}

/*Seccion de empresas de empresa*/
function seccionEmpresa(empresa){
            
     /**if($("#banner").length){
         alert('ente');
    document.getElementById("banner").innerHTML+=`<div class="banner"><img class="bannerImagen" src="${empresa.banner}" alt="banner">
	<div class="logotipo" style="background-image:url('${empresa.logotipo}')"></div><h1 style="color:wheat;text-align: center">${empresa.nombreEmpresa}</h1>
		
	
    </div>`;
     }**/


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
            CamposEmpresaRegistro[8].valido=false;
        }


    else if (clave==confirmar){
        document.getElementById(id).classList.remove('is-invalid');
        document.getElementById(id).classList.add('is-valid');
            CamposEmpresaRegistro[8].valido=true;
        }

}
    //funciones de ver mas
     function VerEmpresaAsociada(){
         alert('Nombre de Empresa')
     }


//funcion utilizadas en registrar empresa
function initMap() {
 // Creamos un objeto mapa y especificamos el elemento DOM donde se va a mostrar.
 var map = new google.maps.Map(document.getElementById('mapa'), {
 center: {lat: parseFloat(document.getElementById('latitud').value), lng: parseFloat(document.getElementById('longitud').value)}, 
 scrollwheel: false,
 zoom: 8,
 zoomControl: true,
 rotateControl : false,
 mapTypeControl: true,
 streetViewControl: false,
 });
 // Creamos el marcador
 var marker = new google.maps.Marker({
 position: {lat: parseFloat(document.getElementById('latitud').value), lng: parseFloat(document.getElementById('longitud').value)},
 draggable: true
 });
 // Le asignamos el mapa a los marcadores.
 marker.setMap(map);
 // creamos el objeto geodecoder
 var geocoder = new google.maps.Geocoder();
// le asignamos una funcion al eventos dragend del marcado
 google.maps.event.addListener(marker, 'dragend', function() {
 geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
 if (status == google.maps.GeocoderStatus.OK) {
 var address=results[0]['formatted_address'];
 alert(address);
 }
 });
});
}

//ejecutar para mostrar perfil
function mostrarPerfil(){
//mostrarmapa();
    agregarAlPerfil();
}



//funcion de mapa para sucursales
function initialize() {
          var marcadores = [
            ['León', 42.603, -5.577],
            ['Salamanca', 40.963, -5.669],
            ['Zamora', 41.503, -5.744]
          ];
          var map = new google.maps.Map(document.getElementById('mapaSuc'), {
            zoom: 7,
            center: new google.maps.LatLng(41.503, -5.744),
            mapTypeId: google.maps.MapTypeId.ROADMAP
          });
          var infowindow = new google.maps.InfoWindow();
          var marker, i;
          for (i = 0; i < marcadores.length; i++) {  
            marker = new google.maps.Marker({
              position: new google.maps.LatLng(marcadores[i][1], marcadores[i][2]),
              map: map
            });
            google.maps.event.addListener(marker, 'click', (function(marker, i) {
              return function() {
                infowindow.setContent(marcadores[i][0]);
                infowindow.open(map, marker);
              }
            })(marker, i));
          }
        }
    
        //mapa para principal
function initialize2() {
          var marcadores = [
            ['Tegucigalpa', 14.1, -87.2167]
          ];
          var map = new google.maps.Map(document.getElementById('mapaPrincipal'), {
            zoom: 7,
            center: new google.maps.LatLng(14.1, -87.2167),
            mapTypeId: google.maps.MapTypeId.ROADMAP
          });
          var infowindow = new google.maps.InfoWindow();
          var marker, i;
          for (i = 0; i < marcadores.length; i++) {  
            marker = new google.maps.Marker({
              position: new google.maps.LatLng(marcadores[i][1], marcadores[i][2]),
              map: map
            });
            google.maps.event.addListener(marker, 'click', (function(marker, i) {
              return function() {
                infowindow.setContent(marcadores[i][0]);
                infowindow.open(map, marker);
              }
            })(marker, i));
          }
        }
    google.maps.event.addDomListener(window, 'load', initialize); //creo debo agregarlo a una funcion
   google.maps.event.addDomListener(window, 'load', initialize2);


