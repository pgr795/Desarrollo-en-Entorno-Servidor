<?php

function comprobarDNI($conexion,$dni){
	try{
		$consulta=$conexion->prepare("SELECT dni FROM empleado Where dni='$dni'");
		$consulta->execute();
	}
	catch (PDOException $e) {
		echo "Error comprobarDNI"."<br>";
		echo $e->getMessage();
	}
}

function insertEmpleado($conexion,$dni,$nombre,$apellido,$email){
	try{
		$insert= "INSERT INTO empleado VALUES ('$dni','$nombre','$apellido','$email')";
		$conexion->exec($insert);
		echo "Empleado insertado";
	}
	catch (PDOException $e) {
		echo "Empleado ya existe"."<br>";
		echo $e->getMessage();
	}
}



	
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