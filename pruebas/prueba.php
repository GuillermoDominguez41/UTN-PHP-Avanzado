<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/lightbox.css" rel="stylesheet" />
    <title>Prueba php</title>
</head>
<body>

    <h2>Formatos soportados</h2>
    <?php 
        if(imagetypes() & IMG_GIF){
            echo "<p>El tipo GIF es soportado</p>";
        } else{
            echo "<p>El formato GIF no es soportado</p>";
        }

        if(imagetypes() & IMG_PNG){
            echo "<p>El tipo PNG es soportado</p>";
        } else{
            echo "<p>El formato PNG no es soportado</p>";
        }

        if(imagetypes() & IMG_JPEG){
            echo "<p>El tipo JPEG es soportado</p>";
        } else{
            echo "<p>El formato JPEG no es soportado</p>";
        }
    ?>

    </br><h2>Marca de Agua</h2>
    <img src="marca_agua.php">

    </br><h2>Thumbnail</h2>
    <?php include('thumbnail.php'); ?>
    <img src="img/fondo_thumb.jpg"></br>
    <a href="img/fondo.jpg" data-lightbox="galeria_1" data-title="My caption">Image original</a>
    
    </br><h2>Imagen Dinamica 1 - Rectangulos</h2>
    <img src="imagen_dinamica.php">

    </br><h2>Imagen Dinamica 2 - Poligonos y circulos</h2>
    <img src="imagen_dinamica2.php">

    </br><h2>Imagen Dinamica 3 - Texto</h2>
    <img src="imagen_dinamica3.php">

    <!-- https://lokeshdhakar.com/projects/lightbox2/#getting-started -->
    <script type="text/javascript" src="../js/lightbox.js"></script>
    <script type="text/javascript" src="../js/lightbox-plus-jquery.js"></script>

</body>
</html>




