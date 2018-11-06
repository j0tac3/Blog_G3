<?php
    //Clase Entrada
    class Entrada{
        //Definimos los atributos
        private $_idEntrada;
        private $_titulo;
        private $_texto;
        private $_fechaEntrada;
        private $_idUsuario;

        //Constructor
        /*public function __construct($_idEntrada, $_titulo, $_texto, $_fechaEntrada, $_idUsuario){
            $this->_idEntrada = $_idEntrada;
            $this->_titulo = $_titulo;
            $this->_texto = $_texto;
            $this->_fechaEntrada = $_fechaEntrada;
            $this->_idUsuario = $_idUsuario;
        }*/

        //Creamos los getters and setters
        public function setIdEntrada($_idEntrada){
            $this->_idEntrada = $_idEntrada;
        }

        public function getIdEntrada(){
            return $this->_idEntrada;
        }

        public function setTitulo($_titulo){
            $this->_titulo = $_titulo;
        }

        public function getTitulo(){
            return $this->_titulo;
        }

        public function setTexto($_texto){
            $this->_texto = $_texto;
        }

        public function getTexto(){
            return $this->_texto;
        }

        public function setFechaEntrada($_fechaEntrada){
            $this->_fechaEntrada = $_fechaEntrada;
        }

        public function getFechaEntrada(){
            return $this->_fechaEntrada;
        }

        public function setID_Usuario($_idUsuario){
            $this->_idUsuario = $_idUsuario;
        }

        public function getID_Usuario(){
            return $this->_idUsuario;
        }

        public function mostrarEntrada(){

        }
        //Funcion para insertar una nueva entrada
        public function insertarEntrada(){
            //Asignamos los valores del formulario (mas la id de sesion del usuario)
            //en el objeto Entrada
            $this->setTitulo($_POST['titulo']);
            $this->setTexto($_POST['enunciado']);
            $this->setFechaEntrada(date('Y-m-d'));
            $this->setID_Usuario($_SESSION['id_usuario']);
            //Realizamos la consulta para crear la entrada
            require_once('bd/consultas.php');
            $consulta = new Consulta();
            $consulta->CrearEntrada($this);
        }
    }
?>