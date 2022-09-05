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
		<h2>Inicio de sesion</h2>
		<div class="btn_Acceso"><a href="unidad8.php?Reg"> Registrarse</a></div> 
		<div class="btn_Acceso"><a href="unidad8.php?Log">Ingresar</a></div> 


		<?php 
			if(isset($_GET['Reg'])){
				echo "
					<p class='subtitulo'>Registrarse<p>
					<form action='unidad08/codificar.php' method='POST' class='form_Defalut'>
						<input type='email' name='email' placeholder='Correo Electronico' required>
						<input type='text' name='pass' placeholder='Contraseña' required>
						<input type='submit' value='Registrar'>
					</form>
				";

				switch ($_GET['Reg']) {
					case 'Ok':
						echo "<p class='validate'>Se registro el usuario correctamente.</p>";
						break;
					case 'Error':
						echo "<p class='error'>No se pudo registrar, el usuario ya existe.</p>";
						break;
				}
			}

			if(isset($_GET['Log'])){
				echo "
					<p class='subtitulo'>Ingresar<p>
					<form action='unidad08/verificar.php' method='POST' class='form_Defalut'>
						<input type='email' name='email' placeholder='Correo Electronico' required>
						<input type='text' name='pass' placeholder='Contraseña' required>
						<input type='submit' value='Ingresar'>
					</form>
				";

				switch ($_GET['Log']) {
					case 'Ok':
						echo "<p class='validate'>Ha iniciado sesion correctamente.</p>";
						break;
						
					case 'ErrorUsr':
						echo "<p class='error'>No se pudo iniciar sesion, el correo ingresado no se encuentra registrado.</p>";
						break;

					case 'ErrorLog':
						echo "<p class='error'>No se pudo iniciar sesion, verifique correo y/o clave e intente nuevamente.</p>";
						break;
				}
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