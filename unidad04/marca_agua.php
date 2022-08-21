<?php 
    $image = "img/fondo.jpg";
    $marca_agua = "img/marca.png";

    $img = imagecreatefrompng($marca_agua);
    $ext = strtolower(substr($image, -3));

    switch ($ext) {
        case 'gif':
            $img2 = imagecreatefromgif($image);
            break;
        
        case 'jpg':
            $img2 = imagecreatefromjpeg($image);
        break;

        case 'png':
            $img2 = imagecreatefrompng($image);
        break;

    }

    imagecopy($img2, $img, 80, 0, 0, 0, imagesx($img), imagesy($img));
    // https://www.php.net/manual/es/function.imagecopy.php

    header("Content-type: image/jpeg");
    imagejpeg($img2);
    imagedestroy($img);
    imagedestroy($img2);

?>