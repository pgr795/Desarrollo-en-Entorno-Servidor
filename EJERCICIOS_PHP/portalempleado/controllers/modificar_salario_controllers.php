<?php
session_start();

require_once("../db/db.php");

//Llamada a la view
require_once("../views/modificar_salario_views.php");

//Llamada al modelo
require_once("../models/modificar_salario_model.php");

//Recogiendo datos del usuario
	$idEmpleado="";
	$salario="";

if($_SERVER["REQUEST_METHOD"] == "POST") {
	$idEmpleado=$_POST["ID"];
	$salario=$_POST["Salario"];
	modificarSalarioEmpleado($idEmpleado,$salario);
}
?>
