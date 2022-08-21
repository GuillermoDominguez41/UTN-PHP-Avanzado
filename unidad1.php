<?php session_start(); ?>
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
		<h2>Agenda de clases</h2>
		<p class='subtitulo'>Registrar una nueva unidad<p>
		<form action="unidad01/insertar_clases.php" method="POST" class="form_Defalut">
			<label for="unidad">Titulo de la unidad:</label>
            	<input type="text" name="unidad" id="unidad">
			<label for="fecha">Fecha:</label>
				<input type="date" name="fecha" id="fecha">
            <input type="submit" value="Cargar">
        </form>

        <?php 
            if(isset($_GET['reg_OK'])){
                echo "<h4 style='color:green'>¡Se ha cargadado la unidad en el sistema!</h4>";
				include ('unidad01/ver_clases.php');
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