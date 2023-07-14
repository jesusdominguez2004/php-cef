<!-- Esta es la página o hoja de ingreso PHP -->
<!-- Toda variable en PHP empieza con $-->
<!-- Toda acción en PHP termina con ;-->

<?php
		//**usuario_prueba (Tabla)**//    
        class clase_buscarUsuario { 
            //Definir variables (Cada una tendrá dos subvariables "Get" y "Set")
            private $Codigo_u;
            private $nombre;
            private $apellidos;
            private $correo;

            //Variables Get y Set
            function setCodigo_u($Codigo_u) { 
                $this->Codigo_u = $Codigo_u; //Set es para capturar información en esa variable
            }
            function getCodigo_u() { 
                return $this->Codigo_u; //Get es para mostar en un futuro
            }

            function setNombre($nombre) { 
                $this->nombre = $nombre; //Set es para capturar información en esa variable
            }
            function getNombre() { 
                return $this->nombre; //Get es para mostar en un futuro
            }

            function setApellidos($apellidos) { 
                $this->apellidos = $apellidos; //Set es para capturar información en esa variable
            }
            function getApellidos() { 
                return $this->apellidos_u; //Get es para mostar en un futuro
            }

            function setCorreo($correo) { 
                $this->correo = $correo; //Set es para capturar información en esa variable
            }
            function getCorreo() { 
                return $this->correo; //Get es para mostar en un futuro
            }

           
			//Crear variables para formar un PDO (una extensión para acceder a bases de datos)
            public function __construct()
                {
                    $dato = new conexion();
                    $this -> host = $dato -> getHost(); 
                    $this -> user = $dato -> getUser(); 
                    $this -> pass = $dato -> getPass(); 
                    $this -> database = $dato -> getDatabase(); 
                }

			public function buscar_usuario(clase_buscarUsuario $buscar) {
				$verentrada = array();
				try {
					//PDO creado
					$this ->con  =new PDO('mysql:host='.$this->host.';dbname='.$this->database.';charset=utf8',$this->user,$this->pass);
					//Buscar usuario por medio de SQL
					$sql = 'SELECT Codigo_u, nombre_u, apellido_u, correo FROM usuario_prueba Where Codigo_u= "'.$buscar->getCodigo_u().'"order by apellido_u';
					//Ejecutar SQL
					$iniciarSQL = $this->con->prepare($sql);
                    $iniciarSQL -> execute();

                  	while($row=$iniciarSQL->fetch()) {
                  		//Llenar las variables de Clase_buscarUsuario con los registros de la base de datos
                  		$Codigo_u = $row['Codigo_u'];
                  		$nombre_u = $row['nombre_u'];
                  		$apellidos_u = $row['apellido_u'];
                  		$correo = $row['correo'];
                  		//
                  		$verentrada[]= array('Codigo_u'=>$Codigo_u,'nombre_u'=>$nombre_u,'apellido_u'=>$apellidos_u,'correo'=>$correo);
					}
					$json_verentrada = json_encode($verentrada);
					return $json_verentrada;
				}
				//Si hubo un error
				catch (PDOException $ex) {
					die("Hubo un error en la busqueda:".$ex->getMessage());
				}
			}
		}
?>