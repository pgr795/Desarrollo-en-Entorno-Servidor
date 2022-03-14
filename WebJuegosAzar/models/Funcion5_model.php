<?php
	
/* function mostrarSelect($conexion){
		try {
			$conexion=conexion();
			$stmt = $conexion->prepare("");	// select concat(matricula,'#',marca,'#',modelo) as pepe from rvehiculos where disponible='S';
			$stmt->execute();
			
				foreach($stmt->fetchAll() as $consulta){
					echo '<option value="'.$consulta["matricula"].'">'.$consulta["matricula"]." ".$consulta["marca"]." ".$consulta["modelo"].'</option>';
				}
		}
		catch(PDOException $e){
			echo "Error:". $e->getMessage();
		}
} */
?>