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
            	<h1>ENTRADAS</h1>
            	<form id="nuevaEntrada" action="php/controlador.php" method="POST">
                    <fieldset>
                        <legend>Nueva Entrada</legend>
                        <table id="elementosForm">
                            <tr>
                                <td><label>Titulo:</label></td>
                                <td><input type="text" name="titulo"></td>
                            </tr>
                            <tr>
                                <td><label>Etiqueta:</label></td>
                                <td>
                                    <select name="etiqueta">
                                        <option value="CATEGORIA" selected>CATEGORIAS:</option>
                                        <option value="PERFIL">PERFIL</option>
                                        <option value="COMENTARIOS"> COMENTARIOS</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Ejercicio:</label></td>
                                <td><textarea rows="5" cols="30" name="enunciado"></textarea></td>
                            </tr>
                            <tr>
                                <td><label>Solucion:</label></td>
                                <td><textarea rows="5" cols="30" name="solucion"></textarea></td>
                                <td><input type="file" name="fichero" id="fichero"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input class="boton" type="submit" value="Publicar Entrada"><input type="reset" value="Limpiar">
                                <!-- Enviamos el tipo de consulta -->
                                <input type="hidden" name="tipo" value="insertEntrada"></td>
                            </tr>
                        </table>
                    </fieldset>
            	</form>
            </section>
            <footer>Grupo 3</footer>
        <script src="js/eventos.js" type="text/javascript"></script>
        </body>
    </html>
<?php
    }
    else{
         header ("Location:login.php");
    }
?>