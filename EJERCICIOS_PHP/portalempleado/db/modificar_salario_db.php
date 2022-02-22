<?php
	function modificarSalaries($idEmpleado,$salario){
	//TABLA SALARIES
	global $conexion;
		try{
			$stmt = $conexion->prepare("UPDATE SALARIES SET salary=$salario WHERE emp_no=$idEmpleado");
			$stmt->execute();
			echo "Salario ha sido modificado";
		}
		catch(PDOException $e){
			echo "Error Salaries: " . $e->getMessage();	
		}
}
?>
