<?php
class conexion{
	private $host;
	private $user;
	private $pass;
	private $database;
	private $con;
	public function __construct()
	{
    	$this->host="localhost";
    	$this->user="root";
    	$this->pass="";
    	$this->database="bd_almacen";
	}

	public function conectar(){
		try{
			$this->con = new PDO('mysql:host='.$this->host.';dbname='.$this->database,$this->user,$this->pass);
			echo "conexion exitosa";
		}
		catch(PDOException $ex){
			Echo "problema de conexion".$ex->getMessage();
			exit;
		}
	}
	public function getHost(){
		return $this->host;
	}
	public function getUser(){
		return $this->user;
	}
	public function getDatabase(){
		return $this->database;
	}
	public function getPass(){
		return $this->pass;
	}


	public function setHost($host){
		$this->host = $host;
	}
	public function setDatabase($datadase){
		$this->database = $database;
	}
	public function setUser($user){
		$this->user = $user;
	}
	public function setPass($pass){
		$this->pass = $pass;
	}

}


?>