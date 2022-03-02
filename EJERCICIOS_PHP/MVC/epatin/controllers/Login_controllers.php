<?php
session_start();

if(isset($_SESSION['usuario'])){
	unset($_SESSION['usuario']);
	unset($_SESSION['saldo']);
	session_destroy();
}
var_dump($_SESSION);

include_once 'db/db.php';
include_once 'models/Login_model.php';
include_once 'views/Login_views.php';

$conexion=conexion();

if($_SERVER["REQUEST_METHOD"] == "POST") {
	$email=$_POST["email"];
	$password=$_POST["password"];
	$respuesta=login($email,$password);
	var_dump($respuesta);
	if(isset($respuesta)){
		foreach($respuesta as $consulta){
			$_SESSION['usuario']=$consulta['nombre']." ".$consulta['apellido'];	
			$_SESSION['saldo']=$consulta['saldo'];
			$_SESSION['id']=$consulta['dni'];
		}
		header("Location:controllers/Inicio_controllers.php");
	}
}

?>
