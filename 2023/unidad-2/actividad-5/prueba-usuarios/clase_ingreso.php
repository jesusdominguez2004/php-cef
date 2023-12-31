<?php
    use ClaseIngreso as GlobalClaseIngreso;
    class ClaseIngreso {
        private $codigo_u;
        private $nombre_u;
        private $apellido_u;
        private $correo;

        private $host;
        private $user;
        private $password;
        private $database;
        private $conexion;

        private $nombre_p;
        private $foto_p;
        private $precio_p;
        
        // métodos set y get
        public function set_codigo_u($codigo_u) {
            $this -> codigo_u = $codigo_u;
        }

        public function get_codigo_u() {
            return $this -> codigo_u;
        }

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

        // 1. insertar usuario "prueba_tb_usuarios"
        public function insertar_usuario(ClaseIngreso $usuario) {
            try {
                $this -> conexion = new PDO(
                    "mysql:host={$this->host};dbname={$this->database};charset=utf8", 
                    $this->user, 
                    $this->password
                );
                $sql = "INSERT INTO prueba_tb_usuarios (nombre_u, apellido_u, correo) VALUES ('{$usuario->get_nombre_u()}', '{$usuario->get_apellido_u()}', '{$usuario->get_correo()}')";               
                $iniciarSQL = $this -> conexion -> prepare($sql);
                $iniciarSQL -> execute();
            } catch (PDOException $ex) {
                die ("ERROR INSERTAR USUARIO: {$ex->getMessage()}");
            }
        }

        // 2. buscar usuario "prueba_tb_usuarios"
        public function buscar_usuario(GlobalClaseIngreso $buscar) {
            $matriz_usuarios = array();
            try {
                $this -> conexion = new PDO(
                    "mysql:host={$this->host};dbname={$this->database};charset=utf8", 
                    $this->user, 
                    $this->password
                );
                $sql = "SELECT codigo_u, nombre_u, apellido_u, correo FROM prueba_tb_usuarios WHERE codigo_u = {$buscar->get_codigo_u()} ORDER BY apellido_u";              
                $sth = $this -> conexion -> prepare($sql);
                $sth -> execute();

                while ($row = $sth -> fetch()) {
                    $codigo_u = $row["codigo_u"];
                    $nombre_u = $row["nombre_u"];
                    $apellido_u = $row["apellido_u"];
                    $correo = $row["correo"];
                    $matriz_usuarios[] = array(
                        "codigo_u" => $codigo_u, 
                        "nombre_u" => $nombre_u, 
                        "apellido_u" => $apellido_u, 
                        "correo" => $correo
                    );
                }
                $json_usuarios = json_encode($matriz_usuarios);
                return $json_usuarios;
            } catch (PDOException $ex) {
                die ("ERROR BUSCAR USUARIO: {$ex->getMessage()}");
            }
        }

        // 3. actualizar usuario "prueba_tb_usuarios"
        public function actualizar_usuario(GlobalClaseIngreso $usuario) {
            try {
                $this -> conexion = new PDO(
                    "mysql:host={$this->host};dbname={$this->database};charset=utf8", 
                    $this->user, 
                    $this->password
                );
                $sql = "UPDATE prueba_tb_usuarios SET nombre_u = '{$usuario->get_nombre_u()}', apellido_u = '{$usuario->get_apellido_u()}', correo = '{$usuario->get_correo()}' WHERE codigo_u = {$usuario->get_codigo_u()}";              
                $sth = $this -> conexion -> prepare($sql);
                $sth -> execute();
            } catch (PDOException $ex) {
                die ("ERROR ACTUALIZAR USUARIO: {$ex->getMessage()}");
            }
        }

        // 4. ver todos los usuarios "pruebas_tb_usuarios"
        public function ver_usuarios() {
            $matriz_usuarios = array();
            try {
                $this -> conexion = new PDO(
                    "mysql:host={$this->host};dbname={$this->database};charset=utf8", 
                    $this->user, 
                    $this->password
                );
                $sql = "SELECT codigo_u, nombre_u, apellido_u, correo FROM prueba_tb_usuarios ORDER BY apellido_u";
                $sth = $this -> conexion -> prepare($sql);
                $sth -> execute();

                while ($row = $sth -> fetch()) {
                    $codigo_u = $row["codigo_u"];
                    $nombre_u = $row["nombre_u"];
                    $apellido_u = $row["apellido_u"];
                    $correo = $row["correo"];
                    $matriz_usuarios[] = array(
                        "codigo_u" => $codigo_u, 
                        "nombre_u" => $nombre_u, 
                        "apellido_u" => $apellido_u, 
                        "correo" => $correo
                    );
                }
                $json_usuarios = json_encode($matriz_usuarios);
                return $json_usuarios;
            } catch (PDOException $ex) {
                die ("ERROR VER USUARIOS: {$ex->getMessage()}");
            }
        }

        // 5. eliminar usuario "prueba_tb_usuarios"
        public function eliminar_usuario(GlobalClaseIngreso $usuario) {
            try {
                $this -> conexion = new PDO(
                    "mysql:host={$this->host};dbname={$this->database};charset=utf8", 
                    $this->user, 
                    $this->password
                );
                $sql = "DELETE FROM prueba_tb_usuarios WHERE codigo_u = {$usuario->get_codigo_u()}";
                $sth = $this -> conexion -> prepare($sql);
                $sth -> execute();
            } catch (PDOException $ex) {
                die ("ERROR ELIMINAR USUARIO: {$ex->getMessage()}");
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