<?php
	
require_once("../db/altaempleado_db.php");

function altaEmpleado($datosRecogidos){
		global $conexion;
	try{
		
		foreach($datosRecogidos as $indice => $valor){
			$nombre=$valor[0];
			$apellido=$valor[1];
			$fecha_nacimiento=$valor[2];
			$genero=$valor[3];
			$contratacion=$valor[4];
			$expiracion=$valor[5];
			$departamento=$valor[6];
			$salario=$valor[7];
			$cargo=$valor[8];
			$fecha=date("Y-m-d");
			$cont=0;
			
			$stmt = $conexion->prepare("select * from employees where birth_date='$fecha_nacimiento' and first_name='$nombre' and last_name='$apellido'");
			$stmt->execute();
			
				foreach($stmt->fetchAll() as $consulta){
				  $cont++;
				}
				
				if($cont==0){
				  $idNuevo=maxEmpNo();
				  insertEmployees($idNuevo,$nombre,$apellido,$fecha_nacimiento,$genero,$contratacion,$expiracion);
				  insertDepartments($idNuevo,$departamento,$fecha,$expiracion);
				  insertSalaries($idNuevo,$salario,$fecha,$expiracion);
				  insertTitles($idNuevo,$cargo,$fecha,$expiracion);
				  echo "<p>Nuevos empleados dados de alta</p>";
				}
				else{
					echo "<p>Ya existe el empleado $nombre $apellido</p>";
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

function mostrarEmpleado($aux){
		try {
			echo "<table border='1px'>";
				foreach($aux as $indice => $valor){
					echo "<tr>";
						echo "<td>".$valor[0]."</td>";
						echo "<td>".$valor[1]."</td>";
						echo "<td>".$valor[2]."</td>";
						echo "<td>".$valor[3]."</td>";
						echo "<td>".$valor[4]."</td>";
						echo "<td>".$valor[5]."</td>";
						echo "<td>".$valor[6]."</td>";
						echo "<td>".$valor[7]."</td>";
						echo "<td>".$valor[8]."</td>";
					echo "<tr>";
				}
			echo "</table>";
		}
		catch(PDOException $e){
			echo "Error:". $e->getMessage();
		}
}
?>