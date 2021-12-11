<?php
	function limpieza($datos) {
	  $datos = trim($datos);
	  $datos = stripslashes($datos);
	  $datos = htmlspecialchars($datos);
	  return $datos;
	}
	
	function crear_conexion(){
		$servername = "localhost"; //or IP
		$username = "root";
		$password = "rootroot";
		$dbname="empleadosnn";

		try {
			$conexion = new PDO("mysql:host=$servername;dbname=empleadosnn", 
			$username, $password);

			//Para establecer el modo de error PDO en excepción
			
			$conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			return $conexion;
		}
		catch(PDOException $e){
			echo "Conexion fallida: " . $e->getMessage();
		}
	}
	
	
	function mostrarSelect(){
		try {
			$conexion=crear_conexion();
			$stmt = $conexion->prepare("SELECT nombre,dni FROM empleado");
			$stmt->execute();
			$resultado = $stmt->setFetchMode(PDO::FETCH_ASSOC);
			echo "<select name='nombre'>";
			foreach($stmt->fetchAll() as $row){
			  echo '<option value="'.$row[dni].'">'.$row[nombre].'</option>';
			}
			echo "</select>";
		}
		catch(PDOException $e){
			echo "Error:". $e->getMessage();
		}
		$conexion = null;
	}
	
	function modificarSueldo($conexion,$empleado,$porcentaje){
		try {	
			if($porcentaje > 1){
				$auxPorcentaje = sprintf("%'13s",$porcentaje);
				$resultado=$auxPorcentaje/100;
				$stmt = $conexion -> prepare("UPDATE empleado SET salario=salario*'$resultado' where dni='$empleado'");
				$stmt->execute();	
			}
			else{
				$aux2=abs($porcentaje);
				$auxPorcentaje = sprintf("%'13s",$aux2);
				$resultado=$auxPorcentaje/100;
				$stmt = $conexion -> prepare("UPDATE empleado SET salario=salario/'$resultado' where dni='$empleado'");
				$stmt->execute();	
			}
			echo "Sueldo de $empleado se ha actualizado";
			var_dump($stmt);
			
		}
		catch(PDOException $e) {
			echo "Error: ". $e->getMessage();
		}
		$conexion = null;	
	}
?>