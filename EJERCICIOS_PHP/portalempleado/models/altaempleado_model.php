<?php
	
require_once("../db/altaempleado_db.php");

function altaEmpleado($nombre,$apellido,$fecha_nacimiento,$genero,$contratacion,$expiracion,$departamento,$salario,$cargo,$idNuevo,$fecha){
		global $conexion;
	try{
		if($nombre!="" && $departamento!="" && $salario!="" && $cargo!=""){
			$stmt = $conexion->prepare("select * from employees where birth_date='$fecha_nacimiento' and first_name='$nombre' and last_name='$apellido'");
			$stmt->execute();
			$cont=0;
			foreach($stmt->fetchAll() as $consulta){
			  $cont++;
			}
			
			if($cont==0){
			  insertEmployees($idNuevo,$nombre,$apellido,$fecha_nacimiento,$genero,$contratacion,$expiracion);
			  insertDepartments($idNuevo,$departamento,$fecha,$expiracion);
			  insertSalaries($idNuevo,$salario,$fecha,$expiracion);
			  insertTitles($idNuevo,$cargo,$fecha,$expiracion);
			}
			else{
			  echo "Ya existe este empleado";
			}
		}
	}
	catch(PDOException $e){
		echo "Error: " . $e->getMessage();	
	}
}

function maxEmpNo(){
	try{
	global $conexion;
		$stmt = $conexion->prepare("select max(emp_no) as ID from employees");
		$stmt->execute();
		$maxEmpNo="";
		foreach($stmt->fetchAll() as $consulta){
			$maxEmpNo=$consulta['ID']+1;
		}
		return $maxEmpNo;
	}
	catch(PDOException $e){
		echo "Error: " . $e->getMessage();	
	}
}

function mostrarDepartamento(){
		try {
		global $conexion;
			$stmt = $conexion->prepare("select dept_no, dept_name from departments");// select concat(matricula,'#',marca,'#',modelo) as pepe from rvehiculos where disponible='S';
			$stmt->execute();
			echo "<select name='departamentos' class='form-control'>";
				foreach($stmt->fetchAll() as $consulta){
					echo '<option value="'.$consulta["dept_no"].'">'.$consulta["dept_name"].'</option>';
				}
			echo "</select>";
		}
		catch(PDOException $e){
			echo "Error:". $e->getMessage();
		}
}

?>