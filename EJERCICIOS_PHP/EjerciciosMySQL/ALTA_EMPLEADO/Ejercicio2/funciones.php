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
	
	function mostrarSelect(){
		 $mysqli=crear_conexion1();
		 $query = $mysqli -> query ("SELECT nombre_d FROM departamento");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores[nombre_d].'">'.$valores[nombre_d].'</option>';
          }
	}
	
	
	function alta_empleado($conexion,$dni,$nombre,$fecha,$departamento){
		$conex=$conexion;
			$sql = "INSERT INTO empleado VALUES ('$dni','$nombre','$fecha','$departamento')";
			if (mysqli_query($conex, $sql)) {
				echo "New record created successfully";
			} 
			else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conex);
			}
		mysqli_close($conex);
	}
?>