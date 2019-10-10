<?php 

    class Empresa{
        private $urlBanner;
        private $urlLogotipo;
        private $id;
        private $pais;
        private $direccion;
        private $latitud;
        private $longitud;
        private $facebook;
        private $whatsapp;
        private $twitter;
        private $instagram;
        private $redes;
        private $correo;
        private $clave;      
 

        public function __construct(
            $urlBanner,
            $urlLogotipo,
            $id,
            $pais,
            $direccion,
            $latitud,
            $longitud,
            $facebook,
            $whatsapp,
            $twitter,
            $instagram,
            $redes,
            $correo,
            $clave        
        ){
            $this->urlBanner = $urlBanner;
            $this->urlLogotipo = $urlLogotipo;
            $this->id = $id;
            $this->pais=$pais;
            $this->direccion = $direccion;
            $this->latitud = $latitud;
            $this->longitud = $longitud;
            $this->facebook=$facebook;
            $this->whatsapp=$whatsapp;
            $this->twitter=$twitter;
            $this->instagram=$instagram;
            $this->redes=$redes;
            $this->correo=$correo;
            $this->clave=$clave;          
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

        public function __toString(){
           return json_encode($this->getData());
        }

        public function createEmpresa($db,$id){

           /* $encontrado = false;
            $contenido = file_get_contents($rutaArchivo);
            $empresa = json_decode($contenido,true);
            for ($i=0; $i < sizeof($empresa); $i++) { 
                if($empresa[$i]['id']==$id){
                echo '<script>alert("ya existe)</script>';
                sleep(2);
                $encontrado=true;
            header("Location: RegistrarEmpresa.html");
                return;
            }

            }
           

            if ($encontrado==false) {

               $empresa[] = $this->getData();
                echo '<script>alert("Empresa agregada satisfactoriamente");</script>';
            $archivo = fopen($rutaArchivo,'w');
            fwrite($archivo, json_encode($empresa));


            echo json_encode($this->getData());
            }
            
            header("Location: RegistrarEmpresa.html");
        }*/
        $empresa = $this->getData();
        
        $result = $db->getReference('Empresas')
        ->push($empresa);

        if ($result->getKey() != null)
               // echo "<script>alert('hgh')</script>";
                return '{"mensaje":"Registro almacenado","key":"'.$result->getKey().'"}';
            else 
                return '{"mensaje":"Error al guardar el registro"}';
        }



        //Sirve Para Llamar un atributo o metodo de una clase sin instanciar
        public static function getEmpresas($db){
                $result = $db->getReference('Empresas')
                ->getSnapshot()
                ->getValue();

            return json_encode($result);
        }

        public static function getEmpresa($db,$id){
            $result = $db->getReference('Empresas')
                ->getChild($id)
                ->getValue();
   
            return json_encode($result);
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

        public function updateEmpresa($db,$id){
               $result= $db->getReference('Empresas')
             ->getChild($id)
             ->set($this->getData());
        }

        //Retorna un arreglo asociativo del a clase
        public function getData(){
             $result['urlBanner'] = $this->urlBanner;
             $result['urlLogotipo'] = $this->urlLogotipo;
             $result['id'] = $this->id;
             $result['pais'] = $this->pais;
             $result['direccion'] = $this->direccion;
             $result['latitud'] = $this->latitud;
             $result['longitud'] = $this->longitud;
             $result['facebook'] = $this->facebook;
             $result['whatsapp'] = $this->whatsapp;
             $result['twitter'] = $this->twitter;
             $result['instagram'] = $this->instagram;
             $result['RedesSociales'] = $this->redes;
             $result['correo'] = $this->correo;
             $result['clave'] = password_hash($this->clave,PASSWORD_DEFAULT);
             return $result;
        }

        public static function login($user,$password,$db){
            //echo $user.','.$password;
                $result = $db->getReference('Empresas')
                ->orderByChild('id')
                ->equalTo($user)
                ->getSnapshot()
                ->getValue();

                $key = array_key_first($result);
                $valido = password_verify($password, $result[$key]['clave']);
//cuando tenga señal ir al minuto 36:34 del login parte 1
            $respuesta["valido"]=$valido==1?true:false;
            if ($respuesta["valido"]){
                    
            $respuesta["clave"]=$key;
            $respuesta["id"]=$result[$key]["id"];
            $respuesta["token"]=bin2hex(openssl_random_pseudo_bytes(16));
            setcookie('clave',$respuesta["clave"],time()+(86400*30),"/");
            setcookie('id',$respuesta["id"],time()+(86400*30),"/");
            setcookie('token',$respuesta["token"],time()+(86400*30),"/");

                $db->getReference('clientes/'.$key.'/token')
            ->set($respuesta["token"]);

            }
            echo json_encode($respuesta);
            
            
        }
    }


?>