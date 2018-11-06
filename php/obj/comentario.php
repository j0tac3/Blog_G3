<?php
    //Clase Comentario
    class Comentario{
        //Definimos los atributos
        private $_idComentario;
        private $_texto;
        private $_idEntrada;
        private $_idUsuario;
        private $_fechaComentario;

        //Constructor
        public function __construct($_idComentario, $_texto, $_idEntrada, $_idUsuario, $_fechaComentario){
            $this->_idComentario = $_idComentario;
            $this->_texto = $_texto;
            $this->_idEntrada = $_idEntrada;
            $this->_idUsuario = $_idUsuario;
            $this->_fechaComentario = $_fechaComentario;
        }

        //Creamos los getters and setters
        public function setID_Comentario($_idComentario){
            $this->_idComentario = $_idComentario;
        }

        public function getID_Comentario(){
            return $this->_idComentario;
        }

        public function setTexto($_texto){
            $this->_texto = $_texto;
        }

        public function getTexto(){
            return $this->_texto;
        }

        public function setID_Entrada($_idEntrada){
            $this->_idEntrada = $_idEntrada;
        }

        public function getID_Entrada(){
            return $this->_idEntrada;
        }

        public function setID_Usuario($_idUsuario){
            $this->_idUsuario = $_idUsuario;
        }

        public function getID_Usuario(){
            return $this->_idUsuario;
        }

        public function setFechaComntario($_fechaComentario){
            $this->_fechaComentario = $_fechaComentario;
        }

        public function getFechaComntario(){
            return $this->_fechaComentario;
        }

    }
?>
