<!-- Esta es la página o hoja de ingreso PHP -->
<!-- Toda variable en PHP empieza con $-->
<!-- Toda acción en PHP termina con ;-->
        
<?php
// BDD Almacen    
class clase_ingreso { 
    // Definir variables (Cada una tendrá dos subvariables "Get" y "Set")
    // Variables login.html
    private $login;
    private $password;
    // Variables tb_producto
    private $codigo_prod;
    private $nombre;
    private $grupo_prod;
    private $tipo_prod;
    private $descripcion;
    private $valor_compra;
    private $valor_venta;
    private $porcentaje_comis;
    private $valor_comi;
    private $fecha;
    private $nomarchivo;
    private $ubicfoto;
    private $cod_parner;
    private $pos;

    // Variables tb_usuario
    private $id_usuario;
    private $nombre_u;
    private $apellidos_u; 
    private $tipoDoc;           
    private $identificacion;
    private $telefono_u;
    private $login_usuario;
    private $password_usuario;
    private $id_perfil;
            
    // Variables tb_clientes
    private $id_cliente;
    private $nombre_c;
    private $apellidos_c;
    private $tipo_Doc;
    private $num_doc;
    private $fecha_nac;
    private $dir_casa;
    private $telefono_c;
    private $correo_c;

    // Variables Get y Set login_usuario.html
    function setLogin($login) { 
        $this->login = $login; // Set es para capturar información en esa variable
    }
    function getLogin() { 
        return $this->login; // Get es para mostar en un futuro
    }

    function setPassword($password) { 
        $this->password = $password; // Set es para capturar información en esa variable
    }
    function getPassword() { 
        return $this->password; // Get es para mostar en un futuro
    }

    // Variables Get y Set tb_producto
    function setCodigo_prod($codigo_prod) { 
        $this->codigo_prod = $codigo_prod; // Set es para capturar información en esa variable
    }
    function getCodigo_prod() { 
        return $this->codigo_prod; // Get es para mostar en un futuro
    }

    function setNombre_prod($nombre) { 
        $this->nombre = $nombre; // Set es para capturar información en esa variable
    }
    function getNombre_prod() { 
        return $this->nombre; // Get es para mostar en un futuro
    }

    function setGrupo_prod($grupo_prod) { 
        $this->grupo_prod = $grupo_prod; // Set es para capturar información en esa variable
    }
    function getGrupo_prod() { 
        return $this->grupo_prod; // Get es para mostar en un futuro
    }

    function setTipo_prod($tipo_prod) { 
        $this->tipo_prod = $tipo_prod; // Set es para capturar información en esa variable
    }
    function getTipo_prod() { 
        return $this->tipo_prod; // Get es para mostar en un futuro
    }

    function setDescripcion($descripcion) { 
        $this->descripcion = $descripcion; // Set es para capturar información en esa variable
    }
    function getDescripcion() { 
        return $this->descripcion; // Get es para mostar en un futuro
    }
            
    function setValor_compra($valor_compra) { 
        $this->valor_compra = $valor_compra; // Set es para capturar información en esa variable
    }
    function getValor_compra() { 
        return $this->valor_compra; // Get es para mostar en un futuro
    }
            
    function setValor_venta($valor_venta) { 
        $this->valor_venta = $valor_venta; // Set es para capturar información en esa variable
    }
    function getValor_venta() { 
        return $this->valor_venta; // Get es para mostar en un futuro
    }
            
    function setPorcentaje_comis($porcentaje_comis) { 
        $this->porcentaje_comis = $porcentaje_comis; // Set es para capturar información en esa variable
    }
    function getPorcentaje_comis() { 
        return $this->porcentaje_comis; // Get es para mostar en un futuro
    }
            
    function setValor_comi($valor_comi) { 
        $this->valor_comi = $valor_comi; // Set es para capturar información en esa variable
    }
    function getValor_comi() { 
        return $this->valor_comi; // Get es para mostar en un futuro
    }
            
    function setFecha($fecha) { 
        $this->fecha = $fecha; // Set es para capturar información en esa variable
    }
    function getFecha() { 
        return $this->fecha; // Get es para mostar en un futuro
    }

    function setNombre_archivo($nomarchivo) { 
        $this->nomarchivo = $nomarchivo; // Set es para capturar información en esa variable
    }
    function getNombre_archivo() { 
        return $this->nomarchivo; // Get es para mostar en un futuro
    }

    function setUbicfoto($ubicfoto) { 
        $this->ubicfoto = $ubicfoto; // Set es para capturar información en esa variable
    }
    function getUbicfoto() { 
        return $this->ubicfoto; // Get es para mostar en un futuro
    }
            
    function setCod_parner($cod_parner) { 
        $this->cod_parner = $cod_parner; // Set es para capturar información en esa variable
    }
    function getCod_parner() { 
        return $this->cod_parner; // Get es para mostar en un futuro
            }
    
