<?php
session_start();
if (!isset($_SESSION['usuario']) && !isset($_SESSION['idcliente'])){
	header("location: ../index.php");	
}

include_once '../db/db.php';	
include_once '../models/Devolver_model.php';
include_once '../views/Devolver_views.php';
include_once 'Funciones/funciones.php';

$conexion=conexion();

   if($_SERVER["REQUEST_METHOD"] == "POST") {
		$usuario=$_SESSION['usuario'];
		$idUsuario=$_SESSION['idcliente'];
		$matricula=$_POST['vehiculos'];
		$accion=$_POST['volver'];
		$fecha=date("Y-m-d H:i:s"); 
	
		if($accion=="Devolver Vehiculo"){
			devolverVehiculo($matricula,$idUsuario,$fecha);
		}
		else if($accion="Volver"){
			header("Location:Welcome_controllers.php");
		}
   }
	var_dump($_SESSION);
?>

