<?php
	
function mostrarPatinetes($conexion){
		try {
			$conexion=conexion();
			$stmt = $conexion->prepare("SELECT matricula FROM epatines 
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
	
function comprobarSaldo($id){
	try {
			$conexion=conexion();
			$saldo = $conexion->prepare("select saldo from eclientes where dni='$id'");
			$saldo->execute();
			//Hacerlo asociativo
			//$result = $saldo->setFetchMode(PDO::FETCH_ASSOC);
			return $saldo->fetchAll(PDO::FETCH_ASSOC);
			
		}
		catch(PDOException $e){
			echo "ErrorSaldo:". $e->getMessage();
		}
}

function modificarEstado($datosRecogidos){
	try {
	  $conexion=conexion();
			$matricula="";
			foreach($datosRecogidos as $indice => $valor){
					$matricula=$valor[0];
					$modificarEstado="UPDATE epatines SET disponible='N' where matricula='$matricula'";
					$conexion->exec($modificarEstado);
				}
			}
		catch(PDOException $e){
			echo "ErrorModificarEstado:". $e->getMessage();
		}
}

function modificarTiempoAlquiler($datosRecogidos,$id){
		try {
			$conexion=conexion();
			$matricula="";
			foreach($datosRecogidos as $indice => $valor){
				$matricula=$valor[0];
				$fecha=$valor[1];
				
				$modificarTiempoAlquiler="INSERT INTO ealquileres (dni,matricula,fecha_alquiler,fecha_devolucion,preciototal) VALUES ('$id','$matricula','$fecha',null,null)";
				$conexion->exec($modificarTiempoAlquiler);
				
				//var_dump($matricula);
			}
		}
		catch(PDOException $e){
			echo "ErrorAlquiler:". $e->getMessage();
		}
}
?>