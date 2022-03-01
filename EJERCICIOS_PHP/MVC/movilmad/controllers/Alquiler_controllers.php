<?php
session_start();
if (!isset($_SESSION['usuario']) && !isset($_SESSION['idcliente'])){
	header("location: ../index.php");	
}

include_once '../db/db.php';	
include_once '../models/Alquiler_model.php';
include_once '../views/Alquiler_views.php';
include_once 'Funciones/funciones.php';

$conexion=conexion();

if($_SERVER["REQUEST_METHOD"] == "POST"){
	$matricula=$_POST["vehiculos"];
	$fechaActual=date("Y-m-d H:i:s");
	$usuario=$_SESSION['usuario'];
	$idUsuario=$_SESSION['idcliente'];
	$accion=$_POST['accion'];
	$saldo;
	$datos=array();
				if($accion=="Agregar a Cesta"){
					agregarVehiculo($matricula,$fechaActual);
					//var_dump($_SESSION['datos']);
				}
				else if($accion=="Realizar Alquiler"){
					$datosRecogidos=$_SESSION['datos'];
					$saldo=comprobarSaldo($idUsuario);
					//var_dump($saldo);
						if($saldo[0]>=10){
							modificarEstado($datosRecogidos);
							modificarTiempoAlquiler($datosRecogidos,$idUsuario,$fecha);
							unset($_SESSION['datos']);
						}
				}
				else if($accion=="Vaciar Cesta"){
					unset($_SESSION['datos']);
				}
}


function agregarVehiculo($matricula,$fechaActual){
	$datos=array();
	if(!isset($_SESSION['datos'])){
		array_push($datos,array($matricula,$fechaActual));
		$_SESSION['datos']=$datos;
	}
	else{
		array_push($_SESSION['datos'],array($matricula,$fechaActual));
		}
}

?>
	

