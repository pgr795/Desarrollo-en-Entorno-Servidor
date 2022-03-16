<?php
session_start();

if(!isset($_SESSION['id']) && !isset($_SESSION['usuario'])){
	header("Location:../index.php");
}

include_once '../db/db.php';
include_once '../models/ConsultarSorteo_model.php';
include_once '../views/ConsultarSorteo_views.php';



$conexion=conexion();

	if($_SERVER["REQUEST_METHOD"] == "POST") {
		var_dump($_POST);
		$accion=$_POST["accion"];
		if($accion=="Realizar Sorteo"){

		}
		else if($accion=="Atras"){
			header("Location:Inicio_Hacienda_controllers.php");
		}
	}
var_dump($_SESSION);
?>