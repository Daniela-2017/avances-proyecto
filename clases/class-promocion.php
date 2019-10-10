<?php 

    class Promocion{
        private $empresa;
        private $producto;
        private $descuento;
        private $precioReal;
        private $precioOferta;
        private $fechaInicio;
        private $fechaFinal;
        private $sucursales;


        public function __construct(
            $empresa,
            $producto,
            $descuento,
            $precioReal,
            $precioOferta,
            $fechaInicio,
            $fechaFinal,
            $sucursales

        ){
            $this->empresa = $empresa;
            $this->producto = $producto;
            $this->descuento = $descuento;
            $this->precioReal = $precioReal;
            $this->precioOferta = $precioOferta;
            $this->fechaInicio = $fechaInicio;
            $this->fechaFinal = $fechaFinal;
            $this->sucursales = $sucursales;
            
            
        }
        public function producto(){
            return $this->producto;
        }

        public function setproducto($producto){
                $this->producto = $producto;
        }

        public function getdescuento(){
            return $this->descuento;
        }

        public function setdescuento($descuento){
                $this->descuento = $descuento;
        }

        

        public function getprecioReal(){
                return $this->precioReal;
        }
         
        public function setprecioReal($precioReal){
                $this->precioReal = $precioReal;
        }

        public function getprecioOferta(){
                return $this->precioOferta;
        }
         
        public function setprecioOferta($precioOferta){
                $this->precioOferta = $precioOferta;
        }



        public function __toString(){
           return json_encode($this->getData());
        }

        public function createPromocion($db,$id){

            $promocion = $this->getData();
            
            $result=$db->getReference('promociones')
            ->push($promocion);

        }


        //Sirve Para Llamar un atributo o metodo de una clase sin instanciar
        public static function getPromociones($db){
                $result = $db->getReference('promociones')
                ->getSnapshot()
                ->getValue();

            return json_encode($result);
        }

        public static function getPromocion($db,$id){
            $result = $db->getReference('sucursales')
                ->getChild($id)
                ->getValue();
   
            return json_encode($result);
        }

        public static function deletePromocion($rutaArchivo,$id){
             $contenido = file_get_contents($rutaArchivo);
             $sucursal = json_decode($contenido, true);
             array_splice($sucursal, $id,$id);
             $archivo = fopen($rutaArchivo, 'w');
             fwrite($archivo, json_encode($sucursal));
             fclose($archivo);
             echo '{"Mensaje":"Se Elimino el Elemento"'.$id.'}';
        }

        public function updatePromocion($rutaArchivo,$id){
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
            $result['producto']=$this->producto;
            $result['descuento'] = $this->descuento;
            $result['precioReal'] = $this->precioReal;
            $result['precioOferta'] = $this->precioOferta;
            $result['fechaInicio'] = $this->fechaInicio;
            $result['fechaFinal'] = $this->fechaFinal;
            $result['sucursales'] = $this->sucursales;


             return $result;
        }
    }


?>