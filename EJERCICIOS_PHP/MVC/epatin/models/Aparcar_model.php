<?php
function mostrarPatinCliente($id){
	try {
		$conexion=conexion();
			$stmt = $conexion->prepare("SELECT ealquileres.matricula FROM ealquileres,epatines 
			WHERE ealquileres.matricula=epatines.matricula AND dni='$id' AND fecha_devolucion IS NULL");
			// select concat(matricula,' ',marca,' ',modelo) as datos from rvehiculos where disponible='S';
			$stmt->execute();
			
			foreach($stmt->fetchAll() as $consulta){
				echo '<option value="'.$consulta["matricula"].'">'.$consulta["matricula"].'</option>';
			}
		}
		catch(PDOException $e){
			echo "Error:". $e->getMessage();
		}
}

function devolverPatin($matricula,$id,$fecha){
	$preBase=precioBase($matricula);
	devolucion($matricula,$id,$fecha,$preBase);
	disponibilidad($matricula);
	//var_dump($preBase);	
}

function precioBase($matricula){
	try {
			$conexion=conexion();
			$stmt = $conexion->prepare("select preciobase from epatines where matricula='$matricula'");
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

function devolucion($matricula,$id,$fecha,$preBase){
		try {
			$conexion=conexion();
			
			$devolucionVehiculo="UPDATE ealquileres SET fecha_devolucion='$fecha' where matricula='$matricula'";
			$conexion->exec($devolucionVehiculo);
		
			$min=minutos($matricula,$id);
			$total=$min*$preBase;
			
			// var_dump($total);
			// var_dump($min);
			
			$precioTotal="UPDATE ealquileres SET preciototal='$total' where matricula='$matricula'";
			$conexion->exec($precioTotal);
				
		}
		catch(PDOException $e){
			echo "Error:". $e->getMessage();
		}
}

function minutos($matricula,$id){
		try {
				$conexion=conexion();
				$stmt = $conexion->prepare("Select TIMESTAMPDIFF(MINUTE,fecha_alquiler,fecha_devolucion) as minutos from ealquileres Where dni='$id' and matricula='$matricula'");
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

function disponibilidad($matricula){
		try {
			$conexion=conexion();
			$disponibilidad="UPDATE epatines SET disponible='S' where matricula='$matricula'";
			$conexion->exec($disponibilidad);
		}
		catch(PDOException $e){
			echo "Error:". $e->getMessage();
		}
}
?>