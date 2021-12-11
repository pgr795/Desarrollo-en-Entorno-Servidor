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
	
	function listadoFecha($conexion,$fecha){
		try {
			$contador=0;
			$listado = array();
			$stmt = $conexion ->prepare("SELECT nombre,nombre_dpto FROM empleado,departamento,emple_depart
			  WHERE empleado.dni = emple_depart.dni AND departamento.cod_dpto = emple_depart.cod_dpto
			  AND '$fecha'>=emple_depart.fecha_ini AND '$fecha'<=ifnull(emple_depart.fecha_fin,'2221-12-12 00:00:00')");
			 
			$stmt->execute();
			$resultado = $stmt->setFetchMode(PDO::FETCH_ASSOC);//Guardo los resultados
			
			foreach($stmt->fetchAll() as $row) {
			  $listado[$contador] = "Departamento: ".$row['nombre_dpto']."||Empleado: ".$row['nombre'];
			  $contador++;
			}
		   return $listado;
		}
		catch(PDOException $e) {
			echo "Error: ".$e->getMessage();
		}
	}
?>