    function setPos($pos) { 
        $this->pos = $pos; // Set es para capturar información en esa variable
    }
    function getPos() { 
        return $this->pos; // Get es para mostar en un futuro
    }
            
    // Variables Get y Set tb_usuario
    function setID_Usuario($id_usuario) { 
        $this->id_usuario = $id_usuario; // Set es para capturar información en esa variable
    }
    function getID_Usuario() { 
        return $this->id_usuario; // Get es para mostar en un futuro
    }
             
    function setNombre_u($nombre_u) { 
        $this->nombre_u = $nombre_u; // Set es para capturar información en esa variable
    }
    function getNombre_u() { 
        return $this->nombre_u; // Get es para mostar en un futuro
    }

    function setApellidos_u($apellidos_u) { 
        $this->apellidos_u = $apellidos_u; // Set es para capturar información en esa variable
    }
    function getApellidos_u() { 
        return $this->apellidos_u; // Get es para mostar en un futuro
    }

    function setTipodoc($tipoDoc) { 
        $this->tipoDoc = $tipoDoc; // Set es para capturar información en esa variable
    }
    function getTipodoc() { 
        return $this->tipoDoc; // Get es para mostar en un futuro
    }

    function setIdentificacion($identificacion) { 
        $this->identificacion = $identificacion; // Set es para capturar información en esa variable
    }
    function getIdentificacion() {
        return $this->identificacion; // Get es para mostar en un futuro
    }

    function setTelefono_u($telefono_u) { 
        $this->telefono_u = $telefono_u; // Set es para capturar información en esa variable
    }
    function getTelefono_u() { 
        return $this->telefono_u; // Get es para mostar en un futuro
    }

    function setLogin_usuario($login_usuario) { 
        $this->login_usuario = $login_usuario; // Set es para capturar información en esa variable
    }
    function getLogin_usuario() { 
        return $this->login_usuario; // Get es para mostar en un futuro
    }

    function setPassword_usuario($password_usuario) { 
        $this->password_usuario = $password_usuario; // Set es para capturar información en esa variable
    }
    function getPassword_usuario() { 
        return $this->password_usuario; // Get es para mostar en un futuro
    }

    function setID_Perfil($id_perfil) { 
        $this->id_perfil = $id_perfil; // Set es para capturar información en esa variable
    }
    function getID_Perfil() { 
        return $this->id_perfil; // Get es para mostar en un futuro
    }

    // Variables Get y Set tb_clientes
    function setID_Cliente($id_cliente) { 
        $this->id_cliente = $id_cliente; // Set es para capturar información en esa variable
    }
    function getID_Cliente() { 
        return $this->id_cliente; // Get es para mostar en un futuro
    }

    function setNombre_c($nombre_c) { 
        $this->nombre_c = $nombre_c; // Set es para capturar información en esa variable
    }
    function getNombre_c() { 
        return $this->nombre_c; // Get es para mostar en un futuro
    }

    function setApellidos_c($apellidos_c) { 
        $this->apellidos_c = $apellidos_c; // Set es para capturar información en esa variable
    }
    function getApellidos_c() { 
        return $this->apellidos_c; // Get es para mostar en un futuro
    }

    function setTipo_doc($tipo_doc) { 
        $this->tipo_doc = $tipo_doc; // Set es para capturar información en esa variable
            }
    function getTipo_doc() { 
        return $this->tipo_doc; // Get es para mostar en un futuro
    }

    function setNumdoc($num_doc) { 
        $this->num_doc = $num_doc; // Set es para capturar información en esa variable
    }
    function getNumdoc() { 
        return $this->num_doc; // Get es para mostar en un futuro
    }

    function setFechaNac($fecha_nac) { 
        $this->fecha_nac = $fecha_nac; // Set es para capturar información en esa variable
    }
    function getFechaNac() { 
        return $this->fecha_nac; // Get es para mostar en un futuro
    }

    function setDirCasa($dir_casa) { 
        $this->dir_casa = $dir_casa; // Set es para capturar información en esa variable
    }
    function getDirCasa() { 
        return $this->dir_casa; // Get es para mostar en un futuro
    }

    function setTelefono_c($telefono_c) { 
        $this->telefono_c = $telefono_c; // Set es para capturar información en esa variable
    }
    function getTelefono_c() { 
        return $this->telefono_c; // Get es para mostar en un futuro
    }

    function setCorreo_c($correo_c) { 
        $this->correo_c = $correo_c; // Set es para capturar información en esa variable
    }
    function getCorreo_c() { 
        return $this->correo_c; // Get es para mostar en un futuro
    }

