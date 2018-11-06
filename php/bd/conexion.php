<?php
    $servername = "localhost:3306"; //direccion servidor
    $database = "Blog_Grupo3"; //tabla de DB
    $username = "Admin"; //usuario administrador 
    $password = "admin"; //contraseña del administrador
    
    try{
    // Crear conexion con servidor e introducirlo en una variable
    $conn = new PDO("mysql:host=$servername; dbname=$database", $username, $password);
    
    //Si falla conexion mostrar mensaje de error
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
    }
    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }
?>
