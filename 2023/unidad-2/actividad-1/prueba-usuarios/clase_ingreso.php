<?php
    class ClaseIngreso {
        private $nombre_u;
        private $apellido_u;
        private $correo;

        private $host;
        private $user;
        private $password;
        private $database;
        private $conexion;
        
        // métodos set y get
        public function set_nombre_u($nombre_u) {
            $this -> nombre_u = $nombre_u;
        }

        public function get_nombre_u() {
            return $this -> nombre_u;
        }

        public function set_apellido_u($apellido_u) {
            $this -> apellido_u = $apellido_u;
        }

        public function get_apellido_u() {
            return $this -> apellido_u;
        }

        public function set_correo($correo) {
            $this -> correo = $correo;
        }

        public function get_correo() {
            return $this -> correo;
        }

        // constructor and new class Conexion (nuevos atributos)
        public function __construct() {
            $dato = new Conexion();
            $this -> host = $dato -> get_host();
            $this -> user = $dato -> get_user();
            $this -> password = $dato -> get_password();
            $this -> database = $dato -> get_database();
        }

        // 1. insertar usuario "prueba_tb_usuario"
        public function insertar_usuario(ClaseIngreso $usuario) {
            try {
                $this -> conexion = new PDO(
                    "mysql:host=".$this->host . ";dbname=".$this->database,
                    $this -> user, 
                    $this -> password
                );
                $sql = "INSERT INTO prueba_tb_usuarios (nombre_u, apellido_u, correo) VALUES ('{$usuario->get_nombre_u()}', '{$usuario->get_apellido_u()}', '{$usuario->get_correo()}')";               
                $iniciarSQL = $this -> conexion -> prepare($sql);
                $iniciarSQL -> execute();
            } catch (PDOException $ex) {
                die ("Problema de conexión INSERTAR USUARIOS: " . $ex -> getMessage());
            }
        }

        // 2. buscar usuario "prueba_tb_usuario"
        

    }
?>