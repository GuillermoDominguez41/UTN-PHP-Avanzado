<?php 
    header("Content-type: image/png"); // mas alla de que sea un archivo .php el navegador lo toma como imagen .png
    
    // Creamos nuestra imagen y la asignamos a una variable
    $img = imagecreate(150, 150);

    // Definimos los colores a utilizar
    $fondo = imagecolorallocate($img, 0, 0, 100);
    $texto = imagecolorallocate($img, 153, 204, 255);

    $t1 = "Texto prueba";
    imagestring($img, 5, 10, 20, $t1, $texto);

    imagepng($img);
    imagedestroy($img);

?>