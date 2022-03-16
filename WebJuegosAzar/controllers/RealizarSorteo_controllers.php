<?php
session_start();

if(!isset($_SESSION['id']) && !isset($_SESSION['usuario'])){
	header("Location:../index.php");
}

include_once '../db/db.php';
include_once '../models/RealizarSorteo_model.php';
include_once '../views/RealizarSorteo_views.php';

//var_dump($_SESSION);

$conexion=conexion();
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		//var_dump($_POST);
		$accion=$_POST["accion"];
		$SorteoActivo=$_POST["idSorteo"];
		
		if(isset($accion)){
			if($accion=="Realizar Sorteo"){
			
			}
			else if($accion=="Generar combinacion ganadora"){
				$combinacionSorteo=combinacionGanadora();
				if(!isset($_SESSION['combinacion'])){
						var_dump($combinacionSorteo);
						mostrarCombinacionGanadora($combinacionSorteo);
						$_SESSION['combinacion']=$combinacionSorteo;
						array_push($_SESSION['combinacion'],$SorteoActivo);
				}
				else if(isset($_SESSION['combinacion'])){
						$combinacion=$_SESSION['combinacion'];
						$SorteoActivo2=$combinacion[8];
						if($SorteoActivo==$SorteoActivo2){
							mostrarCombinacionGanadora($_SESSION['combinacion']);
							echo "Ya has generado la combinacion Ganadora";
						}
						else{
							$_SESSION['combinacion']=$combinacionSorteo;
							array_push($_SESSION['combinacion'],$SorteoActivo);
							mostrarCombinacionGanadora($_SESSION['combinacion']);
						}
				}
			}
			else if($accion=="Atras"){
				header("Location:Inicio_Hacienda_controllers.php");
			}
		}
	}
	//var_dump($_SESSION);
?>