<?php 
    include('conexion.php');
    $datos_bd = mysqli_query( $conex_DB, "SELECT * FROM consultas");

        echo "
            <p class='subtitulo'>Listado de consultas<p>
            <table class='tabStyled'>
                <tr>
                    <td>ID</td>
                    <td>Nombre</td>
                    <td>Apellido</td>
                    <td>Correo Electronico</td>
                    <td>Consulta</td>
                </tr>";

        while ($item = mysqli_fetch_assoc($datos_bd)){
    ?>
            <tr>
                <td><?php echo $item['id_consulta']; ?></td>
                <td><?php echo $item['nombre']; ?></td>
                <td><?php echo $item['apellido']; ?></td>
                <td><?php echo $item['correo']; ?></td>
                <td><?php echo $item['consulta']; ?></td>
            </tr>
    <?php } ?>
        </table>