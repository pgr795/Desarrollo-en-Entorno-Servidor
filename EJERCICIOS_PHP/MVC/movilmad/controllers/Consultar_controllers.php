<?php
session_start();
if (!isset($_SESSION['usuario']) && !isset($_SESSION['idcliente'])){
	header("location: ../index.php");	
}

include_once '../db/db.php';	
include_once '../models/Consultar_model.php';
include_once '../views/Consultar_views.php';
include_once 'Funciones/funciones.php';

var_dump($_SESSION);

$conexion=conexion();
   
if($_SERVER["REQUEST_METHOD"] == "POST") {
		$valor1 = $_POST["fechadesde"];
		$valor2 = $_POST["fechahasta"];
		$accion=$_POST["Volver"];
		$fechadesde=$valor1;
		$fechahasta=$valor2;
		$usuario=$_SESSION['usuario'];
		$idUsuario=$_SESSION['idcliente'];
		if($accion=="Consultar"){
			mostrartablas($fechadesde,$fechahasta,$idUsuario);
		}
		else if($accion=="Volver"){
			header("location: Welcome_controllers.php");
		}		
}
//var_dump($_POST);
?>