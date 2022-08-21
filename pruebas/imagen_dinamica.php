<?php 
    header("Content-type: image/jpeg"); // mas alla de que sea un archivo .php el navegador lo toma como imagen .jpeg
    
    // Creamos nuestra imagen y la asignamos a una variable
    $img = imagecreate(200, 200);

    // Definimos los colores a utilizar
    $fondo = imagecolorallocate($img, 0, 0, 200);
    $amarillo = imagecolorallocate($img, 255, 255, 0);
    $fondo_amarillo = imagecolorallocate($img, 255, 255, 105);

    // Generar rectangulo "solo perimetro"
    imagerectangle($img, 10, 10, 190, 190, $amarillo);

    //Generamos un rectangulo pero relleno.
    imagefilledrectangle($img, 20, 20, 180, 180, $fondo_amarillo);

    //Definimos el color de fondo de nuestra imagen
    imagefill($img, 0, 0, $fondo);
    
    imagejpeg($img);
    imagedestroy($img);

?>