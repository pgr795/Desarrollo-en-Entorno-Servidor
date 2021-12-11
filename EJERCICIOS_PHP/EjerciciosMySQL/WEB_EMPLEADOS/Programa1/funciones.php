<?php
	function limpieza($datos) {
	  $datos = trim($datos);
	  $datos = stripslashes($datos);
	  $datos = htmlspecialchars($datos);
	  return $datos;
	}

	function crear_conexion(){
		$servername = "localhost"; //or IP
		$username = "root";
		$password = "rootroot";
		$dbname="empleadosnn";

	// Crear conexion
		
		$conexion = mysqli_connect($servername, $username, $password,$dbname);
		
	// Checkear conexion
		if (!$conexion) {
			die("Conexion fallida: " . mysqli_connect_error())."<br>";
		}
		else{
			echo "Conexion: OK"."<br>";
		}
		return $conexion;
	}	
?>