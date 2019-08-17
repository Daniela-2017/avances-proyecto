var registros=[];
var localStorage=window.localStorage;


//arreglos pra almacenamiento de los registros y compras
var arrayProductos=[

];

var arrayPromociones=[

];
var arraySucursales=[

];

var compraProductos=[

];

var CamposLogin = [
   {campo:'clave', valido:false},
   {campo:'usuario', valido:false}, 
];

var tiposAcceso=["Empresa", "Usuario", "Super Administrador"];

var camposNuevoCliente=[
    {campo:'correo-nuevo', valido:false},
    {campo:'ClaveCliente-nueva', valido:false},
];

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
    {campo:'sucursal',valido:false},
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

//para el formuario de login
function registrarLogin(){ 
/*Seccion de login*/
    for(let i=0; i<CamposLogin.length; i++)
         CamposLogin[i].valido=validarCampos(CamposLogin[i].campo);
    
    for(let i=0; i<CamposLogin.length; i++)
       if(!CamposLogin[i].valido==true) return;

        let clave=document.getElementById('clave').value;
        let usuario= document.getElementById('usuario').value;
        let  tipo =document.getElementById('tipo').value;

  //  registros.push(login);
    //    console.log(registros);
        //`${}`

if(tipo=='Empresa'){
    for(let i=0; i<localStorage.length;i++){
        let registro = JSON.parse(localStorage.getItem(localStorage.key(i)));
        var empresaEncontrada= false;
        
            if(registro.nombreEmpresa){
                if(usuario==registro.nombreEmpresa && clave==registro.ClaveEmpresa){
                    //seccionEmpresa(registro);
                    empresaEncontrada=true;
                    location.href="empresa.html";
                    
                    
                }

            }
        }
    if(empresaEncontrada==false) alert('Usuario o clave incorrecta');
    }

    //cliente
    else if(tipo=='Usuario'){
    for(let i=0; i<localStorage.length;i++){
        let registro = JSON.parse(localStorage.getItem(localStorage.key(i)));
        var clienteEncontrado=false;
        
            if(registro.nombreCliente){
                if(usuario==registro.correoCliente && clave==registro.claveCliente){
                    clienteEncontrado=true;
                   // location.href="empresa.html";
                    location.href="promociones.html";
                   return
                    
                    
                }

            }
        }
    if(clienteEncontrado==false) alert('Usuario o clave incorrecta');
    }

}

/*Seccion de registro de empresa*/
function RegistrarEmpresa(){

    for(let i=0; i<CamposEmpresaRegistro.length; i++){
                 CamposEmpresaRegistro[i].valido=validarCampos(CamposEmpresaRegistro[i].campo);
        console.log(CamposEmpresaRegistro[i].valido)
    }
       

}
//comprar producto
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

function calificarPoducto(){
    document.getElementById('estrellas').innerHTML = '';
        let calificacion= document.getElementById('calificar').value;
    for (let i=0; i<calificacion; i++){
        document.getElementById('estrellas').innerHTML += `<i class="fas fa-star" style="color:yellow"></i>`
    }
    for(let i=0; i<(5-calificacion); i++){
        document.getElementById('estrellas').innerHTML += `<i class="far fa-star" style="color: yellow;"></i>`
    }
        document.getElementById('calificar').value='';
}

//para agregar productos
function RegistrarProducto(){
     for(let i=0; i<camposProducto.length; i++)
         camposProducto[i].valido=validarCampos(camposProducto[i].campo);

    }

function agregarProducto(){
RegistrarProducto();

 for(let i=0; i<camposProducto.length; i++)
        if(!camposProducto[i].valido) return;
     let produto=
        {   CodigoProducto:document.getElementById('CodigoProducto').value,
            NombreProducto:document.getElementById('NombreProducto').value,
            PrecioProducto:document.getElementById('PrecioProducto').value,
            descripcionProducto:document.getElementById('descripcionProducto').value,
            imagenProducto:document.getElementById('imagenProducto').value,
            }
    
    arrayProductos.push(produto);
        alert('Producto agregado con éxito');
console.log(arrayProductos);
}


