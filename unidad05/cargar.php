<?php 
    session_start();

// Validacion captcha
    $captcha_almacenado = $_SESSION['captcha']; 
    $captcha_ingresado = $_POST['codigoCaptcha'];
    
    if($captcha_almacenado == $captcha_ingresado){
        carga_DB();
        header("Location: ../unidad5.php?reg_OK");
    } else{
        header("Location: ../unidad5.php?reg_error");
    }

// Carga en base de datos
    function carga_DB(){
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $correo = $_POST['correo'];
        $consulta = $_POST['consulta'];
    
        include('../conexion.php');
        mysqli_query($conex_DB, "INSERT INTO consultas VALUES (DEFAULT,'$nombre','$apellido','$correo','$consulta') ");
    }

?>