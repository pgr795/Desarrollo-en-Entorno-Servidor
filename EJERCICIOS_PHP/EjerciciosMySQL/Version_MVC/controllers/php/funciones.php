<?php
//MARY.SMITH@sakilacustomer.org 
//SMITH 

//FUNCIONES GENERALES
function crear_conexion(){
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
		return $conexion;
}
function limpieza($datos) {
	  $datos = trim($datos);
	  $datos = stripslashes($datos);
	  $datos = htmlspecialchars($datos);
	  return $datos;
}

//FUNCIONES DE MOVLOGIN.PHP
function login($email,$password){
			try{
			$conexion=crear_conexion();
			$stmt = $conexion->prepare("SELECT first_name,last_name,email,customer_id 
			FROM customer where email='$email'");
			$stmt->execute();
			
			$cont=0;
			
			$nombreBD="";
			$apellidoBD="";
			$emailBD="";
			$idclienteBD="";
			
			foreach($stmt->fetchAll() as $consulta){
				$nombreBD=$consulta["first_name"];
				$apellidoBD=$consulta["last_name"];
				$emailBD=$consulta["email"];
				$idclienteBD=$consulta["customer_id"];
				$cont++;
			}
			
			if($cont == 1) {
					session_start();
					$_SESSION['Usuario'] = $nombreBD." ".$apellidoBD;
					$_SESSION['id'] = $idclienteBD;
					// var_dump($_SESSION);
					header("location: movwelcome.php");
				}
			else { 
				$error = "Usuario o password incorrectos !!!";
				echo $error;
			}
		}
		catch(PDOException $e){
			echo "Error: " . $e->getMessage();	
		}
		$conexion=null;
	
}

//FUNCIONES DE MOVWELCOME.PHP

//FUNCIONES DE MOVALQUILAR.PHP

function mostrarVehiculos(){
		try {
			$conexion=crear_conexion();
			$stmt = $conexion->prepare("select matricula,marca,modelo from rvehiculos where disponible='S'");
			$stmt->execute();
			$resultado = $stmt->setFetchMode(PDO::FETCH_ASSOC);
			echo "<select name='vehiculos' class='form-control'>";
			foreach($stmt->fetchAll() as $consulta){
echo '<option value="'.$consulta["matricula"].'">'.$consulta["marca"]." ".$consulta["modelo"].'</option>';
			}
			echo "</select>";
		}
		catch(PDOException $e){
			echo "Error:". $e->getMessage();
		}
		$conexion = null;
}
function comprobarSaldo($idUsuario){
	try {
			$conexion=crear_conexion();
			$stmt = $conexion->prepare("select saldo from rclientes where idcliente='$idUsuario'");
			$stmt->execute();
			$resultado = $stmt->setFetchMode(PDO::FETCH_ASSOC);
			$saldo;
			foreach($stmt->fetchAll() as $consulta){
				$saldo=$consulta["saldo"];
			}
			return $saldo;
			
		}
		catch(PDOException $e){
			echo "Error:". $e->getMessage();
		}
		$conexion = null;
}
function modificarEstado($datosRecogidos){
	try {
			$conexion=crear_conexion();
			$matricula="";
			foreach($datosRecogidos as $indice => $valor){
				$matricula=$valor[0];
				$stmt = $conexion->prepare("UPDATE rvehiculos SET disponible='N' where matricula='$matricula';");
				$stmt->execute();
				var_dump($matricula);
				}
			}
		catch(PDOException $e){
			echo "Error:". $e->getMessage();
		}
		$conexion = null;
}
function modificarTiempoAlquiler($datosRecogidos,$idUsuario){
	try {
			$conexion=crear_conexion();
			$matricula="";
			foreach($datosRecogidos as $indice => $valor){
				$matricula=$valor[0];
				$fecha=$valor[1];
				$stmt = $conexion->prepare(
				"INSERT INTO ralquileres (idcliente,matricula,fecha_alquiler,fecha_devolucion,preciototal) VALUES ('$idUsuario','$matricula','$fecha',null,null)");
				$stmt->execute();
				var_dump($matricula);
				}
			}
		catch(PDOException $e){
			echo "Error:". $e->getMessage();
		}
		$conexion = null;
}

//FUNCIONES DE MOVCONSULTAR.PHP


?>