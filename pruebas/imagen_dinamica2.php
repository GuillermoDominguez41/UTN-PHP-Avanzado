<?php 
    header("Content-type: image/png"); // mas alla de que sea un archivo .php el navegador lo toma como imagen .png
    
    // Creamos nuestra imagen y la asignamos a una variable
    $img = imagecreate(200, 200);

    // Definimos los colores a utilizar
    $fondo = imagecolorallocate($img, 0, 200, 0);
    $negro = imagecolorallocate($img, 0, 0, 0);
    $rojo = imagecolorallocate($img, 255, 0, 0);
    $azul = imagecolorallocate($img, 0, 255, 0);

    //Generamos un arreglo para que almacene las coordenadas de los vortices del poligono
    $esquinas = array(20, 100, 100, 180, 180, 100, 100, 20);

    // Generamos un poligono
    imagepolygon($img, $esquinas, 4, $negro);

    imagearc($img, 100, 100, 80, 80, 0, 360, $rojo);
    imagearc($img, 100, 100, 80, 50, 0, 360, $azul);

    imagepng($img);
    imagedestroy($img);

?>