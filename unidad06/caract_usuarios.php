<?php
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $fecha = $_POST['fecha'];

    include('usuarios.php');
    $usuario = new Usuario($nombre, $apellido, $fecha);
    $usuario->imprime_caracteristicas();
?>