<?php

//Funciones generales
function crear_conexion(){
		$servername = "localhost"; //or IP
		$username = "root";
		$password = "rootroot";
		$dbname="movilmad";
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

//Funciones de movlogin.php

function login($email,$contraseña){
			try{
				$conexion=crear_conexion();
				$stmt = $conexion->prepare("SELECT nombre,apellido,email,idcliente,fecha_baja FROM rclientes where email='$email'");
				$stmt->execute();
				
				$cont=0;
				
				$nombreBD="";
				$apellidoBD="";
				$emailBD="";
				$idclienteBD="";
				$fecha_bajaBD="";
				
				foreach($stmt->fetchAll() as $consulta){
					$nombreBD=$consulta["nombre"];
					$apellidoBD=$consulta["apellido"];
					$emailBD=$consulta["email"];
					$idclienteBD=$consulta["idcliente"];
					$fecha_bajaBD=$consulta["fecha_baja"];
					$cont++;
				}
			
			if($cont == 1) {
				if($emailBD==$email && $contraseña==$apellidoBD && $fecha_bajaBD==NULL){
					session_start();
					$_SESSION['Usuario'] = $nombreBD." ".$apellidoBD;
					$_SESSION['id'] = $idclienteBD;
					//var_dump($_SESSION);
					header("location: movwelcome.php");
				}
				else { 
					$error = "Usuario o password incorrectos !!!";
				echo $error;
				}
			}
			else{
				echo "ERROR";
			}
		}
		catch(PDOException $e){
			echo "Error: " . $e->getMessage();	
		}
	}



//FUNCIONES DE MOVALQUILAR.PHP

function mostrarVehiculos(){
		try {
			$conexion=crear_conexion();
			$stmt = $conexion->prepare("select matricula,marca,modelo from rvehiculos where disponible='S'");// select concat(matricula,'#',marca,'#',modelo) as pepe from rvehiculos where disponible='S';
			$stmt->execute();
			$resultado = $stmt->setFetchMode(PDO::FETCH_ASSOC);
			echo "<select name='vehiculos' class='form-control'>";
			foreach($stmt->fetchAll() as $consulta){
				echo '<option value="'.$consulta["matricula"].'">'.$consulta["matricula"]." ".$consulta["marca"]." ".$consulta["modelo"].'</option>';
			}
			echo "</select>";
		}
		catch(PDOException $e){
			echo "Error:". $e->getMessage();
		}
		$conexion = null;
}

function mostrarCarrito($aux){
		$datos=$aux;
		foreach($datos as $indice => $valor){
			echo "<p>Matricula:$valor[0] FechaActual:$valor[1] </p>";
		}
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




//FUNCIONES DE MOVDEVOLVER.PHP

function mostrarVehiculoCliente($id){
	try {
			$conexion=crear_conexion();
			$stmt = $conexion->prepare("SELECT ralquileres.matricula,marca,modelo FROM ralquileres,rvehiculos 
			WHERE ralquileres.matricula=rvehiculos.matricula AND idcliente='$id' AND fecha_devolucion IS NULL");
			// select concat(matricula,' ',marca,' ',modelo) as datos from rvehiculos where disponible='S';
			$stmt->execute();
			
	
			echo "<select name='vehiculos' class='form-control'>";
				foreach($stmt->fetchAll() as $consulta){
					echo '<option value="'.$consulta["matricula"].'">'.$consulta["matricula"]." ".$consulta["marca"]." ".$consulta["modelo"].'</option>';
				}
			echo "</select>";
		}
		catch(PDOException $e){
			echo "Error:". $e->getMessage();
		}
		$conexion = null;
}


function devolverVehiculo($matricula,$idUsuario,$fecha){
	$preBase=precioBase($matricula);
	devolucion($matricula,$idUsuario,$fecha,$preBase);
	disponibilidad($matricula);
	
	
	var_dump($preBase);
	
}

function devolucion($matricula,$idUsuario,$fecha,$preBase){
		try {
			$conexion=crear_conexion();
				$stmt = $conexion->prepare(
				"UPDATE ralquileres SET fecha_devolucion='$fecha' where matricula='$matricula'");
				$stmt->execute();
				
				$min=minutos($matricula,$idUsuario);
				$total=floatval($preBase*$min);
				var_dump($total);
				var_dump($min);
				
				$stmt2 = $conexion->prepare(
				"UPDATE ralquileres SET preciototal='$total' where matricula='$matricula'");
				$stmt2->execute();
				
			}
		catch(PDOException $e){
			echo "Error:". $e->getMessage();
		}
		$conexion = null;
}

function disponibilidad($matricula){
		try {
			$conexion=crear_conexion();
			$stmt = $conexion->prepare("UPDATE rvehiculos SET disponible='S' where matricula='$matricula'");
			// select concat(matricula,' ',marca,' ',modelo) as datos from rvehiculos where disponible='S';
			$stmt->execute();
		}
		catch(PDOException $e){
			echo "Error:". $e->getMessage();
		}
	
		$conexion = null;
}

function precioBase($matricula){
	try {
			$conexion=crear_conexion();
			$stmt = $conexion->prepare("select preciobase from rvehiculos where matricula='$matricula'");
			// select concat(matricula,' ',marca,' ',modelo) as datos from rvehiculos where disponible='S';
			$stmt->execute();
		
			$preciobase="";
	
				foreach($stmt->fetchAll() as $consulta){
					$precioBase=$consulta['preciobase'];
				}

		}
		catch(PDOException $e){
			echo "Error:". $e->getMessage();
		}
		return $precioBase;
		$conexion = null;
}

function minutos($matricula,$idUsuario){
		try {
			$conexion=crear_conexion();
			$stmt = $conexion->prepare("select fecha_alquiler, fecha_devolucion from ralquileres where matricula='$matricula' and idcliente='$idUsuario'");
			$stmt->execute();
			
			$fecha_alquiler="";
			$fecha_devolucion="";
			$alquiler="";
			$devolucion="";
			foreach($stmt->fetchAll() as $consulta){
				$alquiler=$consulta['fecha_alquiler'];
				$devolucion=$consulta['fecha_devolucion'];
			}
			
			$fecha_alquiler = strtotime($alquiler);
			$fecha_devolucion = strtotime($devolucion);
			var_dump($fecha_alquiler);
			var_dump($fecha_devolucion);
			$min = abs($fecha_alquiler-$fecha_devolucion);
			
			
		}
		catch(PDOException $e){
			echo "Error:". $e->getMessage();
		}
		return floatval($min);
		var_dump($min);
		$conexion = null;
}



//FUNCIONES DE MOVCONSULTAR.PHP


function mostrartablas($fechadesde,$fechahasta,$idUsuario){
		try {
			$conexion=crear_conexion();
			$matricula="";
			
			$stmt = $conexion->prepare("SELECT nombre,rvehiculos.matricula as matriculas,marca,modelo,fecha_alquiler,fecha_devolucion,preciototal FROM rclientes,ralquileres,rvehiculos WHERE rclientes.idcliente = ralquileres.idcliente AND ralquileres.matricula = rvehiculos.matricula AND ralquileres.idcliente='$idUsuario' ORDER BY fecha_alquiler ASC");
			$stmt->execute();
			echo "<table border='1'>";
				foreach($stmt->fetchAll() as $consulta){
					echo "<tr>
								<td>".$consulta['nombre']."</td>
								<td>".$consulta['matriculas']."</td>
								<td>".$consulta['marca']."</td>
								<td>".$consulta['modelo']."</td>
								<td>".$consulta['fecha_alquiler']."</td>
								<td>".$consulta['fecha_devolucion']."</td>
								<td>".$consulta['preciototal']."</td>
							</tr>";
				}
			echo "</table>";
			}
		catch(PDOException $e){
			echo "Error:". $e->getMessage();
		}
		$conexion = null;
}

?>