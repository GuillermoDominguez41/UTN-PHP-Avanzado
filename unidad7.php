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
		<?php
			include('unidad07/conexion_BD.php');
			include('unidad07/conexion_Const.php');
			include('unidad07/GP.php');	

		 // Gestion de Productos
			if(isset($_GET['GP'])){
				echo "<h2>Gestion de Productos</h2>";	
				include('unidad07/GP_Menu.php');
			} else{
				echo "<h2>Compras</h2>";
				include('unidad07/GC_Carrito.php');		
				include('unidad07/GC_Menu.php');
			}
		?>

	</section>
	<aside>
		<nav class="barra_lateral">
			<p>Accesos Rapidos</p>
			<ul>
				<li><a href="unidad7.php?GP=listProd">Gestion de Productos</a></li>
				<li><a href="unidad7.php?GC=listProd">Comprar Productos</a></li>
			</ul>
		</nav>
  	</aside>
	<footer>
		<a href="https://site.elearning-total.com/courses/?com=lb">Programación en PHP y MySQL - Nivel Avanzado</a>
	</footer>
 
</div>
</body>
</html>