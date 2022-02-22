<?php

function login($username,$password) {

	global $conexion;

	try{
		if($username!="" && $password!=""){
			$stmt = $conexion->prepare("SELECT employees.emp_no AS ID, employees.first_name as NOMBRE, last_name as APELLIDO, dept_emp.dept_no AS ID_DEPT,dept_name 
			FROM employees,dept_emp,departments 
			WHERE employees.emp_no=dept_emp.emp_no AND dept_emp.dept_no=departments.dept_no 
			AND employees.emp_no='$username' AND last_name='$password'");
			$stmt->execute();
			
			$cont=0;
			$nombreBD="";
			$apellidoBD="";
			$idEmpleadoBD="";
			$idEmpleadoDeptBD="";
			$estado="";
			
				foreach($stmt->fetchAll() as $consulta){
					$nombreBD=$consulta["NOMBRE"];
					$apellidoBD=$consulta["APELLIDO"];
					$idEmpleadoDeptBD=$consulta["ID_DEPT"];
					$idEmpleadoBD=$consulta["ID"];
					$nombreDepartamento=$consulta["dept_name"];
					$cont++;
				}
				
				if($cont == 1){
						session_start();
						$_SESSION['NOMBRE'] = $nombreBD." ".$apellidoBD;
						$_SESSION['ID'] = $idEmpleadoBD;
						$_SESSION['DEPT']=$nombreDepartamento;
						$estado=$nombreDepartamento;
				}
				else { 
					$error = "Usuario o password incorrectos !!!";
					session_destroy();
					session_unset();
					echo $error;
				}
				return $estado;
		}
	}
	catch(PDOException $e){
			echo "Error: " . $e->getMessage();	
		}
}
