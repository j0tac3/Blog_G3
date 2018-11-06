<?php
    //Clase Usuario
    class Usuario{
        //Definimos los atributos
        private $id_Usuario;
        private $nombre;
        private $email;
        private $fechaNacimiento;
        private $pass;
        private $token;

        //Constructor
        /*public function __construct($nombre, $email, $fechaNacimiento, $pass, $token){
            $this->id_Usuario = 0;
            $this->nombre = $nombre;
            $this->email = $email;
            $this->fechaNacimiento = $fechaNacimiento;
            $this->pass = $pass;
            $this->token = $token;
        }*/

        //Creamos los getters and setters  
        public function setID_Usuario($id_Usuario){
            $this->id_Usuario = $id_Usuario;
        }

        public function getID_Usuario(){
            return $this->id_Usuario;
        }

        public function setNombre($nombre){
            $this->nombre = $nombre;
        }

        public function getNombre(){
            return $this->nombre;
        }

        public function setEmail($email){
            $this->email = $email;
        }

        public function getEmail(){
            return $this->email;
        }

        public function setFechaNacimiento($fechaNacimiento){
            $this->fechaNacimiento = $fechaNacimiento;
        }

        public function getFechaNacimiento(){
            return $this->fechaNacimiento;
        }

        public function setPass($pass){
            $this->pass = $pass;
        }

        public function getPass(){
            return $this->pass;
        }

        public function setToken($token){
            $this->token = $token;
        }

        public function getToken(){
            return $this->token;
        }

        public function imprimirUsuario(){
            echo $this->nombre . "<br/>" . $this->email . "<br/>" .$this->fechaNacimiento . "<br/>" .$this->pass . "<br/>" .$this->token . "<br/>";
        }

        public function existeUsuario($email, $password){
            //Incluimos el documento que se encargara de la consulta
            require_once 'bd//consultas.php';
            //Realizamos la consulta a la base de datos
            //Para ver si existe el usuario
            $consulta = new Consulta();
            $resultado= $consulta->selectUsuario($email);
            $fila=$resultado->fetch(PDO::FETCH_ASSOC);
            //Pasamos el valor retornado a una variable
            if($fila['email'] == $email){
                //Comprobamos si la contrasena introducida por el usuario es la correcta
                if($password==$fila['Contrasena']){
                    return true;
                }
            }
            return false;
        }

        public function comprobarClave($email, $password){
            //Incluimos el documento que se encargara de la consulta
            echo "<br/>Consultando";

            require_once 'bd/consultas.php';
            //Realizamos la consulta a la base de datos
            //Para ver si existe el usuario
            $consulta = new Consultas();
            $resultado= $consulta->selectUsuario($email);
            //Pasamos el valor retornado a una variable
            $fila=$resultado->fetch();
            if($fila['email'] == $email){
                //Comprobamos si la contrasena introducida por el usuario es la correcta
                if($password == $fila['Contrasena']){
                    return true;
                }
                else{
                    return false;
                }
            }
            return false;
        }

        private function getUsuario($email){
            //Incluimos el documento que se encargara de la consulta
            require_once 'bd/consultas.php';
            //Realizamos la consulta a la base de datos
            //Para ver si existe el usuario
            $consulta = new Consulta();
            $resultado= $consulta->selectUsuario($email);
            //Pasamos el valor retornado a una variable
            $rows=$resultado->fetch();
            if($rows['email'] == $email){
                $usuario = array("id_usuario" => $rows['ID_Usuario'], "nombre" => $rows['nick'], "email" => $rows['email'], "password" => $rows['Contrasena'], "token" => $rows['token'], "fechaNacimiento" => $rows['fechnacimiento']);
                return $usuario;
            }
            return array();
        }

        public function login(){
            if (isset($_POST["email"]) && isset($_POST["password"])){
                $email = $_POST["email"];
                $password = $_POST["password"];
                echo "logueando";
                if($this->existeUsuario($email, $password) == true){
                    //Creamos las variables de SESSION con los datos del Usuario
                    $_SESSION = $this->getUsuario($email);
                    header ("Location:../perfil.php");
                }
                else{
                    header ("Location:login.php");
                }
            }
            else{
                header ("Location:login.php");
            }
        }

        public function logout(){
            $sesion = new Sesion();
            $sesion->terminarSesion();
            header ("Location:login.php");
        }

        public function insert($usuario){
            $this->setNombre($_POST['user']);
            $this->setEmail($_POST['email']);
            $this->setFechaNacimiento($_POST['fecnaci']);
            $this->setPass($_POST['pass']);
            $this->setToken($_POST['token']);

            require_once 'bd/consultas.php';
            $consulta = new Consulta();
            $resultado= $consulta->CrearUsuario($usuario);
        }
    }
?>
