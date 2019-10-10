<?php 

    class Producto{
        private $urlImagen;
        private $Empresa;
        private $codigoProducto;
        private $nombreProducto;
        private $precio;
        private $descripcion;


        public function __construct(
            $urlImagen,
            $Empresa,
            $codigoProducto,
            $nombreProducto,
            $precio,
            $descripcion


        ){
            $this->urlImagen = $urlImagen;
            $this->Empresa = $Empresa;
            $this->codigoProducto = $codigoProducto;
            $this->nombreProducto = $nombreProducto;
            $this->precio = $precio;
            $this->descripcion = $descripcion;

        }
        public function getEmpresa(){
            return $this->Empresa;
        }

        public function setEmpresa($Empresa){
                $this->Empresa = $Empresa;
        }

        public function getcodigoProducto(){
            return $this->name;
        }

        public function setcodigoProducto($codigoProducto){
                $this->codigoProducto = $codigoProducto;
        }

        

        public function getnombreProducto(){
                return $this->nombreProducto;
        }
         
        public function setnombreProducto($nombreProducto){
                $this->nombreProducto = $nombreProducto;
        }

        public function getprecio(){
                return $this->precio;
        }
         
        public function setprecio($precio){
                $this->precio = $precio;
        }

        public function getdescripcion(){
                return $this->descripcion;
        }
         
        public function setdescripcion($descripcion){
                $this->descripcion = $descripcion;
        }

        public function geturlImagen(){
                return $this->urlImagen;
        }
         
        public function seturlImagen($urlImagen){
                $this->urlImagen = $urlImagen;
        }


        public function __toString(){
           return json_encode($this->getData());
        }



        public function createProducto($db,$id){

            /*$encontrado = false;
            $contenido = file_get_contents($rutaArchivo);
            $producto = json_decode($contenido,true);
            for ($i=0; $i < sizeof($producto); $i++) { 
                if($producto[$i]['codigoProducto']==$id){
                //echo '<script>alert("ya existe)</script>';
            echo "Ya existe un producto con el mismo codigo";
                //sleep(2);
                $encontrado=true;
            //header("Location: Registrar-cliente.html");
                return;
            }

            }
           

            if ($encontrado==false) {

               $producto[] = $this->getData();
                echo '<script>alert("Producto agregado satisfactoriamente");</script>';
            $archivo = fopen($rutaArchivo,'w');
            fwrite($archivo, json_encode($producto));


            echo json_encode($this->getData());
            }*/
        $producto = $this->getData();
        
        $result=$db->getReference('productos')
        ->push($producto);

        if($result->getKey() != null)
        echo '<script>alert("Producto agregado satisfactoriamente");</script>';
        }




        //Sirve Para Llamar un atributo o metodo de una clase sin instanciar
        public static function getProductos($db){
                $result = $db->getReference('productos')
                ->getSnapshot()
                ->getValue();

            return json_encode($result);
        }

        public static function getProducto($db,$id){
            $result = $db->getReference('productos')
                ->getChild($id)
                ->getValue();
   
            return json_encode($result);
        }

        public static function deleteProducto($rutaArchivo,$id){
             $contenido = file_get_contents($rutaArchivo);
             $sucursal = json_decode($contenido, true);
             array_splice($sucursal, $id,$id);
             $archivo = fopen($rutaArchivo, 'w');
             fwrite($archivo, json_encode($sucursal));
             fclose($archivo);
             echo '{"Mensaje":"Se Elimino el Elemento"'.$id.'}';
        }

        public function updateProducto($rutaArchivo,$id){
             $contenido = file_get_contents($rutaArchivo);
             $sucursal = json_decode($contenido,true);
             $sucursal[$id] = $this->getData();
     
             $archivo = fopen($rutaArchivo, 'w');
             fwrite($archivo,json_encode($sucursal));
             fclose($archivo);
             echo json_encode($this->getData());
        }

        //Retorna un arreglo asociativo del a clase
        public function getData(){
             $result['urlImagen'] = $this->urlImagen;
             $result['Empresa'] = $this->Empresa;
             $result['codigoProducto'] = $this->codigoProducto;
             $result['nombreProducto'] = $this->nombreProducto;
             $result['precio'] = $this->precio;
             $result['descripcion'] = $this->descripcion;

             return $result;
        }
    }


?>