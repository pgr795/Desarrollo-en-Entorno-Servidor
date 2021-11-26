<?php

function limpieza($datos) {
  $datos = trim($datos);
  $datos = stripslashes($datos);
  $datos = htmlspecialchars($datos);
  return $datos;
}

function crear_conexion2(){
	$servername = "localhost"; //or IP
	$username = "root";
	$password = "rootroot";
	$dbname="empleados1n";

	// Create connection
	$conn = new mysqli($servername, $username, $password,$dbname);
	
	var_dump($conn);
	
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	else{
		echo "Conexion: OK";
	}
	return $conn;
}

function alta_departamento($conexion,$departamento){
	$conex=$conexion;
		$sql = "INSERT INTO departamento (nombre_d) VALUES ('$departamento')";
		if ($conex->query($sql) === TRUE) {
			echo "New record created successfully";
		} 
		else {
			echo "Error: " . $sql . "<br>" .$conex->error;
		}
}

function cerrarConexion($conexion){
	echo "Conexion Cerrada";
	$conexion->close();;
}

//-------------------------------------------------------------------------------------------------

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

function crear_conexion3(){
	$servername = "localhost"; //or IP
	$username = "root";
	$password = "rootroot";
	$dbname="empleados1n";

	try {
		$conn = new PDO("mysql:host=$servername;dbname=empleados1n",$username, $password); // set the PDO error mode to exception
	   $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		echo "Connected successfully"; 
		}
	catch(PDOException $e)
		{
		echo "Connection failed: " . $e->getMessage();
		}
}













?>