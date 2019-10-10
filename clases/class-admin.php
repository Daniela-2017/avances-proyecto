<?php 

    class Administrador{
        private $nombre;
        private $apellido;
        private $pais;
        private $direccion;
        private $correo;
        private $clave;
       // private $confirmacionClave;

        public function __construct(
            $nombre,
            $apellido,
            $pais,
            $direccion,
            $correo,
            $clave
            //$confirmacionClave
        ){
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->pais = $pais;
            $this->direccion = $direccion;
            $this->correo = $correo;
            $this->clave = $clave;
            //$this->confirmacionClave=$confirmacionClave;
        }

        public function getnombre(){
            return $this->name;
        }

        public function setnombre($name){
                $this->name = $name;
        }

        

        public function getapellido(){
                return $this->apellido;
        }
         
        public function setapellido($apellido){
                $this->apellido = $apellido;
        }

        public function getpais(){
                return $this->pais;
        }
         
        public function setpais($pais){
                $this->pais = $pais;
        }

        public function getdireccion(){
                return $this->direccion;
        }
         
        public function setdireccion($direccion){
                $this->direccion = $direccion;
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

        public function getconfirmacionClave(){
            return $this->$confirmacionClave;
        }
        public function setconfirmacionClave($confirmacionClave){
            $this->$confirmacionClave;
        }

        public function __toString(){
           return json_encode($this->getData());
        }
        public static function getAdmin($db,$id){
            $result = $db->getReference('Administrador')
                ->getChild($id)
                ->getValue();
   
            return json_encode($result);
        }

        public function updateAdmin($db,$id){
               $result= $db->getReference('Administrador')
             ->getChild($id)
             ->set($this->getData());
        }


        //Retorna un arreglo asociativo del a clase
        public function getData(){
             $result['nombre'] = $this->nombre;
             $result['apellido'] = $this->apellido;
             $result['pais'] = $this->pais;
             $result['direccion'] = $this->direccion;
             $result['correoAdmin'] = $this->correo;
             $result['clave'] = password_hash($this->clave,PASSWORD_DEFAULT);
            // $result['confirmacionClave'] = $this->confirmacionClave;
             return $result;
        }


        public static function login($user,$password,$db){
            
           // echo '{"mensaje":"Informacion:'.$user.','.$password.'"}';
                $result = $db->getReference('Administrador')
                ->orderByChild('correoAdmin')
                ->equalTo($user)
                ->getSnapshot()
                ->getValue();

                $key = array_key_first($result);
                $valido = password_verify($password, $result[$key]['clave']);

            $respuesta["valido"]=$valido==1?true:false;
            if ($respuesta["valido"]){
            //header('Location:/proyecto1/promociones.php');
            $respuesta["clave"]=$key;
            $respuesta["correoAdmin"]=$result[$key]["correoAdmin"];
            $respuesta["token"]=bin2hex(openssl_random_pseudo_bytes(16));
            setcookie('clave',$respuesta["clave"],time()+(86400*30),"/");
            setcookie('correoAdmin',$respuesta["correoAdmin"],time()+(86400*30),"/");
            setcookie('token',$respuesta["token"],time()+(86400*30),"/");
        
            $db->getReference('Administrador/'.$key.'/token')
            ->set($respuesta["token"]);

            echo json_encode($respuesta);
            }
            else 
            echo json_encode($respuesta);
        }

    }


?>