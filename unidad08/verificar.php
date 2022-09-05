<?php 
    $user = $_POST['email'];
    $pass = $_POST['pass'];
    include('../conexion.php');
    $respuesta = mysqli_query($conex_DB, "SELECT COUNT(*) FROM usuarios WHERE email='$user'")->fetch_assoc();

    print_r("Cantidad: ".$respuesta['COUNT(*)']."</br>");

    if ($respuesta['COUNT(*)'] < 1) {
        header("Location: ../unidad8.php?Log=ErrorUsr");
    } else {
        $consulta = mysqli_query($conex_DB, "SELECT pass FROM usuarios WHERE email='$user'")->fetch_assoc();
        $verificacion = password_verify($pass, $consulta['pass']);

        if($verificacion){
            header("Location: ../unidad8.php?Log=Ok");
        }else{
            header("Location: ../unidad8.php?Log=ErrorLog");
        }

        print_r("Ingresado:".$pass."</br> En base:".$consulta['pass']."</br>");

    }
?>