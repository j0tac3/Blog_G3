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
                mostrarMenu();
            ?>
            <section>
                <form id="login" action="php/controlador.php" method="POST">
                    <table>
                        <tr>
                            <td><label>Email:</label></td>
                            <td><input type="text" name="email" placeholder="Email de usuario"></td>
                        </tr>
                        <tr>
                            <td><label>Contrasena:</label></td>
                            <td><input type="password" name="password" placeholder="Contrasena de usuario"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" name="login" value="Enviar">
                                <!-- Enviamos el tipo de consulta -->
                                <input type="hidden" name="tipo" value="selectUser"></td>
                        </tr>
                    </table>
                </form>
            </section>
        <script src="js/eventos.js" type="text/javascript"></script>
    </body>
</html>