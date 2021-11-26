<?php
	function limpieza($datos) {
	  $datos = trim($datos);
	  $datos = stripslashes($datos);
	  $datos = htmlspecialchars($datos);
	  return $datos;
	}

	function crear_conexion1(){
		$servername = "localhost"; //or IP
		$username = "root";
		$password = "rootroot";
		$dbname="empleados1n";

	// Crear conexion
		
		$conn = mysqli_connect($servername, $username, $password,$dbname);
		
	// Checkear conexion
		if (!$conn) {
			die("Conexion fallida: " . mysqli_connect_error());
		}
		else{
			echo "Conexion: OK";
		}
		return $conn;
	}
	
	function alta_empleado($conexion,$nombre,$apellido,$fecha,$departamento){
		$conex=$conexion;
			$sql = "INSERT INTO empleado VALUES ('$nombre','$apellido','$fecha','$departamento')";
			if (mysqli_query($conex, $sql)) {
				echo "New record created successfully";
			} 
			else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conex);
			}
		mysqli_close($conex);
	}
?>