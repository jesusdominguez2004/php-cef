<?php
    class ClaseIngreso {
        private $name;
        private $apellido;
        private $correo;
        private $codigo_u;

        public function set_codigo_u($codigo_u) {
            $this -> codigo_u = $codigo_u;
        }

        public function get_codigo_u() {
            return $this -> codigo_u;
        }

        public function set_nombre($nombre) {
            $this -> nombre = $nombre;
        }

        public function get_nombre() {
            return $this -> nombre;
        }

        public function set_apellido($apellido) {
            $this -> apellido = $apellido;
        }

        public function get_apellido() {
            return $this -> apellido;
        }

        public function set_correo($correo) {
            $this -> correo = $correo;
        }

        public function get_correo() {
            return $this -> correo;
        }

        public function __construct() {
            $dato = new Conexion();
            $this -> host = $dato -> get_host();
            $this -> user = $dato -> get_user();
            $this -> password = $dato -> get_password();
            $this -> database = $dato -> get_database();
        }

        public function insertar_usuario(ClaseIngreso $adusuario) {
            try {
                $this -> conexion = new PDO(
                    "mysql:host=".$this->host . ";dbname=".$this->database,
                    $this -> user, 
                    $this -> password
                );
                $sql = "INSERT INTO prueba_tb_usuarios (nombre_u, apellido_u, correo) values ('{$adusuario->get_nombre()}', '{$adusuario->get_apellido()}', '{$adusuario->get_correo()}')";
                $sth = $this -> conexion -> prepare($sql);
                $sth -> execute();
            } catch (PDOException $ex) {
                die ("Problema de conexión: " . $ex -> getMessage());
            }
        }
    }
?>