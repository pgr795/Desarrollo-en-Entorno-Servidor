<?php
function mostrarVehiculos($conexion){
		try {
		global $conexion;
			$stmt = $conexion->prepare("SELECT matricula,marca,modelo FROM rvehiculos 
            where disponible='S'");// select concat(matricula,'#',marca,'#',modelo) as pepe from rvehiculos where disponible='S';
			$stmt->execute();
			
				foreach($stmt->fetchAll() as $consulta){
					echo '<option value="'.$consulta["matricula"].'">'.$consulta["matricula"]." ".$consulta["marca"]." ".$consulta["modelo"].'</option>';
				}
		
		}
		catch(PDOException $e){
			echo "Error:". $e->getMessage();
		}
}

function modificarEstado($datosRecogidos){
	try {
	  $conexion=conexion();
			$matricula="";
			foreach($datosRecogidos as $indice => $valor){
					$matricula=$valor[0];
					$modificarEstado="UPDATE rvehiculos SET disponible='N' where matricula='$matricula'";
					$conexion->exec($modificarEstado);
				}
			}
		catch(PDOException $e){
			echo "ErrorModificarEstado:". $e->getMessage();
		}
}

function comprobarSaldo($idUsuario){
	try {
			$conexion=conexion();
			$saldo = $conexion->prepare("select saldo from rclientes where idcliente='$idUsuario'");
			$saldo->execute();
			//Hacerlo asociativo
			//$result = $saldo->setFetchMode(PDO::FETCH_ASSOC);
			return $saldo->fetchAll(PDO::FETCH_ASSOC);
			
		}
		catch(PDOException $e){
			echo "ErrorSaldo:". $e->getMessage();
		}
}

function modificarTiempoAlquiler($datosRecogidos,$idUsuario){
	try {
			$conexion=conexion();
			$matricula="";
			foreach($datosRecogidos as $indice => $valor){
				$matricula=$valor[0];
				$fecha=$valor[1];
				
				$modificarTiempoAlquiler="INSERT INTO ralquileres (idcliente,matricula,fecha_alquiler,fecha_devolucion,preciototal) VALUES ('$idUsuario','$matricula','$fecha',null,null)";
				$conexion->exec($modificarTiempoAlquiler);
				
var_dump($matricula);
			}
		}
		catch(PDOException $e){
			echo "ErrorAlquiler:". $e->getMessage();
		}
}
?>

