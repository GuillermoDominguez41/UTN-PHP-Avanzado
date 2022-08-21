<?php 
    include('conexion.php');
    $datos_bd = mysqli_query( $conex_DB, "SELECT * FROM clases");

        echo "
            <p class='subtitulo'>Listado de clases<p>
            <table class='tabStyled'>
                <tr>
                    <td>ID</td>
                    <td>Unidad</td>
                    <td>Fecha</td>
                </tr>";

        while ($item = mysqli_fetch_assoc($datos_bd)){
    ?>
            <tr>
                <td><?php echo $item['id_clase']; ?></td>
                <td><?php echo $item['unidad']; ?></td>
                <td><?php echo $item['fecha']; ?></td>
            </tr>
    <?php } ?>
        </table>