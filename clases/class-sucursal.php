<?php 

    class Sucursal{
        private $empresa;
        private $nombreSucursal;
        private $latitudSuc;
        private $longitudSuc;


        public function __construct(
            $empresa,
            $nombreSucursal,
            $latitudSuc,
            $longitudSuc

        ){

            $this->empresa = $empresa;
            $this->nombreSucursal = $nombreSucursal;
            $this->latitudSuc = $latitudSuc;
            $this->longitudSuc = $longitudSuc;
        }
        public function getnombreSucursal(){
            return $this->nombreSucursal;
        }

        public function setnombreSucursal($nombreSucursal){
                $this->nombreSucursal = $nombreSucursal;
        }

        public function getlatitudSuc(){
            return $this->latitudSuc;
        }

        public function setlatitudSuc($latitudSuc){
                $this->latitudSuc = $latitudSuc;
        }

        

        public function getlongitudSuc(){
                return $this->longitudSuc;
        }
         
        public function setlongitudSuc($longitudSuc){
                $this->longitudSuc = $longitudSuc;
        }



        public function __toString(){
           return json_encode($this->getData());
        }

        public function createSucursal($db,$id){

            $sucursal = $this->getData();
            
            $result=$db->getReference('sucursales')
            ->push($sucursal);

            if($result->getKey() != null)
            echo '<script>alert("Producto agregado satisfactoriamente");</script>';
        }


        //Sirve Para Llamar un atributo o metodo de una clase sin instanciar
        public static function getSucursales($db){
                $result = $db->getReference('sucursales')
                ->getSnapshot()
                ->getValue();

            return json_encode($result);
        }

        public static function getSucursal($db,$id){
            $result = $db->getReference('sucursales')
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
            $result['empresa']=$this->empresa;
             $result['nombreSucursal'] = $this->nombreSucursal;
             $result['latitudSucursal'] = $this->latitudSuc;
             $result['longitudSucursal'] = $this->longitudSuc;

             return $result;
        }
    }


?>