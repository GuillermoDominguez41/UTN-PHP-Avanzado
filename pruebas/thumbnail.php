<?php 
    $src_img = imagecreatefromjpeg("img/fondo.jpg");
    $alto = imagesy($src_img)/5;
    $ancho = imagesx($src_img)/5;
    $dst_img = imagecreatetruecolor($ancho, $alto);
    $imagen = imagecreate($ancho, $alto);

    imagecopyresized($dst_img, $src_img, 0, 0, 0, 0, $ancho, $alto, imagesx($src_img), imagesy($src_img));

    // Compilamos
    imagejpeg($dst_img, "img/fondo_thumb.jpg");
    
    imagedestroy($dst_img);

?>