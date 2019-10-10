<?php 

    class Usuario{
        private $foto;
        private $nombre;
        private $apellido;
        private $pais;
        private $direccion;
        private $correo;
        private $clave;
       
      //  private $confirmacionClave;
        

        public function __construct(
            $foto,
            $nombre,
            $apellido,
            $pais,
            $direccion,
            $correo,
            $clave
        
           // $confirmacionClave
        
        ){
            $this->foto = $foto;
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->pais = $pais;
            $this->direccion = $direccion;
            $this->correo = $correo;
            $this->clave = $clave;
           

           // $this->confirmacionClave=$confirmacionClave;
            
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

        /*public function getconfirmacionClave(){
            return $this->$confirmacionClave;
        }
        public function setconfirmacionClave($confirmacionClave){
            $this->$confirmacionClave;
        }
*/
        public function __toString(){
           return json_encode($this->getData());
        }

        public function createUser($db,$id){

            /*$encontrado = false;
            $contenido = file_get_contents($rutaArchivo);
            $usuarios = json_decode($contenido,true);
            for ($i=0; $i < sizeof($usuarios); $i++) { 
                if($usuarios[$i]['correo']==$id){
                echo '<script>alert("ya existe)</script>';
                sleep(2);
                $encontrado=true;
            header("Location: Registrar-cliente.html");
                return;
            }

            }
           

            if ($encontrado==false) {

               $usuarios[] = $this->getData();
                echo '<script>alert("Cliente agregado satisfactoriamente");</script>';
            $archivo = fopen($rutaArchivo,'w');
            fwrite($archivo, json_encode($usuarios));


            echo json_encode($this->getData());
            }
            
            header("Location: Registrar-cliente.html");*/
        $cliente = $this->getData();
        
        $result=$db->getReference('clientes')
        ->push($cliente);
//agregar alert de agregado satisfactoriamente



       // if($result->getKey() != null)
        //echo '<script>alert("Cliente agregado satisfactoriamente");</script>';
        }

        


        //Sirve Para Llamar un atributo o metodo de una clase sin instanciar
        public static function getUsers($db){
                $result = $db->getReference('clientes')
                ->getSnapshot()
                ->getValue();

            return json_encode($result);
        }

        public static function getUser($db,$id){
            $result = $db->getReference('clientes')
                ->getChild($id)
                ->getValue();
   
            return json_encode($result);
        }

        public static function deleteUser($rutaArchivo,$id){
             $contenido = file_get_contents($rutaArchivo);
             $usuarios = json_decode($contenido, true);
             array_splice($usuarios, $id,$id);
             $archivo = fopen($rutaArchivo, 'w');
             fwrite($archivo, json_encode($usuarios));
             fclose($archivo);
             echo '{"Mensaje":"Se Elimino el Elemento"'.$id.'}';
        }

        public function updateUser($db,$id){
             $result=$db->getReference('clientes')
             ->getChild($id)
             ->set($this->getData());

        }

        //Retorna un arreglo asociativo del a clase
        public function getData(){
            $result['foto']=$this->foto;
             $result['nombre'] = $this->nombre;
             $result['apellido'] = $this->apellido;
             $result['pais'] = $this->pais;
             $result['direccion'] = $this->direccion;
             $result['correo'] = $this->correo;
             $result['clave'] = password_hash($this->clave,PASSWORD_DEFAULT);

            // $result['confirmacionClave'] = $this->confirmacionClave;
             return $result;
        }

        public static function login($user,$password,$db){
            
           // echo '{"mensaje":"Informacion:'.$user.','.$password.'"}';
                $result = $db->getReference('clientes')
                ->orderByChild('correo')
                ->equalTo($user)
                ->getSnapshot()
                ->getValue();

                $key = array_key_first($result);
                $valido = password_verify($password, $result[$key]['clave']);
                // echo '{"valido":"'.$valido.'"}';
                
//cuando tenga señal ir al minuto 36:34 del login parte 1
            $respuesta["valido"]=$valido==1?true:false;
            if ($respuesta["valido"]){
            //header('Location:/proyecto1/promociones.php');
            $respuesta["clave"]=$key;
            $respuesta["correo"]=$result[$key]["correo"];
            $respuesta["token"]=bin2hex(openssl_random_pseudo_bytes(16));
            setcookie('clave',$respuesta["clave"],time()+(86400*30),"/");
            setcookie('correo',$respuesta["correo"],time()+(86400*30),"/");
            setcookie('token',$respuesta["token"],time()+(86400*30),"/");
        
            $db->getReference('clientes/'.$key.'/token')
            ->set($respuesta["token"]);
            
            //header('Location:/proyecto1/promociones.php');
            //PROBAR-----------------------------------------------
            //enviar $result[key]
            ///proyecto1/promociones.php
            //header('Location:class-sucursal.php');
            echo json_encode($respuesta);
           // ?infor=$key
//return $key;
            }
            else 
            echo json_encode($respuesta);
        }

        public static function verificarAutenticacion($db){
            if(!isset($_COOKIE['key']))
            return false;
            $result=$db->getReference('clientes')
            ->getChild($_COOKIE['key'])
            ->getValue();

            if($result["token"]==$_COOKIE["token"])
                return true;

            else 
                return false;
        }


         
    }


?>