    // Crear variables para formar un PDO (una extensión para acceder a bases de datos)
    public function __construct()
        {
            $dato = new conexion();
            $this -> host = $dato -> getHost(); 
            $this -> user = $dato -> getUser(); 
            $this -> pass = $dato -> getPass(); 
            $this -> database = $dato -> getDatabase(); 
        }
    // Función Validar Usuario
    // Con esto crearémos sesiones y harémos la página más segura
    // Ya no será necesario validar manualmente, ni crear tantas funciones de búsqueda de usuario por separadas
    // Ahora es una sola (pero dejaré las antiguas para comparar)   
    public function validar_usuario(clase_ingreso $logeo)                 
        {
            $verentrada = array();
            try { 
            // PDO creado
                $this -> con = new PDO('mysql:host='.$this->host.';dbname='.$this->database.';charset=utf8',$this->user,$this->pass);
            // Buscar login por medio de SQL
                $sql = 'SELECT id_usuario, login_usuario, password_usuario, nombre_usuario, apellido_usuario, id_perfil FROM tb_usuario WHERE login_usuario="'.$logeo->getLogin().'" and password_usuario="'.$logeo->getPassword().'"';
                // Ejecutar SQL
                $iniciarSQL = $this->con->prepare($sql);
                $iniciarSQL -> execute();

                while($row=$iniciarSQL->fetch()) {
                // Llenar las variables de clase_ingreso con los registros de la base de datos
                $id_usuario = $row['id_usuario'];
                $login_usuario = $row['login_usuario'];
                $password_usuario = $row['password_usuario'];
                $nombre_usuario = $row['nombre_usuario'];
                $apellido_usuario = $row['apellido_usuario'];
                $id_perfil = $row['id_perfil'];
                // Guardar todo en un array
                $verentrada[]= array('id_usuario'=>$id_usuario, 
                                     'login_usuario'=>$login, 
                                     'password_usuario'=>$password_usuario, 
                                     'nombre_usuario'=>$nombre_usuario,
                                     'apellido_usuario'=>$apellido_usuario,
                                     'id_perfil'=>$id_perfil);
                }
                // Codificar el array
                    $json_verentrada = json_encode($verentrada);
                    return $json_verentrada;
            }                                     
            // Si hay algun error
            catch (PDOException $ex) {
                die("Hubo un error al buscar datos del usuario:" . $ex -> getMessage());
            }
        }
    // Función Buscar Login    
    public function buscar_login(clase_ingreso $addusuario)                 
        {
            $verentrada = array();
            try { 
            // PDO creado
                $this -> con = new PDO('mysql:host='.$this->host.';dbname='.$this->database.';charset=utf8',$this->user,$this->pass);
            // Buscar login por medio de SQL
                $sql = 'SELECT login_usuario FROM tb_usuario WHERE login_usuario="'.$addusuario->getLogin().'"';
                // Ejecutar SQL
                $iniciarSQL = $this->con->prepare($sql);
                $iniciarSQL -> execute();

                while($row=$iniciarSQL->fetch()) {
                // Llenar las variables de clase_ingreso con los registros de la base de datos
                $login = $row['login_usuario'];
                // Guardar todo en un array
                $verentrada[]= array('login_usuario'=>$login);
                }
                // Codificar el array
                 $json_verentrada = json_encode($verentrada);
                 return $json_verentrada;
            }                                     
            // Si hay algun error
            catch (PDOException $ex) {
                die("Hubo un error al buscar login:" . $ex -> getMessage());
            }
        }
    // Función Buscar Password    
    public function buscar_password(clase_ingreso $buscar)                 
        {
            $verentrada = array();
            try { 
            // PDO creado
                $this -> con = new PDO('mysql:host='.$this->host.';dbname='.$this->database.';charset=utf8',$this->user,$this->pass);
            // Buscar password por medio de SQL
                $sql = 'SELECT password_usuario FROM tb_usuario WHERE login_usuario="'.$buscar->getLogin().'"';
                // Ejecutar SQL
                $iniciarSQL = $this->con->prepare($sql);
                $iniciarSQL -> execute();

                while($row=$iniciarSQL->fetch()) {
                // Llenar las variables de clase_ingreso con los registros de la base de datos
                $password = $row['password_usuario'];
                // Guardar todo en un array
                $verentrada[]= array('password_usuario'=>$password);
                }
                // Codificar el array
                 $json_verentrada = json_encode($verentrada);
                 return $json_verentrada;
            }                                     
            // Si hay algun error
            catch (PDOException $ex) {
                die("Hubo un error al buscar contraseña:" . $ex -> getMessage());
            }
        }
    // Función Buscar ID Perfíl   
    public function buscar_id_perfil(clase_ingreso $buscar)                 
        {
            $verentrada = array();
            try { 
            // PDO creado
                $this -> con = new PDO('mysql:host='.$this->host.';dbname='.$this->database.';charset=utf8',$this->user,$this->pass);
            // Buscar ID Perfíl por medio de SQL
                $sql = 'SELECT id_perfil FROM tb_usuario WHERE login_usuario="'.$buscar->getLogin().'"';
                // Ejecutar SQL
                $iniciarSQL = $this->con->prepare($sql);
                $iniciarSQL -> execute();

                while($row=$iniciarSQL->fetch()) {
                // Llenar las variables de clase_ingreso con los registros de la base de datos
                $id_perfil = $row['id_perfil'];
                // Guardar todo en un array
                $verentrada[]= array('id_perfil'=>$id_perfil);
                }
                # Codificar el array
                 $json_verentrada = json_encode($verentrada);
                 return $json_verentrada;
            }                                     
            // Si hay algun error
            catch (PDOException $ex) {
                die("Hubo un error al buscar ID Perfíl:" . $ex -> getMessage());
            }
        }
    // Función Buscar Nombre Completo Usuario
    public function buscar_nombre_completo(clase_ingreso $buscar)
        {
            $verentrada = array();
            try { 
            // PDO creado
                $this -> con = new PDO('mysql:host='.$this->host.';dbname='.$this->database.';charset=utf8',$this->user,$this->pass);
            // Buscar nombre completo por medio de SQL
                $sql = 'SELECT nombre_usuario, apellido_usuario FROM tb_usuario WHERE login_usuario="'.$buscar->getLogin_usuario().'"';
                // Ejecutar SQL
                $iniciarSQL = $this->con->prepare($sql);
                $iniciarSQL -> execute();

                while($row=$iniciarSQL->fetch()) {
                // Llenar las variables de clase_ingreso con los registros de la base de datos que encontró
                $nombre_u = $row['nombre_usuario'];
                $apellidos_u = $row['apellido_usuario'];
                # Guardar todo en un array
                $verentrada[]= array('nombre_usuario'=>$nombre_u,
                                     'apellido_usuario'=>$apellidos_u);
                }
                // Codificar el array
                 $json_verentrada = json_encode($verentrada);
                 return $json_verentrada;
            }                                     
           
            // Si hay algun error
            catch (PDOException $ex) {
                die("Hubo un error al buscar el nombre completo del usuario:" . $ex -> getMessage());
            }
        }
                
