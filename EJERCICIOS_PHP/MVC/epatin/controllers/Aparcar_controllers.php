<?php
session_start();

if(!isset($_SESSION['usuario']) && !isset($_SESSION['saldo'])){
	header("Location:../index.php");
}

include_once '../db/db.php';
include_once '../models/Aparcar_model.php';
include_once '../views/Aparcar_views.php';

var_dump($_SESSION);

$conexion=conexion();

 if($_SERVER["REQUEST_METHOD"] == "POST") {
		$usuario=$_SESSION['usuario'];
		$id=$_SESSION['id'];
		$matricula=$_POST['patinetes'];
		$accion=$_POST['volver'];
		$fecha=date("Y-m-d H:i:s"); 
	
		if($accion=="Aparcar Patinete"){
			devolverPatin($matricula,$id,$fecha);
		}
		else if($accion="Volver"){
			header("Location:Inicio_controllers.php");
		}
   }

?>