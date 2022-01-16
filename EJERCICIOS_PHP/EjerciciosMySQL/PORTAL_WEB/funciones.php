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
		$dbname="comprasweb";
		try {
		$conexion = new PDO("mysql:host=$servername;dbname=comprasweb",$username,$password);
		$conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		return $conexion;
		}
		catch(PDOException $e){
			echo "Conexion fallida: " . $e->getMessage();
		}
}


function generarClave($apellido){
	return strrev($apellido);
}

function añadirCliente($conexion,$nif,$nombre,$apellido,$cp,$direccion,$ciudad,$clave){
	try {
		$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
		$stmt = $conexion->prepare("INSERT INTO cliente (nif,nombre,apellido,cp,direccion,ciudad,clave)
		VALUES ('$nif','$nombre','$apellido','$cp','$direccion','$ciudad','$clave')");
		$stmt->execute();
		header("location: comlogincli.php");
		echo "<br>";
		echo "Cliente añadido";
	}
	catch(PDOException $e) {
			echo "Error al insertar cliente: ". $e->getMessage();
	}
		$conexion = null;	
	}
	
?>