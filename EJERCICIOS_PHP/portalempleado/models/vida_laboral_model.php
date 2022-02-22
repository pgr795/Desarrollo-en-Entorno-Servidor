<?php
	
function vidaLaboral($idEmpleado){
	try{
		global $conexion;
		$stmt = $conexion->prepare("SELECT first_name,last_name,birth_date FROM employees WHERE emp_no='$idEmpleado'");
		$stmt->execute();
		echo "<p>Datos Personales:</p>";
		foreach($stmt->fetchAll() as $datosPersonales){
			echo "<p>".$datosPersonales["first_name"]." ".$datosPersonales["last_name"]." ".$datosPersonales["birth_date"]."</p>";
		}
		
		echo "<br>";
		
		$stmt2 = $conexion->prepare("SELECT dept_name,from_date,to_date FROM dept_emp,departments,employees WHERE employees.emp_no=dept_emp.emp_no AND dept_emp.dept_no=departments.dept_no AND employees.emp_no='$idEmpleado'");
		$stmt2->execute();
		
		echo "<p>Departamentos:</p>";
		foreach($stmt2->fetchAll() as $departamentos){
			echo "<p>".$departamentos["dept_name"]." ".$departamentos["from_date"]." ".$departamentos["to_date"]."</p>";
		}
		
		echo "<br>";
		
		$stmt3 = $conexion->prepare("SELECT salary,from_date,to_date FROM employees,salaries WHERE employees.emp_no=salaries.emp_no AND employees.emp_no='$idEmpleado'");
		$stmt3->execute();
		
		echo "<p>Salario:</p>";
		foreach($stmt3->fetchAll() as $salario){
			echo "<p>Salario:".$salario["salary"]." ".$salario["from_date"]." ".$salario["to_date"]."</p>";
		}
		
		echo "<br>";
		
		$stmt4 = $conexion->prepare("SELECT title,from_date,to_date FROM employees,titles WHERE employees.emp_no=titles.emp_no AND employees.emp_no='$idEmpleado'");
		$stmt4->execute();
		
		echo "<p>Titulos:</p>";
		foreach($stmt4->fetchAll() as $titles){
			echo "<p>".$titles["title"]." ".$titles["from_date"]." ".$titles["to_date"]."</p>";
		}
	}
	catch(PDOException $e){
		echo "Error: " . $e->getMessage();	
	}
}

?>