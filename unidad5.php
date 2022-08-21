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
		<h2>Consultas</h2>

		<?php
			switch (true) {
				case isset($_GET['reg_OK']):
					echo "<p class='validate'>Consulta enviada correctamente!</p>"; 
					include('unidad05/mostrar_consultas.php');
					break;

				case isset($_GET['reg_error']):
					echo "<p class='error'>No fue posible validar captcha, intente nuevamente</p>";
					include('unidad05/form_consultas.php'); 
					break;
				
				default:
					include('unidad05/form_consultas.php'); 
					break;
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