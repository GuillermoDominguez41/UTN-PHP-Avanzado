<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="estilos.css">
</head>
 
<body>
 
<div class="container">
	<header>
		<h1>Programación en PHP y MySQL - Nivel Avanzado</h1>
	<nav>
		<?php include("botonera.php"); ?>
	</nav>
	</header>
	<section>
		<h2>Comentarios</h2>

		<p class='subtitulo'>Contactese con nosotros<p>
		<!-- <form action="unidad03/comentarios.php" method="POST" class="form_Defalut"> -->
		<form action="javascript:popUp('unidad03/comentarios.php')" method="POST" class="form_Defalut"
		<label for="nombre">Nombre y apellido</label>
            	<input type="text" name="nombre" id="nombre" required>
			<label for="correo">Correo electronico</label>
				<input type="email" name="correo" id="correo" required>
			<label for="comentarios">Comentarios</label>
				<textarea name="comentarios" id="comentarios" required></textarea>
            <input type="submit" value="Cargar">
        </form>

		<p class='subtitulo'>Comentarios cargados<p>
		<?php
			$filePath = "unidad03/comentarios.txt";

			if( !file_exists($filePath)){
				echo "<h4>No hay comentarios cargados</h4>";
			} else{
				$file = fopen($filePath, "r");
				$tabla_encabezado =  "<table class='tabStyled'> <tr> <td> Fecha </td> <td> Nombre y Apellido </td> <td> Correo </td> <td> Comentarios </td> </tr>";
				$tabla_cierre = "</table>";
	
				echo $tabla_encabezado;
				fpassthru($file);
				echo $tabla_cierre;
			}

		?>


	</section>
	<aside>
    
  </aside>
	<footer>
		<a href="https://site.elearning-total.com/courses/?com=lb">Programación en PHP y MySQL - Nivel Avanzado</a>
	</footer>
 
</div>
</body>
</html>