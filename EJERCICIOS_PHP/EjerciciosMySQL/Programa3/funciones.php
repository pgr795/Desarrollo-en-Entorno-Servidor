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
			$stmt = $conexion->prepare("SELECT cod_dpto,nombre_dpto FROM departamento");
			$stmt->execute();
			$resultado = $stmt->setFetchMode(PDO::FETCH_ASSOC);
			echo "<select name='departamento'>";
			foreach($stmt->fetchAll() as $row){
			  echo '<option value="'.$row[cod_dpto].'">'.$row[nombre_dpto].'</option>';
			}
			echo "</select>";
		}
		catch(PDOException $e){
			echo "Error:". $e->getMessage();
		}
		$conexion = null;
	}
	
	
	function mostrarSelectDNI(){
		try {
			$conexion=crear_conexion();
			$stmt = $conexion->prepare("SELECT dni FROM empleado");
			$stmt->execute();
			$resultado = $stmt->setFetchMode(PDO::FETCH_ASSOC);
			echo "<select name='dni'>";
			foreach($stmt->fetchAll() as $row){
			  echo '<option value="'.$row[dni].'">'.$row[dni].'</option>';
			}
			echo "</select>";
		}
		catch(PDOException $e){
			echo "Error:". $e->getMessage();
		}
		$conexion = null;
	}
	
	
	function cambio_departamento($conexion,$dni,$departamento){
		try {
			// $fecha_ini=date("Y-m-d H:i:s");
			// $fecha_fin=date("Y-m-d H:i:s");
			$fecha_ini=date("Y-m-d");
			$fecha_fin=date("Y-m-d");
			$stmt = $conexion -> prepare("INSERT INTO emple_depart (dni,cod_dpto,fecha_ini,fecha_fin) VALUES ('$dni','$departamento','$fecha_ini','$fecha_ini')");
			$stmt->execute();
			var_dump($stmt);
			echo "Actualizado el registro"."<br>";
		}
		catch(PDOException $e) {
			echo "Error: ". $e->getMessage();
		}
		$conexion = null;
	}
?>