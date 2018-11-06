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
				<?php 

					$name = "idEntrada";
				    $idEntrada = $_COOKIE[$name];

				    require_once 'php/bd/consultas.php';

				    $consulta = new Consulta();
					$resultado = $consulta->selectEntrada($idEntrada);

					?>
						<table id='tablaEntradas'>
							<thead>
								<th>Titulo</th><th>Texto</th><th>Fecha</th><th>ID Usuario</th>
							</thead>
					<?php
						while ($rows=$resultado->fetch()) {
							echo "<tr>";
						    echo "<td>$rows[1]</td><td>$rows[2]</td><td>$rows[3]</td><td>$rows[4]</td>";
						    
						    echo "</tr>";
				        }
				        $resultado = null;
				        $columnas = null;
				        $rows = null;
					?>
					</table>
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