<?php

function insertEmployees($idNuevo,$nombre,$apellido,$fecha_nacimiento,$genero,$contratacion){
	//TABLA EMPLOYEES
	global $conexion;
		try{
			$stmt = $conexion->prepare("INSERT INTO employees (emp_no, birth_date, first_name, last_name, gender, hire_date)
			VALUES ('$idNuevo','$fecha_nacimiento','$nombre','$apellido','$genero','$contratacion')");
			$stmt->execute();
		}
		catch(PDOException $e){
			echo "Error: " . $e->getMessage();	
		}
}

function insertDepartments($idNuevo,$departamento,$fecha,$expiracion) {
	//TABLA DEPT_EMP
	global $conexion;
		try{
			$stmt = $conexion->prepare("INSERT INTO DEPT_EMP (emp_no, dept_no, from_date, to_date)
			VALUES ('$idNuevo','$departamento','$fecha','$expiracion')");
			$stmt->execute();
		}
		catch(PDOException $e){
			echo "Error Departments: " . $e->getMessage();	
		}
}

function insertSalaries($idNuevo,$salario,$fecha,$expiracion) {
	//TABLA SALARIES
	global $conexion;
		try{
			$stmt = $conexion->prepare("INSERT INTO SALARIES (emp_no, salary, from_date, to_date)
			VALUES ('$idNuevo','$salario','$fecha','$expiracion')");
			$stmt->execute();
		}
		catch(PDOException $e){
			echo "Error Salaries: " . $e->getMessage();	
		}
}

function insertTitles($idNuevo,$cargo,$fecha,$expiracion) {
	//TABLA TITLES
	global $conexion;
		try{
			$stmt = $conexion->prepare("INSERT INTO TITLES (emp_no, title, from_date, to_date)
			VALUES ('$idNuevo','$cargo','$fecha','$expiracion')");
			$stmt->execute();
		}
		catch(PDOException $e){
			echo "Error Titles: " . $e->getMessage();	
		}
}
?>