    // Función Crear Producto    
    public function Consulta_crear_producto(clase_ingreso $addproducto)                 
        {
            $verentrada = array();
            try { 
            // PDO creado
                $this -> con = new PDO('mysql:host='.$this->host.';dbname='.$this->database.';charset=utf8',$this->user,$this->pass);
            // Insertar producto por medio de SQL
                $sql = 'INSERT INTO tb_producto(nombre, grupo_prod, tipo_prod, descripcion, valor_compra, valor_venta, porcentaje_comis, valor_comi, fecha, nomarchivo, ubicfoto, cod_parner, pos) VALUES("'.$addproducto->getNombre_prod().'","'.$addproducto->getGrupo_prod().'","'.$addproducto->getTipo_prod().'","'.$addproducto->getDescripcion().'",'.$addproducto->getValor_compra().','.$addproducto->getValor_venta().','.$addproducto->getPorcentaje_comis().','.$addproducto->getValor_comi().',"'.$addproducto->getFecha().'","'.$addproducto->getNombre_archivo().'","'.$addproducto->getUbicfoto().'","'.$addproducto->getCod_parner().'",'.$addproducto->getPos().')';

                $iniciarSQL = $this->con->prepare($sql);
                $iniciarSQL -> execute();                        
            }
            // Si hay algun error
            catch (PDOException $ex) {
                die("Hubo un error al crear el producto:".$ex -> getMessage());
            }
        }    
   // Función Buscar Producto
    public function Consulta_buscar_producto(clase_ingreso $buscar)                 
        {
            $verentrada = array();
            try { 
            // PDO creado
                $this -> con = new PDO('mysql:host='.$this->host.';dbname='.$this->database.';charset=utf8',$this->user,$this->pass);
            // Buscar producto por medio de SQL
                $sql = 'SELECT nombre, grupo_prod, tipo_prod, descripcion, valor_compra, valor_venta, porcentaje_comis, valor_comi, fecha, nomarchivo, ubicfoto, cod_parner, pos FROM tb_producto WHERE codigo_prod='.$buscar->getCodigo_prod();
                // Ejecutar SQL
                $iniciarSQL = $this->con->prepare($sql);
                $iniciarSQL -> execute();
                // Fetch = si ha posido recuperar información
                while($row=$iniciarSQL->fetch()) {
                // Llenar las variables de clase_ingreso con los registros de la base de datos que encontró
                $nombre = $row['nombre'];
                $grupo_prod = $row['grupo_prod'];
                $tipo_prod = $row['tipo_prod'];
                $descripcion = $row['descripcion'];
                $valor_compra = $row['valor_compra'];
                $valor_venta = $row['valor_venta'];
                $porcentaje_comis = $row['porcentaje_comis'];
                $valor_comi = $row['valor_comi'];
                $fecha = $row['fecha'];
                $nomarchivo = $row['nomarchivo'];
                $ubicfoto = $row['ubicfoto'];
                $cod_parner = $row['cod_parner'];
                $pos = $row['pos'];
                // Guardar todo en un array
                $verentrada[]= array('nombre'=>$nombre,
                                     'grupo_prod'=>$grupo_prod,
                                     'tipo_prod'=>$tipo_prod,
                                     'descripcion'=>$descripcion,
                                     'valor_compra'=>$valor_compra,
                                     'valor_venta'=>$valor_venta,
                                     'porcentaje_comis'=>$porcentaje_comis,
                                     'valor_comi'=>$valor_comi, 
                                     'fecha'=>$fecha,
                                     'nomarchivo'=>$nomarchivo,
                                     'ubicfoto'=>$ubicfoto, 
                                     'cod_parner'=>$cod_parner, 
                                     'pos'=>$pos);
                }
                // Codificar el array
                 $json_verentrada = json_encode($verentrada);
                 return $json_verentrada;
            }                                     
           
            // Si hay algun error
            catch (PDOException $ex) {
                die("Hubo un error al buscar el producto:" . $ex -> getMessage());
            }  
        }
   // Función Editar Producto
    public function Consulta_editar_producto(clase_ingreso $editar)
    
