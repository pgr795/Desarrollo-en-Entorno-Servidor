<?php
session_start();

if(!isset($_SESSION['id']) && !isset($_SESSION['usuario'])){
		header("Location:../index.php");
}

include_once '../db/db.php';
include_once '../models/AltaSorteo_model.php';
include_once '../views/AltaSorteo_views.php';

var_dump($_SESSION);

$conexion=conexion();

	if($_SERVER["REQUEST_METHOD"] == "POST") {
		var_dump($_POST);
		$dni=$_SESSION['id'];
		$fecha=$_POST["fecha"];
		$accion=$_POST["accion"];
		if($accion=="Alta de Sorteo"){
			if(isset($fecha)){
				insertSorteo($conexion,$fecha,$dni);
			}
		}
		else if($accion=="Atras"){
			header("Location:Inicio_Hacienda_controllers.php");
		}
	}
?>