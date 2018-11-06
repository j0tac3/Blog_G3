<?php
	//Iniciamos la sesion
	require_once "php/sesion.php";
	//Incluimos la clase de usuario
	require_once "php/obj//usuario.php";
	//Creamos la sesion
	$sesion = new Sesion();
	$usuario = new Usuario();
	$usuario->logout();
     header ("Location:index.php");
?>