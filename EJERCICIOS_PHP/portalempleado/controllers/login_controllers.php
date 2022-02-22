<?php
//10039|1959-10-01|Alejandro|Brender|M|1988-01-19
//Llamada a la funcion de conexion
require_once("../db/db.php");

//var_dump($_POST);

//Recogiendo datos del usuario
if($_SERVER["REQUEST_METHOD"] == "POST") {
	$username=$_POST["username"];
	$password = $_POST["password"];
}
else {
	$username="";
	$password="";	
}

//Llamada al modelo
require_once("../models/login_model.php");

//Retorna el resultado del modelo
$estado="";
$estado=login($username,$password);
//Llamada al controlador WELCOME
if($estado!=""){
	if($estado=="Human Resources"){
		require_once("../views/welcomeAPP_views.php");
	}
	else{
		require_once("../views/welcomeAPP2_views.php");
	}
}


?>