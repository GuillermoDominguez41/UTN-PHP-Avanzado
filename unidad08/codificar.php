<?php 
    $user = $_POST['email'];
    $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT, array('cost'=>4));

    include('../conexion.php');
    $respuesta = mysqli_query($conex_DB, "SELECT COUNT(*) FROM usuarios WHERE email='$user'")->fetch_assoc();

    if ($respuesta['COUNT(*)'] < 0) {
        header("Location: ../unidad8.php?Reg=Error");
    } else {
        mysqli_query($conex_DB, "INSERT INTO usuarios VALUES ('$user', '$pass')");
        header("Location: ../unidad8.php?Reg=Ok");
    }
?>