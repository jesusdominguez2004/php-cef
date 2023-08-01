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

        private $nombre_p;
        private $foto_p;
        private $precio_p;
        
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

        public function set_nombre_p($nombre_p) {
            $this -> nombre_p = $nombre_p;
        }

        public function get_nombre_p() {
            return $this -> nombre_p;
        }

        public function set_foto_p($foto_p) {
            $this -> foto_p = $foto_p;
        }

        public function get_foto_p() {
            return $this -> foto_p;
        }

        public function set_precio_p($precio_p) {
            $this -> precio_p = $precio_p;
        }

        public function get_precio_p() {
            return $this -> precio_p;
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
        public function insertar_cliente(GlobalClaseIngreso $cliente) {
            try {
                $this -> conexion = new PDO(
                    "mysql:host={$this->host};dbname={$this->database};charset=utf8", 
                    $this->user, 
                    $this->password
                );
                $sql = "INSERT INTO prueba_tb_clientes (tipo_doc, num_doc, nombres, apellidos, dir_casa, correo, telefono, fecha_nac) VALUES ({$cliente->get_tipo_doc()}, {$cliente->get_num_doc()}, '{$cliente->get_nombres()}', '{$cliente->get_apellidos()}', '{$cliente->get_dir_casa()}', '{$cliente->get_correo()}', '{$cliente->get_telefono()}', '{$cliente->get_fecha_nac()}')";
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

        // 3. actualizar cliente "prueba_tb_clientes"
        public function actualizar_cliente(GlobalClaseIngreso $cliente) {
            try {
                $this -> conexion = new PDO(
                    "mysql:host={$this->host};dbname={$this->database};charset=utf8", 
                    $this->user, 
                    $this->password
                );
                $sql = "UPDATE prueba_tb_clientes SET tipo_doc = {$cliente->get_tipo_doc()}, num_doc = {$cliente->get_num_doc()}, nombres = '{$cliente->get_nombres()}', apellidos = '{$cliente->get_apellidos()}', dir_casa = '{$cliente->get_dir_casa()}', correo = '{$cliente->get_correo()}', telefono = '{$cliente->get_telefono()}', fecha_nac = '{$cliente->get_fecha_nac()}' WHERE id_cliente = {$cliente->get_id_cliente()}";
                $sth = $this -> conexion -> prepare($sql);
                $sth -> execute();
            } catch (PDOException $ex) {
                die ("ERROR ACTUALIZAR CLIENTE: {$ex->getMessage()}");
            }
        }

        // 4. ver todos los clientes "prueba_tb_clientes"
        public function ver_clientes() {
            $matriz_clientes = array();
            try {
                $this -> conexion = new PDO(
                    "mysql:host={$this->host};dbname={$this->database};charset=utf8", 
                    $this->user, 
                    $this->password
                );
                $sql = "SELECT id_cliente, tipo_doc, num_doc, nombres, apellidos, dir_casa, correo, telefono, fecha_nac FROM prueba_tb_clientes ORDER BY apellidos";
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
                die ("ERROR VER CLIENTES: {$ex->getMessage()}");
            }
        }

        // 5. eliminar cliente "prueba_tb_clientes"
        public function eliminar_cliente(GlobalClaseIngreso $cliente) {
            try {
                $this -> conexion = new PDO(
                    "mysql:host={$this->host};dbname={$this->database};charset=utf8", 
                    $this->user, 
                    $this->password
                );
                $sql = "DELETE FROM prueba_tb_clientes WHERE id_cliente = {$cliente->get_id_cliente()}";
                $sth = $this -> conexion -> prepare($sql);
                $sth -> execute();
            } catch (PDOException $ex) {
                die ("ERROR ELIMINAR CLIENTE: {$ex->getMessage()}");
            }
        }

        // 6. insertar producto "prueba_tb_productos"
        public function insertar_producto(ClaseIngreso $producto) {
            try {
                $this -> conexion = new PDO(
                    "mysql:host={$this->host};dbname={$this->database};charset=utf8", 
                    $this->user, 
                    $this->password
                );
                $sql = "INSERT INTO prueba_tb_productos (nombre_p, foto_p, precio_p) VALUES ('{$producto->get_nombre_p()}', '{$producto->get_foto_p()}', {$producto->get_precio_p()})";               
                $iniciarSQL = $this -> conexion -> prepare($sql);
                $iniciarSQL -> execute();
            } catch (PDOException $ex) {
                die ("ERROR INSERTAR PRODUCTO: {$ex->getMessage()}");
            }
        }

        // 7. ver todos los productos "pruebas_tb_productos"
        public function ver_productos() {
            $matriz_productos = array();
            try {
                $this -> conexion = new PDO(
                    "mysql:host={$this->host};dbname={$this->database};charset=utf8", 
                    $this->user, 
                    $this->password
                );
                $sql = "SELECT cod_p, nombre_p, foto_p, precio_p FROM prueba_tb_productos";
                $sth = $this -> conexion -> prepare($sql);
                $sth -> execute();

                while ($row = $sth -> fetch()) {
                    $cod_p = $row["cod_p"];
                    $nombre_p = $row["nombre_p"];
                    $foto_p = $row["foto_p"];
                    $precio_p = $row["precio_p"];
                    $matriz_productos[] = array(
                        "cod_p" => $cod_p, 
                        "nombre_p" => $nombre_p, 
                        "foto_p" => $foto_p, 
                        "precio_p" => $precio_p
                    );
                }
                $json_productos = json_encode($matriz_productos);
                return $json_productos;
            } catch (PDOException $ex) {
                die ("ERROR VER PRODUCTOS: {$ex->getMessage()}");
            }
        }
    }
?>