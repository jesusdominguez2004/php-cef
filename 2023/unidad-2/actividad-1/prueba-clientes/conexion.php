<?php
    // Clase de conexión a bd_almacen
    class Conexion {
        private $host;
        private $user;
        private $password;
        private $database;
        private $conexion;

        public function __construct() {
            $this -> host = "localhost";
            $this -> user = "root";
            $this -> password = "";
            $this -> database = "bd_almacen";
        }

        public function conectar() {
            try {
                $this -> conexion = new PDO(
                    "mysql:host={$this->host};dbname={$this->database};charset=utf8", 
                    $this->user, 
                    $this->password
                );
                echo "¡Conexión exitosa!";
            } catch (PDOException $ex) {
                echo "Problema de conexión: " . $ex -> getMessage();
                exit;
            }
        }

        // métodos get
        public function get_host() {
            return $this -> host;
        }

        public function get_user() {
            return $this -> user;
        }

        public function get_database() {
            return $this -> database;
        }

        public function get_password() {
            return $this -> password;
        }

        // métodos set
        public function set_host($host) {
            $this -> host = $host;
        }

        public function set_user($user) {
            $this -> user = $user;
        }

        public function set_database($database) {
            $this -> database = $database;
        }

        public function set_password($password) {
            $this -> password = $password;
        }
    }
?>