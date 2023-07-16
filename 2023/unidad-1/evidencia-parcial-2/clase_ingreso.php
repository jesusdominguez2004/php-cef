<?php
    class ClaseIngreso {
        private $tipo_doc;
        private $num_doc;
        private $nombres;
        private $apellidos;
        private $dir_casa;
        private $correo;
        private $telefono;
        private $fecha_nac;
        
        // métodos set y get
        public function set_tipo_doc($tipo_doc) {
            $this -> tipo_doc = $tipo_doc;
        }

        public function get_tipo_doc() {
            return $this -> tipo_doc;
        }

        public function set_num_doc($num_doc) {
            $this -> num_doc = $num_doc;
        }

        public function get_num_doc() {
            return $this -> num_doc;
        }

        public function set_nombres($nombres) {
            $this -> nombres = $nombres;
        }

        public function get_nombres() {
            return $this -> nombres;
        }

        public function set_apellidos($apellidos) {
            $this -> apellidos = $apellidos;
        }

        public function get_apellidos() {
            return $this -> apellidos;
        }

        public function set_dir_casa($dir_casa) {
            $this -> dir_casa = $dir_casa;
        }

        public function get_dir_casa() {
            return $this -> dir_casa;
        }

        public function set_correo($correo) {
            $this -> correo = $correo;
        }

        public function get_correo() {
            return $this -> correo;
        }

        public function set_telefono($telefono) {
            $this -> telefono = $telefono;
        }

        public function get_telefono() {
            return $this -> telefono;
        }

        public function set_fecha_nac($fecha_nac) {
            $this -> fecha_nac = $fecha_nac;
        }

        public function get_fecha_nac() {
            return $this -> fecha_nac;
        }

        // constructor and new class Conexion (nuevos atributos)
        public function __construct() {
            $dato = new Conexion();
            $this -> host = $dato -> get_host();
            $this -> user = $dato -> get_user();
            $this -> password = $dato -> get_password();
            $this -> database = $dato -> get_database();
        }

        // 1. insertar cliente
        public function insertar_cliente(ClaseIngreso $adcliente) {
            try {
                $this -> conexion = new PDO(
                    "mysql:host=".$this->host . ";dbname=".$this->database,
                    $this -> user, 
                    $this -> password
                );
                $sql = "INSERT INTO prueba_tb_clientes (tipo_doc, num_doc, nombres, apellidos, dir_casa, correo, telefono, fecha_nac) VALUES ({$adcliente->get_tipo_doc()}, {$adcliente->get_num_doc()}, '{$adcliente->get_nombres()}', '{$adcliente->get_apellidos()}', '{$adcliente->get_dir_casa()}', '{$adcliente->get_correo()}', '{$adcliente->get_telefono()}', {$adcliente->get_fecha_nac()})";               
                $iniciarSQL = $this -> conexion -> prepare($sql);
                $iniciarSQL -> execute();
            } catch (PDOException $ex) {
                die ("Problema de conexión INSERTAR CLIENTES: " . $ex -> getMessage());
            }
        }
    }
?>