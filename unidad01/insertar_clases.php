<?php 
    $unidad = $_POST['unidad'];
    $fecha = $_POST['fecha'];

    include('../conexion.php');

    mysqli_query($conex_DB, "INSERT INTO clases VALUES (DEFAULT, '$unidad', '$fecha') ");
    
    /*
    De esta forma redireccionaria como pide el enunciado, pero me parece mejor visualmente redireccionar
    al sitio unidad1, mostrar un mensaje al usuario y ademas mostrar el listado de registros.
    Disculpen!

    header("Location: ver_clases.php");

    */

    header("Location: ../unidad1.php?reg_OK");

?>