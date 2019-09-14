<?php 

    class Empresa{
        private $id;
        private $direccion;
        private $latitud;
        private $longitud;
        private $urlBanner;
        private $urlLogotipo;
        private $facebook;
        private $whatsapp;
        private $twitter;
        private $instagram;
        private $redes;
        private $correo;
        private $clave;
        private $claveConfirmacion;        
 

        public function __construct(
            $id,
            $direccion,
            $latitud,
            $longitud,
            $urlBanner,
            $urlLogotipo,
            $facebook,
            $whatsapp,
            $twitter,
            $instagram,
            $redes,
            $correo,
            $clave,
            $claveConfirmacion,            
        ){
            $this->id = $id;
            $this->direccion = $direccion;
            $this->latitud = $latitud;
            $this->longitud = $longitud;
            $this->urlBanner = $urlBanner;
            $this->urlLogotipo = $urlLogotipo;
            $this->facebook=$facebook;
            $this->whatsapp=$whatsapp;
            $this->twitter=$twitter;
            $this->instagram=$instagram;
            $this->redes=$redes;
            $this->correo=$correo;
            $this->clave=$clave;
            $this->claveConfirmacion=$claveConfirmacion;            
        }

        public function getid(){
            return $this->id;
        }

        public function setid($id){
                $this->id = $id;
        }

        

        public function getdireccion(){
                return $this->direccion;
        }
         
        public function setdireccion($direccion){
                $this->direccion = $direccion;
        }

        public function getlatitud(){
                return $this->latitud;
        }
         
        public function setlatitud($latitud){
                $this->latitud = $latitud;
        }

        public function getlongitud(){
                return $this->longitud;
        }
         
        public function setlongitud($longitud){
                $this->longitud = $longitud;
        }

        public function geturlBanner(){
                return $this->urlBanner;
        }
         
        public function seturlBanner($urlBanner){
                $this->urlBanner = $urlBanner;
        }

        public function geturlLogotipo(){
                return $this->urlLogotipo;
        }
         
        public function seturlLogotipo($urlLogotipo){
                $this->urlLogotipo = $urlLogotipo;
        }

        public function getfacebook(){
                return $this->facebook;
        }
         
        public function setfacebook($facebook){
                $this->facebook = $facebook;
        }

                public function getwhatsapp(){
                return $this->whatsapp;
        }
         
        public function setwhatsapp($whatsapp){
                $this->whatsapp = $whatsapp;
        }

                public function getinstagram(){
                return $this->instagram;
        }
         
        public function setinstagram($instagram){
                $this->instagram = $instagram;
        }

                public function getredes(){
                return $this->redes;
        }
         
        public function setredes($redes){
                $this->redes = $redes;
        }





        public function getcorreo(){
                return $this->correo;
        }
         
        public function setcorreo($correo){
                $this->correo = $correo;
        }

        public function getclave(){
                return $this->clave;
        }
         
        public function setclave($clave){
                $this->clave = $clave;
        }

        public function getclaveConfirmacion(){
            return $this->$claveConfirmacion;
        }
        public function setclaveConfirmacion($claveConfirmacion){
            $this->$claveConfirmacion;
        }

        public function __toString(){
           return json_encode($this->getData());
        }

        public function createEmpresa($rutaArchivo,$id){

            $encontrado = false;
            $contenido = file_get_contents($rutaArchivo);
            $empresa = json_decode($contenido,true);
            for ($i=0; $i < sizeof($empresa); $i++) { 
                if($empresa[$i]['id']==$id){
                echo '<script>alert("ya existe)</script>';
                sleep(2);
                $encontrado=true;
            header("Location: Registrar-Empresa.html");
                return;
            }

            }
           

            if ($encontrado==false) {

               $empresa[] = $this->getData();
                echo '<script>alert("Cliente agregado satisfactoriamente");</script>';
            $archivo = fopen($rutaArchivo,'w');
            fwrite($archivo, json_encode($empresa));


            echo json_encode($this->getData());
            }
            
            header("Location: Registrar-cliente.html");
        }


        //Sirve Para Llamar un atributo o metodo de una clase sin instanciar
        public static function getUsers($rutaArchivo){
            $contenido = file_get_contents($rutaArchivo);
            echo $contenido;
        }

        public static function getUser($rutaArchivo,$id){
            $contenido = file_get_contents($rutaArchivo);
            $empresa = json_decode($contenido, true);
            if($id>(sizeof($empresa)-1))
                echo '{"mensaje":"El Codigo no Existe"}';
            else
                echo json_encode($empresa[$id]);
        }

        public static function deleteEmpresa($rutaArchivo,$id){
             $contenido = file_get_contents($rutaArchivo);
             $empresa = json_decode($contenido, true);
             array_splice($empresa, $id,$id);
             $archivo = fopen($rutaArchivo, 'w');
             fwrite($archivo, json_encode($empresa));
             fclose($archivo);
             echo '{"Mensaje":"Se Elimino el Elemento"'.$id.'}';
        }

        public function updateEmpresa($rutaArchivo,$id){
             $contenido = file_get_contents($rutaArchivo);
             $empresa = json_decode($contenido,true);
             $empresa[$id] = $this->getData();
     
             $archivo = fopen($rutaArchivo, 'w');
             fwrite($archivo,json_encode($empresa));
             fclose($archivo);
             echo json_encode($this->getData());
        }

        //Retorna un arreglo asociativo del a clase
        public function getData(){
             $result['id'] = $this->id;
             $result['direccion'] = $this->direccion;
             $result['latitud'] = $this->latitud;
             $result['longitud'] = $this->longitud;
             $result['urlBanner'] = $this->urlBanner;
             $result['urlLogotipo'] = $this->urlLogotipo;
             $result['facebook'] = $this->facebook;
             $result['whatsapp'] = $this->whatsapp;
             $result['twitter'] = $this->twitter;
             $result['instagram'] = $this->instagram;
             $result['redes'] = $this->redes;
             $result['correo'] = $this->correo;
             $result['clave'] = $this->clave;
             $result['claveConfirmacion'] = $this->claveConfirmacion;
             return $result;
        }
    }


?>