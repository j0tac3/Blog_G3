<?php
	class Sesion{
		//Constructor de la sesion
		function __construct(){
			//Iniciamos la sesion
			session_start();
		}
		//Funcion para recoger el valor de una variable de sesion
		//Le pasamos el nonbre de la variable 
		public function getVariable($variable){
			//Comprobamos si existe la variable de sesion
			if (isset ($_SESSION[$variable])){
				//Si existe la variable la retornamos
				return $_SESSION[$variable];
			}
			//Si no existe retornamos el valor nulo
			return null;
		}
		//Funcion para crear una variable de sesion
		//Le pasamos el nombre de la variable y el valor a asignar
		public function setVariable($variable, $valor){
			if (isset($_SESSION[$variable])){
				$_SESSION[$variable] = $valor;
			}
		}
		//Funcion para dstruir la sesion
		public function terminarSesion(){
			session_start();
			$_SESSION = array();
			session_regenerate_id(TRUE);
			session_destroy();
		}
	}
?>