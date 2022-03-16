<?php

/* function mostrarSelect($conexion){
		try {
			$conexion=conexion();
			$select = $conexion->prepare("");	 
			$select->execute();
			
				foreach($select->fetchAll() as $consulta){
					echo '<option value="'.$consulta["matricula"].'">'.$consulta["matricula"]." ".$consulta["marca"]." ".$consulta["modelo"].'</option>';
				}
		}
		catch(PDOException $e){
			echo "Error:". $e->getMessage();
		}
} */
?>