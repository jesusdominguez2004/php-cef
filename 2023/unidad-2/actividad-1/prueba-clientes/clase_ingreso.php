<?php
use ClaseIngreso as GlobalClaseIngreso;
    class ClaseIngreso {
        private $id_cliente;
        private $tipo_doc;
        private $num_doc;
        private $nombres;
        private $apellidos;
        private $dir_casa;
        private $correo;
        private $telefono;
        private $fecha_nac;

        private $host;
        private $user;
        private $password;
        private $database;
        private $conexion;
        
        // métodos set y get
        public function set_id_cliente($id_cliente) {
            $this -> id_cliente = $id_cliente;
        }

        public function get_id_cliente() {
            return $this -> id_cliente;
        }

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

        // 1. insertar cliente "prueba_tb_clientes"
        public function insertar_cliente(ClaseIngreso $cliente) {
            try {
                $this -> conexion = new PDO(
                    "mysql:host={$this->host};dbname={$this->database};charset=utf8", 
                    $this->user, 
                    $this->password
                );
                $sql = "INSERT INTO prueba_tb_clientes (tipo_doc, num_doc, nombres, apellidos, dir_casa, correo, telefono, fecha_nac) VALUES ({$cliente->get_tipo_doc()}, {$cliente->get_num_doc()}, '{$cliente->get_nombres()}', '{$cliente->get_apellidos()}', '{$cliente->get_dir_casa()}', '{$cliente->get_correo()}', '{$cliente->get_telefono()}', {$cliente->get_fecha_nac()})";
                $iniciarSQL = $this -> conexion -> prepare($sql);
                $iniciarSQL -> execute();
            } catch (PDOException $ex) {
                die ("ERROR INSERTAR CLIENTE: {$ex->getMessage()}");
            }
        }

        // 2. buscar cliente "prueba_tb_clientes"
        public function buscar_cliente(GlobalClaseIngreso $buscar) {
            $matriz_clientes = array();
            try {
                $this -> conexion = new PDO(
                    "mysql:host={$this->host};dbname={$this->database};charset=utf8", 
                    $this->user, 
                    $this->password
                );
                $sql = "SELECT id_cliente, tipo_doc, num_doc, nombres, apellidos, dir_casa, correo, telefono, fecha_nac FROM prueba_tb_clientes WHERE id_cliente = {$buscar->get_id_cliente()} ORDER BY apellidos";              
                $sth = $this -> conexion -> prepare($sql);
                $sth -> execute();

                while ($row = $sth -> fetch()) {
                    $id_cliente = $row["id_cliente"];
                    $tipo_doc = $row["tipo_doc"];
                    $num_doc = $row["num_doc"];
                    $nombres = $row["nombres"];
                    $apellidos = $row["apellidos"];
                    $dir_casa = $row["dir_casa"];
                    $correo = $row["correo"];
                    $telefono = $row["telefono"];
                    $fecha_nac = $row["fecha_nac"];
                    $matriz_clientes[] = array(
                        "id_cliente" => $id_cliente, 
                        "tipo_doc" => $tipo_doc, 
                        "num_doc" => $num_doc, 
                        "nombres" => $nombres, 
                        "apellidos" => $apellidos, 
                        "dir_casa" => $dir_casa, 
                        "correo" => $correo, 
                        "telefono" => $telefono, 
                        "fecha_nac" => $fecha_nac
                    );
                }
                $json_clientes = json_encode($matriz_clientes);
                return $json_clientes;
            } catch (PDOException $ex) {
                die ("ERROR BUSCAR CLIENTE: {$ex->getMessage()}");
            }
        }
    }
?>