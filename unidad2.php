<php session_start() ?>
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
		<h2>Eventos</h2>
		<p class='subtitulo'>Calcular diferencia entre fecha ingresada y fecha actual<p>
		<form action="unidad02/calculo_fecha.php" method="POST" class="form_Defalut">
			<div>
				<label for="fDia">Ingrese un dia:</label>
            	<input type="number" min=0 max=31 name="fDia" id="fDia">
			</div>
			<div>
				<label for="fMes">Ingrese un mes:</label>
            	<input type="number" name="fMes" id="fMes" min=0 max=12 >
			</div>
			<div>
				<label for="fAnio">Ingrese un año:</label>
            	<input type="number" name="fAnio" id="fAnio" min=1970 >
			</div>
            <input type="submit" value="Calcular">
        </form>

		<?php 
			if(isset($_GET['dr'])){
				$dias = $_GET['dr'];
				echo "Dias entre fecha actual y fecha ingresada: $dias";
			};
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