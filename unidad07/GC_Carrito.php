<?php 
    class Carrito{
        private $bd;
        private $tabla = "compras";
        private $primaryKey = "codigo";

        function __construct($base){
            $this->bd = $base;
        }

    // Metodos solicitados en el enunciado
        public function agregarProducto($codigo, $producto, $descripcion, $precio ){
            $respuesta = $this->bd->loadQuery(
                "INSERT INTO $this->tabla VALUES($codigo,'$producto','$descripcion',$precio)"
            );
            return $respuesta;
        }

        public function listarProductos(){
            $respuesta = $this->bd->loadQuery("SELECT * FROM $this->tabla ORDER BY $this->primaryKey");
            return $respuesta;
        }

        public function quitarProducto($id){
            $respuesta = $this->bd->loadQuery(
                "DELETE FROM $this->tabla WHERE $this->primaryKey=$id"
            );
            return $respuesta;
        }

    // Otros metodos auxiliares
        public function seleccionarProducto($id){
            $respuesta = $this->bd->loadQuery(
                "SELECT * FROM $this->tabla WHERE $this->primaryKey=$id"
            );
            return $respuesta;
        }

        public function existeProducto($cod){
            $respuesta = $this->bd->loadQuery(
                "SELECT COUNT(*) FROM $this->tabla WHERE $this->primaryKey=$cod"
            );
            if ($respuesta[0]['COUNT(*)'] == 0) {
                return false;
            } else{
                return true;
            }
        }

        public function productosCargados(){
            $respuesta = $this->bd->loadQuery(
                "SELECT COUNT(*) FROM $this->tabla"
            );
            return $respuesta[0]['COUNT(*)'];
        }

        public function actualizarProducto($codigo, $producto, $descripcion, $precio ){
            $respuesta = $this->bd->loadQuery(
                "UPDATE $this->tabla SET 
                    producto='$producto',
                    descripcion='$descripcion',
                    precio=$precio
                    WHERE $this->primaryKey=$codigo
                ");
            return $respuesta;
        }
    }
?>