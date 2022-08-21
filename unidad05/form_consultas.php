<?php 
    function generar_captcha() {
        $patron = "1234567890abcdefghijklmnopqrstuvwxyz/*%$&";
        $clave = "";
        $cant_caracteres = 5;

        for ($i=0; $i < $cant_caracteres ; $i++) { 
            $clave .= $patron[rand(0, strlen($patron)-1 )];
        };

        return $clave;
    }

    // echo generar_captcha();
    $_SESSION['captcha'] = generar_captcha();
?>

<p class='subtitulo'>Enviar consultas<p>
<form action="unidad05/cargar.php" method="POST" class="form_Divided">
    <div class=col_1>
        <p>Ingrese sus datos</p>
        <input type="text" name="nombre" placeholder="Nombre" required>
        <input type="text" name="apellido" placeholder="Apellido" required>
        <input type="email" name="correo" placeholder="Correo Electronico" required>
        <textarea name="consulta" placeholder="Consulta" required></textarea>
    </div>
    <div class=col_2>
        <p>Valide captcha</p>
        <img src="unidad05/imagen_captcha.php" width="100%">
        <input type="text" name="codigoCaptcha" placeholder="Ingrese captcha" required >
    </div>
    <input type="submit" value="Enviar">
</form>