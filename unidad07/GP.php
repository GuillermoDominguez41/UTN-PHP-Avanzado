<?php 
    class gestionProductos{
        private $bd;
        private $tabla = "productos";
        private $primaryKey = "codigo";

        function __construct($base){
            $this->bd = $base;
        }

        public function agregarProducto($codigo, $producto, $descripcion, $categoria, $precio, $pathImg ){
            $respuesta = $this->bd->loadQuery(
                "INSERT INTO $this->tabla VALUES($codigo,'$producto','$descripcion','$categoria',$precio,'$pathImg')"
            );
            return $respuesta;
        }

        public function listarProductos(){
            $respuesta = $this->bd->loadQuery("SELECT * FROM $this->tabla ORDER BY $this->primaryKey");
            return $respuesta;
        }

        public function quitarProducto($cod){
            $respuesta = $this->bd->loadQuery(
                "DELETE FROM $this->tabla WHERE $this->primaryKey=$cod"
            );
            return $respuesta;
        }

        public function seleccionarProducto($cod){
            $respuesta = $this->bd->loadQuery(
                "SELECT * FROM $this->tabla WHERE $this->primaryKey=$cod"
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

        public function actualizarProducto($codigo, $producto, $descripcion, $categoria, $precio, $pathImg ){
            $respuesta = $this->bd->loadQuery(
                "UPDATE $this->tabla SET 
                    producto='$producto',
                    descripcion='$descripcion',
                    categoria='$categoria',
                    precio=$precio,
                    pathImg='$pathImg'
                    WHERE $this->primaryKey=$codigo
                ");
            return $respuesta;
        }
    }
?>