    {
            $verentrada = array();
            try { 
            // PDO creado
                $this -> con = new PDO('mysql:host='.$this->host.';dbname='.$this->database.';charset=utf8',$this->user,$this->pass);
            // Insertar producto por medio de SQL
                $sql = 'UPDATE tb_producto SET nombre="'.$editar->getNombre_prod().'", grupo_prod="'.$editar->getGrupo_prod().'", tipo_prod="'.$editar->getTipo_prod().'", descripcion="'.$editar->getDescripcion().'", valor_compra='.$editar->getValor_compra().', valor_venta='.$editar->getValor_venta().', porcentaje_comis='.$editar->getPorcentaje_comis().', valor_comi='.$editar->getValor_comi().', fecha="'.$editar->getFecha().'", nomarchivo="'.$editar->getNombre_archivo().'", ubicfoto="'.$editar->getUbicfoto().'", cod_parner="'.$editar->getCod_parner().'", pos='.$editar->getPos().' WHERE codigo_prod='.$editar->getCodigo_prod();
                // Ejecutar SQL
                $iniciarSQL = $this->con->prepare($sql);
                $iniciarSQL -> execute();
            }                                     
           
            // Si hay algun error
            catch (PDOException $ex) {
                die("Hubo un error al editar el producto " . $ex -> getMessage());
            }  
        }    
    // Función Borrar Producto    
    public function Consulta_eliminar_producto(clase_ingreso $borrar)                 
        {
            $verentrada = array();
            try { 
            // PDO creado
                $this -> con = new PDO('mysql:host='.$this->host.';dbname='.$this->database.';charset=utf8',$this->user,$this->pass);
            // Borrar producto por medio de SQL
                $sql = 'DELETE FROM tb_producto WHERE codigo_prod='.$borrar->getCodigo_prod();

                $iniciarSQL = $this->con->prepare($sql);
                $iniciarSQL -> execute();                        
            }
            // Si hay algun error
            catch (PDOException $ex) {
                die("Hubo un error al borrar el producto:".$ex -> getMessage());
            }
        }
    // Función Mostrar Productos
    public function ver_productos()                 
        {
            $verentrada = array();
            try { 
            // PDO creado
                $this -> con = new PDO('mysql:host='.$this->host.';dbname='.$this->database.';charset=utf8',$this->user,$this->pass);
            // Buscar todos los productos por medio de SQL
                $sql = 'SELECT codigo_prod, nombre, grupo_prod, tipo_prod, descripcion, valor_compra, valor_venta, porcentaje_comis, valor_comi, fecha, nomarchivo, ubicfoto, cod_parner, pos FROM tb_producto';
                // Ejecutar SQL
                $iniciarSQL = $this->con->prepare($sql);
                $iniciarSQL -> execute();
                // Fetch = si ha posido recuperar información
                while($row=$iniciarSQL->fetch()) {
                // Llenar las variables de clase_ingreso con los registros de la base de datos que encontró
                $codigo_prod = $row['codigo_prod'];
                $nombre = $row['nombre'];
                $grupo_prod = $row['grupo_prod'];
                $tipo_prod = $row['tipo_prod'];
                $descripcion = $row['descripcion'];
                $valor_compra = $row['valor_compra'];
                $valor_venta = $row['valor_venta'];
                $porcentaje_comis = $row['porcentaje_comis'];
                $valor_comi = $row['valor_comi'];
                $fecha = $row['fecha'];
                $nomarchivo = $row['nomarchivo'];
                $ubicfoto = $row['ubicfoto'];
                $cod_parner = $row['cod_parner'];
                $pos = $row['pos'];
                // Guardar todo en un array
                $verentrada[]= array('codigo_prod'=>$codigo_prod,
                                     'nombre'=>$nombre,
                                     'grupo_prod'=>$grupo_prod,
                                     'tipo_prod'=>$tipo_prod,
                                     'descripcion'=>$descripcion,
                                     'valor_compra'=>$valor_compra,
                                     'valor_venta'=>$valor_venta,
                                     'porcentaje_comis'=>$porcentaje_comis,
                                     'valor_comi'=>$valor_comi, 
                                     'fecha'=>$fecha, 
                                     'nomarchivo'=>$nomarchivo, 
                                     'ubicfoto'=>$ubicfoto, 
                                     'cod_parner'=>$cod_parner, 
                                     'pos'=>$pos);
                }
                // Codificar el array
                 $json_verentrada = json_encode($verentrada);
                 return $json_verentrada;
            }                                     
           
            // Si hay algun error
            catch (PDOException $ex) {
                die("Hubo un error al buscar todos los productos:" . $ex -> getMessage());
            }  
        }

