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
		<h2>Usuarios</h2>
		
		<p class='subtitulo'>Cargar usuario</p>
		<form action="unidad6.php?reg_OK" method="POST">
			<input type="text" name="nombre" placeholder="Nombre" required>
			<input type="text" name="apellido" placeholder="Apellido" required>
			<input type="date" name="fecha" placeholder="Fecha de nacimiento">
			<input type="submit" value="Enviar">
		</form>

		<?php 
			if(isset($_GET['reg_OK'])){
				include('unidad06/caract_usuarios.php');
			}
		?>
		
	</section>
	<aside>
    
  </aside>
	<footer>
		<a href="https://site.elearning-total.com/courses/?com=lb">Programación en PHP y MySQL - Nivel Avanzado</a>
	</footer>
 
</div>

	<script type="text/javascript">
		function popUp(URL) {
			window.open(URL, 'Nombre de la ventana', 'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=1,width=300,height=200,left = 390,top = 50');
		}
    </script>

</body>
</html>