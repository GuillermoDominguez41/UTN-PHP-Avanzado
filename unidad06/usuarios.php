<?php 
    class Usuario {
        private $nombre;
        private $apellido;
        private $fecha_Nac;
        private $edad;

        function __construct($nombre, $apellido, $nacimiento) {
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->fecha_Nac = $nacimiento;
            $this->edad = $this->calcular_edad();
        }    

        protected function calcular_edad() {
            date_default_timezone_set('America/Argentina/Buenos_Aires');
            $fActual = strtotime( date('Y-m-d') );
            $fNac = strtotime($this->fecha_Nac);
            $segInYears = (60 * 60 * 24 * 365);
            $diffYears= intval( ($fActual - $fNac) / $segInYears );

            return $diffYears;
        }




        public function imprime_caracteristicas() {
            echo "
            <p class='subtitulo'>Resumen de usuario ingresado</p>
            <table class='tabStyled'>
                <tr>
                    <td>Nombre</td>
                    <td>Apellido</td>
                    <td>Edad</td>
                </tr>
                <tr>
                    <td>$this->nombre</td>
                    <td>$this->apellido</td>
                    <td>$this->edad</td>
                </tr>
            </table>";
        }
    }
    
?>