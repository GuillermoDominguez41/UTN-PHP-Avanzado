<?php
    date_default_timezone_set('America/Argentina/Buenos_Aires');
    $ahora = date('d-m-Y H:i:s', time());

    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $comentarios = $_POST['comentarios'];

    $filePath = "comentarios.txt";
	$textoFinal = "<tr> <td> $ahora </td> <td> $nombre </td> <td> $correo </td> <td> $comentarios </td> </tr>"."\n";

    $fileOpen = fopen($filePath, "a+");
    fputs($fileOpen, $textoFinal);
    fclose($fileOpen);

    header("Location: ../unidad3.php");

?>