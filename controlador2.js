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
        else{;
            nuevoFormulario.append('otro',$('#otro').val());
        }

     })
       // console.log(nuevoFormulario.get('otro'))

  return nuevoFormulario;
}


function registrarDocumentacion(formulario){

var datosForm = dataForm_Archivos(formulario);
       console.log(datosForm.get("otro"));
        console.log(datosForm.get("arcAdjunto"));
$.ajax({
    cache:false,
    contentType: false,
    processData: false,
    data: datosForm,    
    dataType:'json',                     
    type: 'POST',
    url: 'procesar2.php',
    beforeSend:function(){

     }

    });

   // request.done(function(datos) { 
//console.log('hi')
   // });
 }