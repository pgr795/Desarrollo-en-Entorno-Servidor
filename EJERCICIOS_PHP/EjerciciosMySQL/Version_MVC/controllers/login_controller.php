<?php
//Llamada a la funcion de conexion
require_once("../db/db.php");

//Recogiendo datos del usuario
if($_SERVER["REQUEST_METHOD"] == "POST") {
	$email=$_POST["email"];
	$password = $_POST["password"];
}
else {
	$email="";
	$password="";	
}

//Llamada al modelo
require_once("../models/Login_model.php");

//Retorna el resultado del modelo
$estado=login($email,$password);

//Llamada al controlador WELCOME
if($estado!="no"){
	require_once("../controllers/welcome_controller.php");
}
?>