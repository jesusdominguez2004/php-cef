<?php
class clase_ingreso{
	private $nombre;
	private $apellido;
	private $correo;
	private $Codigo_u;

function setCodigo_u($Codigo_u){
	$this->Codigo_u=$Codigo_u;
}
function getCodigo_u(){
	return $this->Codigo_u;
}

function setNombre($nombre){
	$this->nombre=$nombre;
}
function getNombre(){
	return $this->nombre;
}

function setApellido($apellido){
	$this->apellido=$apellido;
}
function getApellido(){
	return $this->apellido;
}

function setCorreo($correo){
	$this->correo=$correo;
}
function getCorreo(){
	return $this->correo;
}


public function __construct()
	{
		$dato=new conexion();
		$this->host=$dato->getHost();
		$this->user=$dato->getUser();
		$this->pass=$dato->getPass();
		$this->database=$dato->getDatabase();
	}

public function Consulta_crea_usuario(clase_ingreso $addusuario){
$verentrada=array();
try{
	$this->con=new PDO('mysql:host='.$this->host.';dbname='.$this->database,$this->user,$this->pass);
	$sql='INSERT INTO usuario_prueba (nombre_u,apellido_u,correo)values("'.$addusuario->getNombre().'", "'.$addusuario->getApellido().'", "'.$addusuario->getCorreo().'")';
	$sth=$this->con->prepare($sql);
	$sth->execute();
}
catch(PDOException $ex){
			die ("problema de conexion:".$ex->getMessage());
		}

}



}
?>