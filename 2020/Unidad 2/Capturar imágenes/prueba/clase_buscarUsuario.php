<!-- Esta es la página o hoja de ingreso PHP -->
<!-- Toda variable en PHP empieza con $-->
<!-- Toda acción en PHP termina con ;-->

<?php  
        class clase_buscarUsuario {  //Debí llamar la "clase_ingreso.php"
            // Definir variables (Cada una tendrá dos subvariables "Get" y "Set")
            private $Codigo_u;
            private $nombre;
            private $apellidos;
            private $correo;

            private $cod_p;
            private $nombre_p;
            private $foto;
            private $precio;
            // Variables Get y Set
            function setCodigo_u($Codigo_u) { 
                $this->Codigo_u = $Codigo_u; // Set es para capturar información en esa variable
            }
            function getCodigo_u() { 
                return $this->Codigo_u; // Get es para mostar en un futuro
            }

            function setNombre($nombre) { 
                $this->nombre = $nombre; // Set es para capturar información en esa variable
            }
            function getNombre() { 
                return $this->nombre; // Get es para mostar en un futuro
            }

            function setApellidos($apellidos) { 
                $this->apellidos = $apellidos; // Set es para capturar información en esa variable
            }
            function getApellidos() { 
                return $this->apellidos; // Get es para mostar en un futuro
            }

            function setCorreo($correo) { 
                $this->correo = $correo; // Set es para capturar información en esa variable
            }
            function getCorreo() { 
                return $this->correo; // Get es para mostar en un futuro
            }

            // Funciones Get y Set de tb_productos
            function setCod_p($cod_p) { 
                $this->cod_p = $cod_p; //Set es para capturar información en esa variable
            }
            function getCod_p() { 
                return $this->cod_p; //Get es para mostar en un futuro
            }
            
            function setNombre_p($nombre_p) { 
                $this->nombre_p = $nombre_p; //Set es para capturar información en esa variable
            }
            function getNombre_p() { 
                return $this->nombre_p; //Get es para mostar en un futuro
            }

            function setFoto($foto) { 
                $this->foto = $foto; //Set es para capturar información en esa variable
            }
            function getFoto() { 
                return $this->foto; //Get es para mostar en un futuro
            }

            function setPrecio($precio) { 
                $this->precio = $precio; //Set es para capturar información en esa variable
            }
            function getPrecio() { 
                return $this->precio; //Get es para mostar en un futuro
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
            // Función crear Usuario
            // Pendiente...    
            // Función buscar Usuario    
			public function buscar_usuario(clase_buscarUsuario $buscar) {
				$verentrada = array();
				try {
					// PDO creado
					$this ->con  =new PDO('mysql:host='.$this->host.';dbname='.$this->database.';charset=utf8',$this->user,$this->pass);
					// Buscar usuario por medio de SQL
					$sql = 'SELECT Codigo_u, nombre_u, apellido_u, correo FROM usuario_prueba Where Codigo_u= "'.$buscar->getCodigo_u().'"order by apellido_u';
					// Ejecutar SQL
					$iniciarSQL = $this->con->prepare($sql);
                    $iniciarSQL -> execute();

                  	while($row=$iniciarSQL->fetch()) {
                  		// Llenar las variables de Clase_buscarUsuario con los registros de la base de datos
                  		$Codigo_u = $row['Codigo_u'];
                  		$nombre= $row['nombre_u'];
                  		$apellidos = $row['apellido_u'];
                  		$correo = $row['correo'];
                  		//Guardar todo en un array
                  		$verentrada[]= array('Codigo_u'=>$Codigo_u,'nombre_u'=>$nombre,'apellido_u'=>$apellido,'correo'=>$correo);
					}
					$json_verentrada = json_encode($verentrada);
					return $json_verentrada;
				}
				// Si hubo un error
				catch (PDOException $ex) {
					die("Hubo un error en la busqueda:".$ex->getMessage());
				}
			}
            // Función Actualizar Usuario
            Public function Consulta_actualizar_usuario(clase_buscarUsuario $addusuario){
                $verentrada = array();

                try {
                    // PDO Creado
                    $this->con = new PDO('mysql:host='.$this->host.';dbname='.$this->database.';charset=utf8',$this->user,$this->pass);
                    // Actualizar mediante SQL
                    $sql = 'UPDATE usuario_prueba SET nombre_u="'.$addusuario->getNombre().'",apellido_u="'.$addusuario->getApellidos().'",correo="'.$addusuario->getCorreo().'" WHERE Codigo_u='.$addusuario->getCodigo_u();
                    $iniciarSQL=$this->con->prepare($sql);
                    $iniciarSQL->execute();
                }
                // Si hubo un error
                catch (PDOException $ex) {
                    die("Hubo un error en la actualización:".$ex->getMessage());
                }
            }
            // Función Mostrar Usuarios
            Public function ver_usuarios(){
                $verentrada = array();

                try {
                    //PDO Creado
                    $this->con = new PDO('mysql:host='.$this->host.';dbname='.$this->database.';charset=utf8',$this->user,$this->pass);
                    //Actualizar mediante SQL
                    $sql = 'SELECT Codigo_u, nombre_u, apellido_u, correo FROM usuario_prueba order by apellido_u';
                    $iniciarSQL = $this->con->prepare($sql);
                    $iniciarSQL -> execute();

                while($row=$iniciarSQL->fetch()) {
                        //Llenar las variables de Clase_buscarUsuario con los registros de la base de datos
                        $Codigo_u = $row['Codigo_u'];
                        $nombre = $row['nombre_u'];
                        $apellido = $row['apellido_u'];
                        $correo = $row['correo'];
                        //Guardar todo en un array
                        $verentrada[]= array('Codigo_u'=>$Codigo_u,
                                             'nombre_u'=>$nombre,
                                             'apellido_u'=>$apellido,
                                             'correo'=>$correo);
                    }
                    $json_verentrada = json_encode($verentrada);
                    return $json_verentrada;
                }
                // Si hubo un error
                catch (PDOException $ex) {
                    die("Hubo un error para mostar usuarios:".$ex->getMessage());
                }
            }

            // Función Crear Producto
            Public function Consulta_crear_producto(clase_buscarUsuario $addproducto){
                $verentrada = array();

                try {
                    // PDO Creado
                    $this->con = new PDO('mysql:host='.$this->host.';dbname='.$this->database.';charset=utf8',$this->user,$this->pass);
                    // Crear mediante SQL
                    $sql = 'INSERT INTO productos_prueba(nombre, foto, precio) VALUES ("'.$addproducto->getNombre_p().'", "'.$addproducto->getFoto().'", '.$addproducto->getPrecio().')';
                    // Ejecutar SQL
                    $iniciarSQL=$this->con->prepare($sql);
                    $iniciarSQL->execute();
                }
                // Si hubo un error
                catch (PDOException $ex) {
                    die("Hubo un error al crear el producto:".$ex->getMessage());
                }
            }
            // Función Mostrar Productos
            Public function ver_productos(){
                $verentrada = array();

                try {
                    //PDO Creado
                    $this->con = new PDO('mysql:host='.$this->host.';dbname='.$this->database.';charset=utf8',$this->user,$this->pass);
                    //Actualizar mediante SQL
                    $sql = 'SELECT cod_p, nombre, foto, precio FROM productos_prueba';
                    $iniciarSQL = $this->con->prepare($sql);
                    $iniciarSQL -> execute();

                while($row=$iniciarSQL->fetch()) {
                        //Llenar las variables de Clase_buscarUsuario con los registros de la base de datos
                        $cod_p = $row['cod_p'];
                        $nombre = $row['nombre'];
                        $foto = $row['foto'];
                        $precio = $row['precio'];
                        //Guardar todo en un array
                        $verentrada[]= array('cod_p'=>$cod_p,
                                             'nombre'=>$nombre,
                                             'foto'=>$foto,
                                             'precio'=>$precio);
                    }
                    $json_verentrada = json_encode($verentrada);
                    return $json_verentrada;
                }
                // Si hubo un error
                catch (PDOException $ex) {
                    die("Hubo un error para mostar productos:".$ex->getMessage());
                }
            }
		}
?>