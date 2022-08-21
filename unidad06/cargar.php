<?php 
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $fecha = $_POST['fecha'];

    carga_DB($nombre, $apellido, $fecha);

// Carga en base de datos
    function carga_DB($nombre, $apellido, $fecha){    
        include('../conexion.php');
        mysqli_query($conex_DB, "INSERT INTO usuarios VALUES (DEFAULT,'$nombre','$apellido','$fecha') ");
    }
?>