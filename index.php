<?php
	//Iniciamos la sesion
	require_once "php/sesion.php";
	//Creamos la sesion
	$sesion = new Sesion();
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>Blog Grupo 3</title>
		<link rel="stylesheet" type="text/css" href="css/estiloBlog.css">
	</head>
	<body>
		<div id="cabecera">
			<header>
				<h1>Blog Grupo 3</h1>
			</header>
		</div>
		<?php 
			require_once 'php/html/menuPrincipal.php';	
			//mostrarMenu();
		?>
		<div id='cuerpo'>
		<section>
			<article class="entrada">
				<img src="img/img1.jpg" alt="">
				<div class="contenido">
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
				</div>
			</article>
			<article class="entrada">
				<img src="img/img2.png" alt="">
				<div class="contenido">
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
				</div>
			</article>
			<article class="entrada">
				<img src="img/img1.jpg" alt="">
				<div class="contenido">
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
				</div>
			</article>
		</section>
		<aside>
			<?php
				if($_SESSION){
					mostrarMenu();
				}
				else{
			?>
			<div class="login-html">
				<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Login</label>
				<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Registro</label>
				<div class="login-form">
					<div class="sign-in-htm">
						<form action="php/controlador.php" method="POST">
							<div class="group">
								<label for="user" class="label">Nick</label>
								<input id="user" name='email' type="text" class="input">
							</div>
							<div class="group">
								<label for="pass" class="label">Contraseña</label>
								<input id="pass" name='password' type="password" class="input" data-type="password">
							</div>
							<div class="group">
								<input id="check" type="checkbox" class="check" checked>
								<label for="check"><span class="icon"></span> Recuerdame</label>
							</div>
							<div class="group">
								<input type="hidden" name="tipo" value="selectUser">
								<input type="submit" class="button" value="Entrar">
							</div>
							<div class="foot-lnk">
								<a href="?section=3">¿Olvido la contraseña?</a>
							</div>
						</form>
					</div>
					<div class="sign-up-htm">
						<form action="php/controlador.php" method="POST">
							<div class="group">
								<label for="user" class="label">Nick</label>
								<input id="user" name='user' type="text" class="input">
							</div>
							<div class="group">
								<label for="pass" class="label">Contraseña</label>
								<input id="pass" name='pass' type="password" class="input" data-type="password">
							</div>
							<div class="group">
								<label for="fecnaci" class="label">Fecha Nacimiento</label>
								<input id="fecnaci" name='fecnaci' type="date" class="input" data-type="date">
							</div>
							<div class="group">
								<label for="email" class="label">Email Address</label>
								<input id="email" name='email' type="text" class="input">
							</div>

							<div class="group">
								<input type="hidden" name="token" value="3">
								<input type="hidden" name="tipo" value="insertUser">
								<input type="submit" class="button" value="Registrarse">
							</div>
						</form>
					</div>
				</div>
			</div><?php } ?>
		</aside>
	</div>
		<footer><p> &copy; Copyright 2018, Grupo 3 - Jóse , Arkaitz y Álvaro</p></footer>
	<script src="js/eventos.js" type="text/javascript"></script>
	</body>
</html>