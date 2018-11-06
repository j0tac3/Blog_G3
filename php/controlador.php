<?php
	$accion = $_POST['tipo'];
	//Iniciamos la sesion
	require_once "sesion.php";
	//Incluimos la clase de usuario
	require_once "obj/usuario.php";
	//Creamos la sesion
	$sesion = new Sesion();
	//Elegimos la accion dependiendo del tipo de formulario enviado
	switch ($accion) {
		//Si es un formulario de Identificacion de Usuario
		case 'selectUser':
			$usuario = new Usuario();
			$usuario->login();
			break;
		//Si es un formiario para Cracion de Usuario
		case 'insertUser':
			$usuario = new Usuario();
			$usuario->insert($usuario);
			header ('refresh: 3; http://localhost/Proyectos/Blog_G3/perfil.php');
			break;
		//Si es un formulario de Creacion de Entrada
		case 'insertEntrada':
			echo 'Creando nueva entrada';
			require_once ('obj/entrada.php');
			$entrada = new Entrada();
			$entrada->insertarEntrada();
			//Redireccionamos a otra pagina pasados unos segundos
            header ('refresh: 3; http://localhost/Proyectos/Blog_G3/index.php');
			break;
			//Si era un formulatio de Registro de nuevo Usuario
		case 'insertEntrada':
			echo 'Creando nuevo Usuario';
			break;

		default:
			
			break;
	}
	
?>