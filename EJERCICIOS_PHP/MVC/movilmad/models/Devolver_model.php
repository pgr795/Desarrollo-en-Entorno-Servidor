<?php
	
function devolverVehiculo($matricula,$idUsuario,$fecha){
	$preBase=precioBase($matricula);
	devolucion($matricula,$idUsuario,$fecha,$preBase);
	disponibilidad($matricula);
	//var_dump($preBase);	
}

function precioBase($matricula){
	try {
			$conexion=conexion();
			$stmt = $conexion->prepare("select preciobase from rvehiculos where matricula='$matricula'");
			// select concat(matricula,' ',marca,' ',modelo) as datos from rvehiculos where disponible='S';
			$stmt->execute();
		
			foreach($stmt->fetchAll() as $consulta){
				$precioBase=$consulta['preciobase'];
			}
			
			return $precioBase;
		}
		catch(PDOException $e){
			echo "Error:". $e->getMessage();
		}
}

function devolucion($matricula,$idUsuario,$fecha,$preBase){
		try {
			$conexion=conexion();
			
			$devolucionVehiculo="UPDATE ralquileres SET fecha_devolucion='$fecha' where matricula='$matricula'";
			$conexion->exec($devolucionVehiculo);
		
			$min=minutos($matricula,$idUsuario);
			$total=$min*$preBase;
			
			// var_dump($total);
			// var_dump($min);
			
			$precioTotal="UPDATE ralquileres SET preciototal='$total' where matricula='$matricula'";
			$conexion->exec($precioTotal);
				
		}
		catch(PDOException $e){
			echo "Error:". $e->getMessage();
		}
}

function disponibilidad($matricula){
		try {
			$conexion=conexion();
			$disponibilidad="UPDATE rvehiculos SET disponible='S' where matricula='$matricula'";
			$conexion->exec($disponibilidad);
		}
		catch(PDOException $e){
			echo "Error:". $e->getMessage();
		}
}

function mostrarVehiculoCliente($id){
	try {
			$conexion=conexion();
			$stmt = $conexion->prepare("SELECT ralquileres.matricula,marca,modelo FROM ralquileres,rvehiculos 
			WHERE ralquileres.matricula=rvehiculos.matricula AND idcliente='$id' AND fecha_devolucion IS NULL");
			// select concat(matricula,' ',marca,' ',modelo) as datos from rvehiculos where disponible='S';
			$stmt->execute();
			
			foreach($stmt->fetchAll() as $consulta){
				echo '<option value="'.$consulta["matricula"].'">'.$consulta["matricula"]." ".$consulta["marca"]." ".$consulta["modelo"].'</option>';
			}
		}
		catch(PDOException $e){
			echo "Error:". $e->getMessage();
		}
}

function minutos($matricula,$idUsuario){
		try {
				$conexion=conexion();
				$stmt = $conexion->prepare("Select TIMESTAMPDIFF(MINUTE,fecha_alquiler,fecha_devolucion) as minutos from ralquileres Where idcliente='$idUsuario' and matricula='$matricula'");
				$stmt->execute();
				
				//$result = $smtm->setFetchMode(PDO::FETCH_ASSOC)
				
				foreach($stmt->fetchAll() as $consulta) {
					$minutos=$consulta["minutos"];
				}
				return $minutos;
				var_dump($minutos);
			}
		catch(PDOException $e){
			echo "Error:". $e->getMessage();
		}
}
?>
