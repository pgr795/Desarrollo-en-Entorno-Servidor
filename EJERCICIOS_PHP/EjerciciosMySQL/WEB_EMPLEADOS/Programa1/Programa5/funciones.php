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
		function listadoHistorico($conexion,$departamento){
		try {
			$contador=0;
			var_dump($departamento);
			$stmt = $conexion->prepare("SELECT nombre FROM empleado,departamento,emple_depart
                              WHERE empleado.dni = emple_depart.dni AND departamento.cod_dpto = emple_depart.cod_dpto
                              AND departamento.cod_dpto = '$departamento' AND emple_depart.fecha_fin IS NOT NULL");
			var_dump($stmt);			  
		// Se usa exec() porque no se devuelven resultados
			$stmt->execute();
			$resultado = $stmt->setFetchMode(PDO::FETCH_ASSOC);
			
			echo "<ul>";
			foreach($stmt->fetchAll() as $row){
				echo "<li>".$row["nombre"]."</li>";
				$contador++;
			}
			if ($contador== 0) {
				   echo "<li>No existe Historico del departamento</li>";
			}
			echo "</ul>";
		}
		catch(PDOException $e) {
			echo "Error: ". $e->getMessage();
		}
		$conexion = null;
	}
?>