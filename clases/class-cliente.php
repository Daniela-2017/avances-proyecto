<?php 

    class Usuario{
        private $nombre;
        private $apellido;
        private $pais;
        private $direccion;
        private $correo;
        private $clave;
        private $confirmacionClave;

        public function __construct(
            $nombre,
            $apellido,
            $pais,
            $direccion,
            $correo,
            $clave,
            $confirmacionClave
        ){
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->pais = $pais;
            $this->direccion = $direccion;
            $this->correo = $correo;
            $this->clave = $clave;
            $this->confirmacionClave=$confirmacionClave;
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

        public function createUser($rutaArchivo,$id){

            $encontrado = false;
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
            
            header("Location: Registrar-cliente.html");
        }


        //Sirve Para Llamar un atributo o metodo de una clase sin instanciar
        public static function getUsers($rutaArchivo){
            $contenido = file_get_contents($rutaArchivo);
            echo $contenido;
        }

        public static function getUser($rutaArchivo,$id){
            $contenido = file_get_contents($rutaArchivo);
            $usuarios = json_decode($contenido, true);
            if($id>(sizeof($usuarios)-1))
                echo '{"mensaje":"El Codigo no Existe"}';
            else
                echo json_encode($usuarios[$id]);
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

        public function updateUser($rutaArchivo,$id){
             $contenido = file_get_contents($rutaArchivo);
             $usuarios = json_decode($contenido,true);
             $usuarios[$id] = $this->getData();
     
             $archivo = fopen($rutaArchivo, 'w');
             fwrite($archivo,json_encode($usuarios));
             fclose($archivo);
             echo json_encode($this->getData());
        }

        //Retorna un arreglo asociativo del a clase
        public function getData(){
             $result['nombre'] = $this->nombre;
             $result['apellido'] = $this->apellido;
             $result['pais'] = $this->pais;
             $result['direccion'] = $this->direccion;
             $result['correo'] = $this->correo;
             $result['clave'] = $this->clave;
             $result['confirmacionClave'] = $this->confirmacionClave;
             return $result;
        }
    }


?>