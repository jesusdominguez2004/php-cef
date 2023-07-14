<!-- Esta es la página o hoja de conexión PHP -->
<!-- Toda variable en PHP empieza con $-->
<!-- Toda acción en PHP termina con ;-->
        
<?php
//Crear conexión (Su nombre es "conexion")
//Es un módulo de clase        
class conexion { 
    //Definir variables (Cada una tendrá dos funciones "Get" y "Set")
    private $host;
    private $user;
    private $pass;
    private $database;
    private $con; //Esta no

    public function __construct()
        {
            $this -> host="localhost";
            $this -> user="root";
            $this -> pass="";
            $this -> database="almacen";
        }

    public function conectar()
        {
            //PDO significa PHP Data Objects, Objetos de Datos de PHP, una extensión para acceder a bases de datos. PDO permite acceder a diferentes sistemas de bases de datos con un controlador específico (MySQL, SQLite, Oracle...)
            try {
                //PDO creado
                $this -> con =  new PDO('mysql:host='.$this->host.';dbname='.$this->database,$this->user,$this->pass);
                echo "¡Conexión exitosa!"; //Mensaje si se consiguió hacer la conexión por PDO
            }
            //Si hubo un error en el PDO
            catch (PDOExepction $ex){
                echo "Hubo un error al iniciar la conexión".$ex->getMessage();
                exit;    
            }
        }

    public function cerrar() { 
        $this->con=null;
    }
    public function getHost() { //Get es para mostar
        return $this->host;
    }
    public function getUser() { 
        return $this->user;
    }
    public function getPass() { 
        return $this->pass;
    }
    public function getDatabase() { 
        return $this->database;
    }

    public function setHost($host) { //Set es para capturar información en esa variable
        $this->host = $host;
    }
    public function setUser($user) { 
        $this->user = $user;
    }
    public function setPass($pass) { 
        $this->pass = $pass;
    } 
    public function setDatabase($database) { 
        $this->database = $database;
    }
}
?>