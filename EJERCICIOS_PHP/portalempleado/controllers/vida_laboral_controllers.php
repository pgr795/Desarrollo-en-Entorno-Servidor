<?php
session_start();

//Conexion a base de datos
require_once("../db/db.php");

//Llamada a la view
require_once("../views/vida_laboral_views.php");

//Llamada al modelo
require_once("../models/vida_laboral_model.php");


//Recogiendo datos del usuario
if($_SERVER["REQUEST_METHOD"] == "POST") {
	$idEmpleado=$_POST["ID"];
	vidaLaboral($idEmpleado);
}
?>