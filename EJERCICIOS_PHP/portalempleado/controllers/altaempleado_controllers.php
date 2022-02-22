<?php
session_start();
//Llamada a la view
require_once("../views/altaempleado_views.php");

//Llamada al modelo
require_once("../models/altaempleado_model.php");

require_once("../db/db.php");

//Recogiendo datos del usuario
	$nombre="";
	$apellido="";
	$fecha_nacimiento="";
	$genero="";
	$contratacion="";
	$expiracion="";
	$departamento="";
	$salario="";
	$cargo="";
	$idNuevo="";
	$fecha="";
	
if($_SERVER["REQUEST_METHOD"] == "POST") {
	var_dump($_POST);
	$nombre=$_POST["nombre"];
	$apellido=$_POST["apellido"];
	$fecha_nacimiento=$_POST["birth"];
	$genero=$_POST["gender"];
	$contratacion=$_POST["date"];
	$expiracion=$_POST["expirar"];
	$departamento = $_POST["departamentos"];
	$salario=$_POST["salario"];
	$cargo = $_POST["cargo"];
	$idNuevo=maxEmpNo();
	$fecha=date("Y-m-d"); 
	
	altaEmpleado($nombre,$apellido,$fecha_nacimiento,$genero,$contratacion,$expiracion,$departamento,$salario,$cargo,$idNuevo,$fecha);
}
?>
