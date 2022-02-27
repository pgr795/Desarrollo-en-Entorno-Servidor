<?php
session_start();
if(!isset($_SESSION["email"])){
  header("location: ../index.php");	
}
var_dump($_SESSION);


include_once("../db/db.php");	
$conexion=conexion();

//Llamada al modelo
include_once("../models/Alquiler_model.php");

//Llamada a la view
include_once("../views/Alquiler_views.php");


if($_SERVER["REQUEST_METHOD"] == "POST") {
	$pelicula=$_POST["pelicula"];
	$accion=$_POST["accion"];
	$datos=array();
				if($accion=="Agregar Pelicula"){
					agregarPelicula($datos,$pelicula);
					var_dump($_SESSION['pelicula']);
				}
				else if($accion=="Realizar Alquiler"){
					$datosRecogidos=$_SESSION['pelicula'];
					realizarAlquiler($datosRecogidos,$conexion);
				}
				else if($accion=="Vaciar Cesta"){
					unset($_SESSION['pelicula']);
				}
				else if($accion=="Volver"){
					unset($_SESSION['pelicula']);
					header("location:../controllers/Welcome_controllers.php");
				}				
}


?>
	