//para agregar promociones 
function agregarPromocion(){
RegistrarPromocion();
for(let i=0; i<camposPromocion.length; i++)
        if(!camposPromocion[i].valido) return;
     let promocion=
        {   producto:document.getElementById('producto').value,
            descuento:document.getElementById('descuento').value,
            precioProductoPromocion:document.getElementById('precioProductoPromocion').value,
            precioOferta:document.getElementById('precioOferta').value,
            fechaFinal:document.getElementById('fechaFinal').value,          
            sucursal:document.getElementById('sucursal').value,
            fechaInicio:document.getElementById('fechaInicio').value,
            fechaFinal:document.getElementById('fechaFinal').value,          
        }
    
    arrayPromociones.push(promocion);
    alert('Promoción agregara con éxito');
console.log(arrayPromociones);
}

function RegistrarPromocion(){
     for(let i=0; i<camposPromocion.length; i++)
         camposPromocion[i].valido=validarCampos(camposPromocion[i].campo);
}

//para agregar sucursales 
function agregarSucursal(){
RegistrarSucursal();
for(let i=0; i<camposSucursal.length; i++)
        if(!camposSucursal[i].valido) return;
     let sucursal=
        {   nombreSucursal:document.getElementById('nombreSucursal').value,
            latitudSucursal:document.getElementById('latitudSucursal').value,
            longitudSucursal:document.getElementById('longitudSucursal').value,
        }
    
    arraySucursales.push(sucursal);
    alert('Sucursal agregara con éxito');
console.log(arraySucursales);
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

//atualizar correo cliente y empresa
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
function validarClienteNuevo(){
correo('correo-nuevo-cliente',0,camposNuevoCliente);
ValidarClaveNueva('ClaveCliente-nueva','ConfirmacionCliente-nueva',1,camposNuevoCliente);
        for(let i=0; i<camposNuevoCliente.length; i++)
        if(!camposNuevoCliente[i].valido) return;

        alert('Ok');
}
    //actualizar empresa
function validarEmpresaNuevo(){
correo('correo-nuevo',0,camposNuevoEmpresa);
ValidarClaveNueva('ClaveEmpresaNueva','ConfirmacionEmpresaNueva',1,camposNuevoEmpresa);
        for(let i=0; i<camposNuevoEmpresa.length; i++)
        if(!camposNuevoEmpresa[i].valido) return;

        alert('Ok');
}

function validarCorreo(id){//empresa
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
     let empresa=
            {nombreEmpresa:document.getElementById('nombreEmpresa').value,
            pais:document.getElementById('pais').value,
            direccion:document.getElementById('direccion').value,
            latitud:document.getElementById('latitud').value,
            longitud:document.getElementById('longitud').value,
            banner:document.getElementById('url-archivo').value,
            logotipo:document.getElementById('url-archivo2').value,
            RedesSociales:{facebook:document.getElementById('facebook').value,
            whatsapp:document.getElementById('whatsapp').value,
            instagram:document.getElementById('instagram').value,
            twitter:document.getElementById('twitter').value,
            otras:document.getElementById('RedesSociales').value},

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
    mostrarmapa();
    agregarAlPerfil();
}
//funcion por ahora estatica para mostrar la ubicacion en el mapa
function mostrarmapa(){
    // Creamos un objeto mapa y especificamos el elemento DOM donde se va a mostrar.
 var map = new google.maps.Map(document.getElementById('mapaEnPerfil'), {
 center: {lat: 14.1, lng: -87.2167}, 
 scrollwheel: false,
 zoom: 8,
 zoomControl: true,
 rotateControl : false,
 mapTypeControl: true,
 streetViewControl: false,
 });
 // Creamos el marcador
 var marker = new google.maps.Marker({
 position: {lat: 14.1, lng: -87.2167},
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
    google.maps.event.addDomListener(window, 'load', initialize); //creo debo agregarlo a una funcion



function agregarAlPerfil(){
document.getElementById('perfil').innerHTML+=``;
    }