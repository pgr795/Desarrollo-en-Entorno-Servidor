<?php
session_start();
/*Borrar la sesión activa*/
	if(isset($_SESSION["email"])){
		unset($_SESSION['email']);
		unset($_SESSION['usuario']);
		unset($_SESSION['idcliente']);
		session_destroy();
	}
var_dump($_SESSION);

include_once 'models/Login_model.php';
include_once 'views/Login_views.php';
include_once 'Funciones/funciones.php';

	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$email = limpieza($_POST["email"]);
		$password = limpieza($_POST["password"]);	
		$respuesta=login($email,$password);
		var_dump($respuesta);
		if(isset($respuesta)){
			foreach($respuesta as $consulta){
					$_SESSION['email']=$consulta['email'];
					$_SESSION['usuario']=$consulta['nombre']." ".$consulta['apellido'];
					$_SESSION['idcliente']=$consulta['idcliente'];
			}
			header("Location:controllers/Welcome_controllers.php");
		}
	}
?>