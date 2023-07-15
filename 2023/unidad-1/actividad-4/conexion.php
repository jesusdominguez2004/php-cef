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
            $this -> pass = "";
            $this -> database = "bd_almacen";
        }

        public function conectar() {
            try {
                $this -> con = new PDO(
                    "mysql:host=" . $this -> host . ";dbname=" . $this -> database,
                    $this -> user,
                    $this -> password
                );
                echo "¡Conexión exitosa!";
            } catch (PDOException $ex) {
                echo "Problema de conexión..." . $ex -> getMessage();
                exit;
            }
        }

        public function getHost() {
            return $this -> host;
        }

        public function getUser() {
            return $this -> user;
        }

        public function getDatabase() {
            return $this -> database;
        }

        public function getPassword() {
            return $this -> password;
        }

        public function setHost($host) {
            $this -> host = $host;
        }

        public function setUser($user) {
            $this -> user = $user;
        }

        public function setDatabase($database) {
            $this -> database = $database;
        }

        public function setPassword($password) {
            $this -> password = $password;
        }
    }
?>