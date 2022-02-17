<?php
		$servername = "localhost"; //or IP
		$username = "root";
		$password = "rootroot";
		$dbname="sakila";
		try {
			$conexion = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
			$conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		}
		catch(PDOException $e){
			echo "Conexion fallida: " . $e->getMessage();
		}
?>