    // Función Crear Usuario    
    public function Consulta_crear_usuario(clase_ingreso $addusuario)                 
        {
            $verentrada = array();
            try { 
            // PDO creado
                $this -> con = new PDO('mysql:host='.$this->host.';dbname='.$this->database.';charset=utf8',$this->user,$this->pass);
            // Insertar usuario por medio de SQL
                $sql = 'INSERT INTO tb_usuario(nombre_usuario, apellido_usuario, tipo_doc, identificacion, telefono_u, login_usuario, password_usuario, id_perfil) VALUES("'.$addusuario->getNombre_u().'","'.$addusuario->getApellidos_u().'","'.$addusuario->getTipodoc().'","'.$addusuario->getIdentificacion().'","'.$addusuario->getTelefono_u().'","'.$addusuario->getLogin_usuario().'","'.$addusuario->getPassword_usuario().'","'.$addusuario->getID_Perfil().'")';
                $iniciarSQL = $this->con->prepare($sql);
                $iniciarSQL -> execute();                        
            }
            // Si hay algun error
            catch (PDOException $ex) {
            	die("Hubo un error al crear el usuario:" . $ex -> getMessage());
            }
        }

    // Función Buscar Usuario
    public function Consulta_buscar_usuario(clase_ingreso $buscar)                 
        {
            $verentrada = array();
            try { 
            // PDO creado
                $this -> con = new PDO('mysql:host='.$this->host.';dbname='.$this->database.';charset=utf8',$this->user,$this->pass);
            // Insertar usuario por medio de SQL
                $sql = 'SELECT nombre_usuario, apellido_usuario, tipo_doc, identificacion, telefono_u, login_usuario, password_usuario, id_perfil FROM tb_usuario WHERE id_usuario='.$buscar->getID_Usuario();
                // Ejecutar SQL
                $iniciarSQL = $this->con->prepare($sql);
                $iniciarSQL -> execute();

                while($row=$iniciarSQL->fetch()) {
                // Llenar las variables de clase_ingreso con los registros de la base de datos que encontró
                $nombre_u = $row['nombre_usuario'];
                $apellidos_u = $row['apellido_usuario'];
                $tipo_doc = $row['tipo_doc'];
                $identificacion = $row['identificacion'];
                $telefono_u = $row['telefono_u'];
                $login_usuario = $row['login_usuario'];
                $password_usuario = $row['password_usuario'];
                $id_perfil = $row['id_perfil'];
                // Guardar todo en un array
                $verentrada[]= array('nombre_usuario'=>$nombre_u,
                                     'apellido_usuario'=>$apellidos_u,
                                     'tipo_doc'=>$tipo_doc,
                                     'identificacion'=>$identificacion,
                                     'telefono_u'=>$telefono_u,
                                     'login_usuario'=>$login_usuario,
                                     'password_usuario'=>$password_usuario,
                                     'id_perfil'=>$id_perfil);
                }
                // Codificar el array
                 $json_verentrada = json_encode($verentrada);
                 return $json_verentrada;
            }                                     
           
            // Si hay algun error
            catch (PDOException $ex) {
                die("Hubo un error al buscar el usuario:" . $ex -> getMessage());
            }
        }
    // Función Editar Usuario
    public function Consulta_editar_usuario(clase_ingreso $editar)
    {
            $verentrada = array();
            try { 
            // PDO creado
                $this -> con = new PDO('mysql:host='.$this->host.';dbname='.$this->database.';charset=utf8',$this->user,$this->pass);
            // Actualizar usuario por medio de SQL
                $sql = 'UPDATE tb_usuario SET nombre_usuario="'.$editar->getNombre_u().'", apellido_usuario="'.$editar->getApellidos_u().'", tipo_doc="'.$editar->getTipodoc().'", identificacion='.$editar->getIdentificacion().', telefono_u="'.$editar->getTelefono_u().'", login_usuario="'.$editar->getLogin_usuario().'", password_usuario="'.$editar->getPassword_usuario().'", id_perfil="'.$editar->getID_Perfil().'" WHERE id_usuario='.$editar->getID_Usuario();
                // Ejecutar SQL
                $iniciarSQL = $this->con->prepare($sql);
                $iniciarSQL -> execute();
            }                                     
           
            // Si hay algun error
            catch (PDOException $ex) {
                die("Hubo un error al editar el usuario: " . $ex -> getMessage());
            }  
        }
    // Función Borrar Usuario    
    public function Consulta_eliminar_usuario(clase_ingreso $borrar)                 
        {
            $verentrada = array();
            try { 
            // PDO creado
                $this -> con = new PDO('mysql:host='.$this->host.';dbname='.$this->database.';charset=utf8',$this->user,$this->pass);
            // Borrar usuario por medio de SQL
                $sql = 'DELETE FROM tb_usuario WHERE id_usuario='.$borrar->getID_Usuario();

                $iniciarSQL = $this->con->prepare($sql);
                $iniciarSQL -> execute();                        
            }
            // Si hay algun error
            catch (PDOException $ex) {
                die("Hubo un error al borrar el usuario:".$ex -> getMessage());
            }
        }
    // Función Mostrar Usuarios
    public function ver_usuarios()                 
        {
            $verentrada = array();
            try { 
            // PDO creado
                $this -> con = new PDO('mysql:host='.$this->host.';dbname='.$this->database.';charset=utf8',$this->user,$this->pass);
            // Mostrar usuarios por medio de SQL
                $sql = 'SELECT id_usuario, nombre_usuario, apellido_usuario, tipo_doc, identificacion, telefono_u, login_usuario, password_usuario, id_perfil FROM tb_usuario';
                // Ejecutar SQL
                $iniciarSQL = $this->con->prepare($sql);
                $iniciarSQL -> execute();

                while($row=$iniciarSQL->fetch()) {
                // Llenar las variables de clase_ingreso con los registros de la base de datos que encontró
                $id_usuario = $row['id_usuario'];
                $nombre_u = $row['nombre_usuario'];
                $apellidos_u = $row['apellido_usuario'];
                $tipo_doc = $row['tipo_doc'];
                $identificacion = $row['identificacion'];
                $telefono_u = $row['telefono_u'];
                $login_usuario = $row['login_usuario'];
                $password_usuario = $row['password_usuario'];
                $id_perfil = $row['id_perfil'];
                // Guardar todo en un array
                $verentrada[]= array('id_usuario'=>$id_usuario,
                                     'nombre_usuario'=>$nombre_u,
                                     'apellido_usuario'=>$apellidos_u,
                                     'tipo_doc'=>$tipo_doc,
                                     'identificacion'=>$identificacion,
                                     'telefono_u'=>$telefono_u,
                                     'login_usuario'=>$login_usuario,
                                     'password_usuario'=>$password_usuario,
                                     'id_perfil'=>$id_perfil);
                }
                // Codificar el array
                 $json_verentrada = json_encode($verentrada);
                 return $json_verentrada;
            }                                     
           
            // Si hay algun error
            catch (PDOException $ex) {
                die("Hubo un error mostrar usuarios:" . $ex -> getMessage());
            }
        }

