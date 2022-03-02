<?php
session_start();

if(!isset($_SESSION['usuario']) && !isset($_SESSION['saldo'])){
	header("Location:../index.php");
}

include_once '../db/db.php';
include_once '../models/Alquiler_model.php';
include_once '../views/Alquiler_views.php';

$conexion=conexion();

if($_SERVER["REQUEST_METHOD"] == "POST"){
	$matricula=$_POST["patinetes"];
	$fechaActual=date("Y-m-d H:i:s");
	$usuario=$_SESSION['usuario'];
	$saldo=$_SESSION['saldo'];
	$id=$_SESSION['id'];
	$accion=$_POST['accion'];
	$datos=array();
				if($accion=="Agregar a Cesta"){
					agregarPatin($matricula,$fechaActual);
				}
				else if($accion=="Realizar Alquiler"){
					$datosRecogidos=$_SESSION['datos'];
					$saldo=comprobarSaldo($id);
					//var_dump($saldo);
						if($saldo[0]>=10){
							modificarEstado($datosRecogidos);
							modificarTiempoAlquiler($datosRecogidos,$id,$fecha);
							unset($_SESSION['datos']);
						}
						else{
							echo "No puede realizar el pedido";
						}
				}
				else if($accion=="Vaciar Cesta"){
					unset($_SESSION['datos']);
				}
}
var_dump($_SESSION);
function agregarPatin($matricula,$fechaActual){
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