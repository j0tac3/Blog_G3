<?php
class Consulta{
    //Clase para realizar las consultas a la Base de Datos
    //Funcion para agregar el registro de un nuevo Usuario
    function CrearUsuario($usuario){
        try{
            //Abrimos la conexion con el servidor
            include 'conexion.php';
            //Escribimos la query (consulta) que ejecutaremos
            $sql = "INSERT INTO usuario (nick, email, fechnacimiento, contrasena, token) VALUES (:_nick, :_email, :_fecha, :_pass, :_rol)";
            //Preparamos la query
            $query = $conn->prepare($sql);
            //Asignamos los valores de las variables a los parametros de la consulta
            $query -> bindValue(':_nick', $usuario->getNombre(), PDO::PARAM_STR);
            $query -> bindValue(':_email', $usuario->getEmail(), PDO::PARAM_STR);
            $query -> bindValue(':_fecha', $usuario->getFechaNacimiento(), PDO::PARAM_STR);
            $query -> bindValue(':_pass', $usuario->getPass(), PDO::PARAM_INT);
            $query -> bindValue(':_rol', $usuario->getToken(), PDO::PARAM_INT);
            //Ejecutamos la consulta
            $query->execute();
            //Mensaje de confirmacion del exito de la consulta
            echo "Usuario insertado";
            //Cerramos la conexion
            $conn = null;
        }
        catch(PDOException $e){
            //Mensaje que se muestra cuando falla la sentencia
            echo "Connection failed: " . $e->getMessage();
        }
    }

    //Funcion para agregar el registro de una nueva Entrada
    function CrearEntrada(Entrada $entrada){
        try{
            //Abrimos la conexion con el servidor
            include 'conexion.php';
            //Escribimos la query (consulta) que ejecutaremos
            $sql = "INSERT INTO Entradas (titulo, texto, FechaEntrada, ID_Usuario) VALUES (:_titulo, :_texto, :_FechaEntrada, :_ID_Usuario)";
            //Preparamos la query
            $query = $conn->prepare($sql);
            //Asignamos los valores de las variables a los parametros de la consulta
            $query -> bindValue(':_titulo', $entrada->getTitulo(), PDO::PARAM_STR);
            $query -> bindValue(':_texto', $entrada->getTexto(), PDO::PARAM_STR);
            $query -> bindValue(':_FechaEntrada', $entrada->getFechaEntrada(), PDO::PARAM_STR);
            $query -> bindValue(':_ID_Usuario', $entrada->getID_Usuario(), PDO::PARAM_INT);
            //Ejecutamos la consulta
            $query->execute();
            //Mensaje de confirmacion del exito de la consulta
            echo "<br/>Entrada insertado";
            //Cerramos la conexion
            $conn = null;
        }
        catch(PDOException $e){
            //Mensaje que se muestra cuando falla la sentencia
            echo "Connection failed: " . $e->getMessage();
        }
    }

