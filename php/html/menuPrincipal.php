<?php
function mostrarMenu(){
	//Comprobamos si esta iniciada a Sesion del usuario
	if(isset($_SESSION['token'])){
		//Si esta iniciada...
		switch ($_SESSION['token']) {
			//En esl caso de que el token del usuario sea uno (admin)
			case 1:
			//Cargamos el  menu de Administrador
			echo '
				<nav>
					<ul class="menuPrincipal" id="menuPrincipal">
						<li class="principal" id="index">Inicio</li>
						<li class="principal" id="categorias">Categorias</li>
						<li class="principal" id="nuevaEntrada">Crear Entrada</li>
						<li class="principal" id="perfil">Perfil</li>
						<li class="principal" id="cerrarSesion">Cerrar Sesion</li>
					</ul>
				</nav>';
			break;
			//En el caso de que el token del usuario sea dos (usuario normal)
			case 2:
			//Cargamos el menu de Editor
			echo '
				<nav>
					<ul class="menuPrincipal" id="menuPrincipal">
						<li class="principal" id="index">Inicio</li>
						<li class="principal" id="categorias">Categorias</li>
						<li class="principal" id="perfil">Perfil</li>
						<li class="principal" id="nuevaEntrada">Crear Entrada</li>
						<li class="principal" id="cerrarSesion">Cerrar Sesion</li>
					</ul>
				</nav>';
			break;
			case 3:
			//Cargamos el menu de Usuario
			echo '
				<nav>
					<ul class="menuPrincipal" id="menuPrincipal">
						<li class="principal" id="index">Inicio</li>
						<li class="principal" id="categorias">Categorias</li>
						<li class="principal" id="perfil">Perfil</li>
						<li class="principal" id="cerrarSesion">Cerrar Sesion</li>
					</ul>
				</nav>';
			break;
		}
	}
	else{
		//Si no esta creada la Sesion de usuario
		//Cargamos el menu de Usuario Anonimo
		echo '
			<nav>
				<ul class="menuPrincipal" id="menuPrincipal">
					<li class="principal" id="index">Inicio</li>
					<li class="principal" id="categorias">Categorias</li>
					<li class="principal" id="login">Login</li>
				</ul>
			</nav>';
	}
	
}
?>