    // Función Crear Cliente    
    public function Consulta_crear_cliente(clase_ingreso $addusuario)                 
        {
            $verentrada = array();
            try { 
            // PDO creado
                $this -> con = new PDO('mysql:host='.$this->host.';dbname='.$this->database.';charset=utf8',$this->user,$this->pass);
            // Insertar cliente por medio de SQL
                $sql = 'INSERT INTO tb_clientes(nombre_c, apellido_c, tipo_doc, num_doc, fecha_nac, dir_casa, telefono_c, correo_c) VALUES("'.$addusuario->getNombre_c().'","'.$addusuario->getApellidos_c().'","'.$addusuario->getTipo_doc().'",'.$addusuario->getNumdoc().',"'.$addusuario->getFechaNac().'","'.$addusuario->getDirCasa().'","'.$addusuario->getTelefono_c().'","'.$addusuario->getCorreo_c().'")';
                $iniciarSQL = $this->con->prepare($sql);
                $iniciarSQL -> execute();                        
            }
            // Si hay algun error
            catch (PDOException $ex) {
                die("Hubo un error al crear el cliente:" . $ex -> getMessage());
            }
        }
    // Función Buscar Cliente
    public function Consulta_buscar_cliente(clase_ingreso $buscar)                 
        {
            $verentrada = array();
            try { 
            // PDO creado
                $this -> con = new PDO('mysql:host='.$this->host.';dbname='.$this->database.';charset=utf8',$this->user,$this->pass);
            // Insertar usuario por medio de SQL
                $sql = 'SELECT nombre_c, apellido_c, tipo_doc, num_doc, fecha_nac, dir_casa, telefono_c, correo_c FROM tb_clientes WHERE id_cliente='.$buscar->getID_Cliente();
                // Ejecutar SQL
                $iniciarSQL = $this->con->prepare($sql);
                $iniciarSQL -> execute();
                // Fetch = si ha posido recuperar información
                while($row=$iniciarSQL->fetch()) {
                // Llenar las variables de Clase_buscarUsuario con los registros de la base de datos que encontró
                $nombre_c = $row['nombre_c'];
                $apellido_c = $row['apellido_c'];
                $tipo_doc = $row['tipo_doc'];
                $num_doc = $row['num_doc'];
                $fecha_nac = $row['fecha_nac'];
                $dir_casa = $row['dir_casa'];
                $telefono_c = $row['telefono_c'];
                $correo_c = $row['correo_c'];
                // Guardar todo en un array
                $verentrada[]= array('nombre_c'=>$nombre_c,
                                     'apellido_c'=>$apellido_c,
                                     'tipo_doc'=>$tipo_doc,
                                     'num_doc'=>$num_doc,
                                     'fecha_nac'=>$fecha_nac,
                                     'dir_casa'=>$dir_casa,
                                     'telefono_c'=>$telefono_c,
                                     'correo_c'=>$correo_c);
                }
                // Codificar el array
                 $json_verentrada = json_encode($verentrada);
                 return $json_verentrada;
            }                                     
            // Si hay algun error
            catch (PDOException $ex) {
                die("Hubo un error al buscar el usuario:" . $ex -> getMessage());
            }
        }
    // Función Editar Cliente
    public function Consulta_editar_cliente(clase_ingreso $editar)
    {
            $verentrada = array();
            try { 
            // PDO creado
                $this -> con = new PDO('mysql:host='.$this->host.';dbname='.$this->database.';charset=utf8',$this->user,$this->pass);
            // Actualizar cliente por medio de SQL
                $sql = 'UPDATE tb_clientes SET nombre_c="'.$editar->getNombre_c().'", apellido_c="'.$editar->getApellidos_c().'", tipo_doc="'.$editar->getTipo_doc().'", num_doc='.$editar->getNumdoc().', fecha_nac="'.$editar->getFechaNac().'", dir_casa="'.$editar->getDirCasa().'", telefono_c="'.$editar->getTelefono_c().'", correo_c="'.$editar->getCorreo_c().'" WHERE id_cliente='.$editar->getID_Cliente();
                // Ejecutar SQL
                $iniciarSQL = $this->con->prepare($sql);
                $iniciarSQL -> execute();
            }                                     
           
            // Si hay algun error
            catch (PDOException $ex) {
                die("Hubo un error al editar el cliente: " . $ex -> getMessage());
            }  
        }
    // Función Borrar Cliente    
    public function Consulta_eliminar_cliente(clase_ingreso $borrar)                 
        {
            $verentrada = array();
            try { 
            // PDO creado
                $this -> con = new PDO('mysql:host='.$this->host.';dbname='.$this->database.';charset=utf8',$this->user,$this->pass);
            // Borrar cliente por medio de SQL
                $sql = 'DELETE FROM tb_clientes WHERE id_cliente='.$borrar->getID_Cliente();

                $iniciarSQL = $this->con->prepare($sql);
                $iniciarSQL -> execute();                        
            }
            // Si hay algun error
            catch (PDOException $ex) {
                die("Hubo un error al borrar el cliente:".$ex -> getMessage());
            }
        }
    // Función Mostrar Clientes
    public function ver_clientes()                 
        {
            $verentrada = array();
            try { 
            // PDO creado
                $this -> con = new PDO('mysql:host='.$this->host.';dbname='.$this->database.';charset=utf8',$this->user,$this->pass);
            // Insertar usuario por medio de SQL
                $sql = 'SELECT id_cliente, nombre_c, apellido_c, tipo_doc, num_doc, fecha_nac, dir_casa, telefono_c, correo_c FROM tb_clientes';
                // Ejecutar SQL
                $iniciarSQL = $this->con->prepare($sql);
                $iniciarSQL -> execute();
                // Fetch = si ha posido recuperar información
                while($row=$iniciarSQL->fetch()) {
                // Llenar las variables de Clase_buscarUsuario con los registros de la base de datos que encontró
                $id_cliente = $row['id_cliente'];    
                $nombre_c = $row['nombre_c'];
                $apellido_c = $row['apellido_c'];
                $tipo_doc = $row['tipo_doc'];
                $num_doc = $row['num_doc'];
                $fecha_nac = $row['fecha_nac'];
                $dir_casa = $row['dir_casa'];
                $telefono_c = $row['telefono_c'];
                $correo_c = $row['correo_c'];
                // Guardar todo en un array
                $verentrada[]= array('id_cliente'=>$id_cliente,
                                     'nombre_c'=>$nombre_c,
                                     'apellido_c'=>$apellido_c,
                                     'tipo_doc'=>$tipo_doc,
                                     'num_doc'=>$num_doc,
                                     'fecha_nac'=>$fecha_nac,
                                     'dir_casa'=>$dir_casa,
                                     'telefono_c'=>$telefono_c,
                                     'correo_c'=>$correo_c);
                }
                // Codificar el array
                 $json_verentrada = json_encode($verentrada);
                 return $json_verentrada;
            }                                     
            // Si hay algun error
            catch (PDOException $ex) {
                die("Hubo un error al mostrar usuarios:" . $ex -> getMessage());
            }
        }
}
?>