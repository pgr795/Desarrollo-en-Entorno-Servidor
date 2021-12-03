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
		$conexion = new PDO("mysql:host=$servername;dbname=myDB", 
		$username, $password);
		$conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		echo "Conectado";
		}
		catch(PDOException $e){
			echo "Conexion fallida: " . $e->getMessage();
		}
		return $conexion;
	}

	function mostrarSelect($conexion){
		try {
			$stmt = $conexion->prepare("SELECT * FROM departamento");
			$stmt->execute();
			$resultado = $stmt->setFetchMode(PDO::FETCH_ASSOC);
			while ($resultado = $stmt->setFetchMode(PDO::FETCH_ASSOC)) {
				echo '<option value="'.$resultado[nombre_dpto].'">'.$resultado[nombre_dpto].'</option>';
			}
		}
		catch(PDOException $e){
			echo "Error:". $e->getMessage();
		}
		$conexion = null;
	}
		
	function alta_empleado($conexion,$dni,$nombre,$apellido,$fecha,$salario,$departamento){
		$conex=$conexion;
			
		//INSERTAR EN TABLA EMPLEADO
		$sql = "INSERT INTO empleado VALUES ('$dni','$nombre','$fecha','$departamento')";
			if (mysqli_query($conex, $sql)) {
				echo "New record created successfully";
			} 
			else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conex);
			}

		//CONSULTA CODIGO DE DEPARTAMENTO
	


		//SACAR VARIABLE FECHA_INI y FECHA_FIN
		//INSERTAR EN TABLA EMPLE_DEPART
			$sql2 = "INSERT INTO emple_depart VALUES ('$dni','$cod_dpto','$fecha_ini','$departamento')";
			if (mysqli_query($conex, $sql)) {
				echo "New record created successfully";
			} 
			else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conex);
			}
			mysqli_close($conex);



	}

	// $fechaAlta= date("Y-m-d H:i:s");
	// tipos datos "fecha" > datetime, date,timestamp
	//  Por potencia: de menor a mayor.
	//  datetime
	//  date
	//  timestamp
	//  Nunca se trata una fecha como un STRING
	//  Castear las fechas o con la funcion settime
	// 	03/12/2021=20211203
	// 	25/11/2021=20211125
?>