    //Funcion para agregar el registro de un nuevo Comentario
    function CrearComentario(Comentario $comentario){
        try{
            //Abrimos la conexion con el servidor
            include 'conexion.php';
            //Escribimos la query (consulta) que ejecutaremos
            $sql = "INSERT INTO comentario (text_coment, ID_Entrada, ID_Usuario, FechaComentario) VALUES (:_texto, :_fechaComentario, :_id_Entrada, :_id_Usuario)";
            //Preparamos la query
            $query = $conn->prepare($sql);
            //Asignamos los valores de las variables a los parametros de la consulta
            $query -> bindValue(':_texto', $comentario->getTexto(), PDO::PARAM_STR);
            $query -> bindValue(':_fechaComentario', $comentario->getFechaComentario(), PDO::PARAM_STR);
            $query -> bindValue(':_id_Entrada', $comentario->getID_Entrada(), PDO::PARAM_INT);
            $query -> bindValue(':_id_Usuario', $comentario->getID_Usuario(), PDO::PARAM_INT);
            //Ejecutamos la consulta
            $query->execute();
            //Mensaje de confirmacion del exito de la consulta
            echo "Comentario insertado";
            //Cerramos la conexion
            $conn = null;
        }
        catch(PDOException $e){
            //Mensaje que se muestra cuando falla la sentencia
            echo "Connection failed: " . $e->getMessage();
        }
    }
    //Funcion para seleccionar los datos de un usuario
    function selectUsuario($email){
      try{
            //Abrimos la conexion con el servidor
            include 'conexion.php';
            //Escribimos la query (consulta) que ejecutaremos
            $sql = "SELECT * FROM usuario WHERE email = :_email";
            //Preparamos la query
            $query = $conn->prepare($sql);
            //Asignamos los valores de las variables a los parametros de la consulta
            $query -> bindParam(':_email', $email, PDO::PARAM_STR);
            //$query -> bindParam(':_pass', $pass, PDO::PARAM_INT);
            //Ejecutamos la consulta
            $query->execute();
            //Cerramos la conexion
            //$query->closeCursor();
            $conn = null;
            //Regresamos los valores del resultado de la consulta
            return $query;
        }
        catch(PDOException $e){
          //Mensaje que se muestra cuando falla la sentencia
            echo "Connection failed: " . $e->getMessage();
        }
    }
    //Funcion para seleccionar las entradas de un usuario
    function selectEntradaUser($id_usuario){
      try{
            //Abrimos la conexion con el servidor
            include 'conexion.php';
            //Escribimos la query (consulta) que ejecutaremos
            $sql = "SELECT ID_Entrada, titulo, texto, FechaEntrada, ID_Usuario FROM Entradas WHERE ID_Usuario = :_id_usuario";
            //Preparamos la query
            $query = $conn->prepare($sql);
            //Asignamos los valores de las variables a los parametros de la consulta
            $query -> bindParam(':_id_usuario', $id_usuario, PDO::PARAM_INT);
            //$query -> bindParam(':_pass', $pass, PDO::PARAM_INT);
            //Ejecutamos la consulta
            $query->execute();
            //Cerramos la conexion
            //$query->closeCursor();
            $conn = null;
            //Regresamos los valores del resultado de la consulta
            return $query;
        }
        catch(PDOException $e){
          //Mensaje que se muestra cuando falla la sentencia
            echo "Connection failed: " . $e->getMessage();
        }
    }
    //Funcion para seleccionar los datos de una entrada
    function selectEntrada($id_entrada){
      try{
            //Abrimos la conexion con el servidor
            include 'conexion.php';
            //Escribimos la query (consulta) que ejecutaremos
            $sql = "SELECT ID_Entrada, titulo, texto, FechaEntrada, ID_Usuario FROM Entradas WHERE ID_Entrada = :_id_entrada";
            //Preparamos la query
            $query = $conn->prepare($sql);
            //Asignamos los valores de las variables a los parametros de la consulta
            $query -> bindParam(':_id_entrada', $id_entrada, PDO::PARAM_INT);
            //$query -> bindParam(':_pass', $pass, PDO::PARAM_INT);
            //Ejecutamos la consulta
            $query->execute();
            //Cerramos la conexion
            //$query->closeCursor();
            $conn = null;
            //Regresamos los valores del resultado de la consulta
            return $query;
        }
        catch(PDOException $e){
          //Mensaje que se muestra cuando falla la sentencia
            echo "Connection failed: " . $e->getMessage();
        }
    }
    //Funcion para seleccionar los comentarios de un usuario
    function selectCometariosUser($id_usuario){
      try{
            //Abrimos la conexion con el servidor
            include 'conexion.php';
            //Escribimos la query (consulta) que ejecutaremos
            $sql = "SELECT * FROM Comentario WHERE ID_Usuario = :_id_usuario";
            //Preparamos la query
            $query = $conn->prepare($sql);
            //Asignamos los valores de las variables a los parametros de la consulta
            $query -> bindParam(':_id_usuario', $id_usuario, PDO::PARAM_INT);
            //$query -> bindParam(':_pass', $pass, PDO::PARAM_INT);
            //Ejecutamos la consulta
            $query->execute();
            //Cerramos la conexion
            //$query->closeCursor();
            $conn = null;
            //Regresamos los valores del resultado de la consulta
            return $query;
        }
        catch(PDOException $e){
          //Mensaje que se muestra cuando falla la sentencia
            echo "Connection failed: " . $e->getMessage();
        }
    }
    //Funcion para seleccionar los datos de un comentario
    function selectComentario($id_entrada){
      try{
            //Abrimos la conexion con el servidor
            include 'conexion.php';
            //Escribimos la query (consulta) que ejecutaremos
            $sql = "SELECT * FROM Comentario WHERE ID_Entrada = :_id_entrada";
            //Preparamos la query
            $query = $conn->prepare($sql);
            //Asignamos los valores de las variables a los parametros de la consulta
            $query -> bindParam(':_id_entrada', $id_entrada, PDO::PARAM_INT);
            //$query -> bindParam(':_pass', $pass, PDO::PARAM_INT);
            //Ejecutamos la consulta
            $query->execute();
            //Cerramos la conexion
            //$query->closeCursor();
            $conn = null;
            //Regresamos los valores del resultado de la consulta
            return $query;
        }
        catch(PDOException $e){
          //Mensaje que se muestra cuando falla la sentencia
            echo "Connection failed: " . $e->getMessage();
        }
    }

    //Funcion para seleccionar los datos de un comentario
    function DeleteEntrada($id_entrada){
      try{
            //Abrimos la conexion con el servidor
            include 'conexion.php';
            //Escribimos la query (consulta) que ejecutaremos
            $sql = "DELETE FROM Comentario WHERE ID_Entrada = :_id_entrada";
            //Preparamos la query
            $query = $conn->prepare($sql);
            //Asignamos los valores de las variables a los parametros de la consulta
            $query -> bindParam(':_id_entrada', $id_entrada, PDO::PARAM_INT);
            //$query -> bindParam(':_pass', $pass, PDO::PARAM_INT);
            //Ejecutamos la consulta
            $query->execute();
            //Cerramos la conexion
            //$query->closeCursor();
            $conn = null;
            //Regresamos los valores del resultado de la consulta
            //return $query;
        }
        catch(PDOException $e){
          //Mensaje que se muestra cuando falla la sentencia
            echo "Connection failed: " . $e->getMessage();
        }
    }
}
?>
