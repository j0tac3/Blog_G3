<?php
	//Iniciamos la sesion
	require_once "php/sesion.php";
	//Creamos la sesion
	$sesion = new Sesion();
    
    if(isset($_SESSION['token'])){
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
				mostrarMenu();
			?>
			<section>
				<h1><?php echo $_SESSION['nombre']; ?></h1>
				<div id="perfil">
					<div id="foto">
						<img src="img/Programacion.jpg"/>
					</div>
					<div id="datos">
						<b>Nombre:</b> <?php echo $_SESSION['nombre']; ?><br/>
						<b>Email:</b> <?php echo $_SESSION['email']; ?><br/>
						<b>Edad:</b> <?php 
						$date2 = date('Y-m-d');//

						$diff = abs(strtotime($date2) - strtotime($_SESSION['fechaNacimiento']));
						$edad = floor($diff / (365*60*60*24));

						 echo $edad;?> anios<br/>
						<b>Rol:</b> <?php if($_SESSION['token'] == 1){echo 'Administrador';}else if($_SESSION['token'] == 2){echo 'Editor';}else{ echo 'Usuario';} ?><br/>
					</div>
				</div>
				<div id="entradas">
					<?php if($_SESSION['token'] != 3){ ?>
					<h3>Mis entradas</h3>
					<?php 
						require_once 'php/bd/consultas.php';
						$consulta = new Consulta();
						$resultado = $consulta->selectEntradaUser($_SESSION['id_usuario']);
						//$columnas = $resultado->columnCount();
						$filas = $resultado->rowCount();
						if($filas > 0){
					?>
						<table id='tablaEntradas'>
							<thead>
								<th>Titulo</th><th>Fecha</th><th>Ir a ...</th><th>Eliminar Entrada</th>
							</thead>
					<?php
						while ($rows=$resultado->fetch()) {
							echo "<tr class='fila' id='fila$rows[0]'>";
						    echo "<td>$rows[1]</td><td>$rows[3]</td>";?>
						    <td class='boton'><button class='ver' id='<?php echo "$rows[0]"; ?>' type="button">Ver</button></td>
						    <td class='boton'><button  class='eliminar' id='<?php echo "$rows[0]"; ?>' type="button">Eliminar</button></td>
						    <?php
						    echo "</tr>";
				        }
				        $resultado = null;
				        $columnas = null;
				        $rows = null;
					?>
					</table>
				<?php }else{ echo '<p>Sin entradas publicadas</p>'; } }?>
				</div>
				<div id="comentarios">
					<h3>Mis comentarios</h3>
					<?php 
						require_once 'php/bd/consultas.php';
						$consulta = new Consulta();
						$resultado = $consulta->selectCometariosUser($_SESSION['id_usuario']);
						$columnas = $resultado->columnCount();
						$filas = $resultado->rowCount();
						if($filas > 0){
					?>
						<table>
							<thead>
								<th>ID de Comentario</th><th>Texto de Comentario</th><th>Fecha de Comentario</th><th>Id de Usuario</th>
								<th>Id de Entrada</th>
							</thead>
					<?php
						while ($rows=$resultado->fetch()) {
							echo "<tr>";
						    echo "<td>$rows[0]</td><td>$rows[1]</td><td>$rows[2]</td><td>$rows[3]</td><td>$rows[4]";
						    echo "</tr>";
				        }
					?>
					</table>
					<?php }else{ echo '<p>Sin comentarios publicados</p>'; } ?>
				</div>
			</section>
	    	<footer>Grupo 3</footer>
			<script src="js/eventos.js" type="text/javascript"></script>
		</div>
	</body>
</html>
<?php
    }
    else{
         header ("Location:login.php");
    }
?>