<?php
    session_start();

    $nombreUsuario=$_SESSION['nombreUsuario'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog 3</title>
    <link href="css/estilo.css" rel="stylesheet" type="text/css">

</head>
<body>
    <header>
        <h1>Blog Grupo 3</h1>
    </header>

    <nav>
        <ul id="principal">
            <li><a href="">Inicio</a></li>
            <li><a href="">Categorias</a></li>
            <li><a href="usuario.html">Perfil</a></li>
        </ul>
    </nav>
    <!--<div id="centro">-->
        <section>
            <?php
            if (!isset($nombreUsuario)){
                echo '<button id="nuevaEntrada" type="button" name="botonNEntrada">Crear Entrada</button>';
            }
                require_once 'php/usuario.php';
                require_once 'php/consultas.php';
                for($i = 0; $i < 3; $i++){
                echo '<article>';
                echo '<div class="cuadro">';
                echo "Usuario $i<br/>";
                        try{
                            $usuario = new Usuario('Usuario_Prueba', 'prueba@mail.com', date('Y-m-d'), 12345679, 1);

                            $usuario->imprimirUsuario();
                            //CrearUsuario($usuario);
                        }
                        catch(PDOException $e){
                            echo "$e";
                        }
                echo '</div>';
                echo '</article>';
            }?>
        </section>

        <aside>
            <ul id="categorias">
                <li><a href="">PHP</a></li>
                <li><a href="">JavaScript</a></li>
                <li><a href="">Html/CSS</a></li>
            </ul>
        </aside>
    <!--</div>-->
<script src="js/prueba.js" type="text/javascript"></script>
    <footer>
        Blog grupo 3
    </footer>
</body>
</html>
