<!-- Esta es la página o hoja de ingreso PHP -->
<!-- Toda variable en PHP empieza con $-->
<!-- Toda acción en PHP termina con ;-->
        
        <?php
        //**tb_clientes**//    
        class clase_ingreso { 
            //Definir variables (Cada una tendrá dos subvariables "Get" y "Set")
            private $Codigo_u;
            private $nombre;
            private $apellidos;
            private $tipoDoc;
            private $numDoc;
            private $dirección;
            private $correo;
            private $teléfono;
            private $fechaNacimiento;

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
                return $this->apellidos; //Get es para mostar en un futuro
            }

            function setTipodoc($tipoDoc) { 
                $this->tipoDoc = $tipoDoc; //Set es para capturar información en esa variable
            }
            function getTipodoc() { 
                return $this->tipoDoc; //Get es para mostar en un futuro
            }

            function setNumdoc($numDoc) { 
                $this->numDoc = $numDoc; //Set es para capturar información en esa variable
            }
            function getNumdoc() { 
                return $this->numDoc; //Get es para mostar en un futuro
            }

            function setDirección($dirección) { 
                $this->dirección = $dirección; //Set es para capturar información en esa variable
            }
            function getDirección() { 
                return $this->dirección; //Get es para mostar en un futuro
            }

            function setCorreo($correo) { 
                $this->correo = $correo; //Set es para capturar información en esa variable
            }
            function getCorreo() { 
                return $this->correo; //Get es para mostar en un futuro
            }

            function setTeléfono($teléfono) { 
                $this->teléfono = $teléfono; //Set es para capturar información en esa variable
            }
            function getTeléfono() { 
                return $this->teléfono; //Get es para mostar en un futuro
            }

            function setFechaNacimiento($fechaNacimiento) { 
                $this->fechaNacimiento = $fechaNacimiento; //Set es para capturar información en esa variable
            }
            function getFechaNacimiento() { 
                return $this->fechaNacimiento; //Get es para mostar en un futuro
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

            public function Consulta_crear_usuario(clase_ingreso $addusuario)                 
                {
                    $verentrada = array();
                    try { 
                    //PDO creado
                        $this -> con = new PDO('mysql:host='.$this->host.';dbname='.$this->database.';charset=utf8',$this->user,$this->pass);
                    //Insertar usuario por medio de SQL
                        $sql = 'INSERT INTO tb_usuario(nombre, apellido, tipo_doc, num_doc, dir_casa, correo, telefono, fecha_na) VALUES("'.$addusuario->getNombre().'","'.$addusuario->getApellidos().'","'.$addusuario->getTipodoc().'"","'.$addusuario->getNumdoc().'","'.$addusuario->getDirección().'","'.$addusuario->getCorreo().'","'.$addusuario->getTeléfono().'","'.$addusuario->getFechaNacimiento.'")';
                        $iniciarSQL = $this->con->prepare($sql);
                        $iniciarSQL -> execute();
                    }
                    //Si hay algun error
                    catch (PDOException $ex) {
                    	die("Error occurred:" . $ex -> getMessage());
                    }
                }
        }
        ?>