<?php 
    session_start();
    header("Content-type: image/jpeg");
    $img = imagecreate(70, 20);

    $color_fondo = imagecolorallocate($img, 102, 5, 176);
    $color_texto = imagecolorallocate($img, 255, 255, 255);

    $texto = $_SESSION['captcha'];
    imagestring($img, 4, 15, 1, $texto, $color_texto);
    imagejpeg($img);
?>