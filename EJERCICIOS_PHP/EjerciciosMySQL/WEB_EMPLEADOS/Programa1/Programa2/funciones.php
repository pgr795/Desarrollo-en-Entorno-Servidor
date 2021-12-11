<?php
	function limpieza($datos) {
	  $datos = trim($datos);
	  $datos = stripslashes($datos);
	  $datos = htmlspecialchars($datos);
	  return $datos;
	}
	// var_dump($_POST);
	
	
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
		
	function alta_empleado($conexion,$dni,$nombre,$apellido,$fecha,$salario,$cod_dpto){
		insertEmpleado($conexion,$dni,$nombre,$apellido,$fecha,$salario);
		$departamento=consultaDepartamento($conexion,$cod_dpto);
		//SACAR VARIABLE FECHA_INI
		$fecha_inicio=date("Y-m-d");
		// $fecha_inicio=date("Y-m-d H:i:s");
		insertEmple_depart($conexion,$dni,$cod_dpto,$fecha_inicio);
	}
	
	
	function consultaDepartamento($conexion,$cod_dpto){
	//CONSULTA NOMBRE DE DEPARTAMENTO POR EL CODIGO
		$departamento="";
		try {
			$stmt = $conexion->prepare("SELECT nombre_dpto FROM departamento where cod_dpto='$cod_dpto'");
			$stmt->execute();
			$departamento = $stmt->setFetchMode(PDO::FETCH_ASSOC);
			foreach($stmt->fetchAll() as $row){
			  $departamento=$row['nombre_dpto'];
			}
			
		}
		catch(PDOException $e) {
			echo $departamento . "<br>" . $e->getMessage();
		}
		return $departamento;
	}
	
	function insertEmpleado($conexion,$dni,$nombre,$apellido,$fecha,$salario){
	//INSERTAR EN TABLA EMPLEADO
		try {
			$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO empleado VALUES ('$dni','$nombre','$apellido','$fecha','$salario')";
		
		// Se usa exec() porque no se devuelven resultados
			$conexion->exec($sql);
			echo "Nuevo registro creado con éxito"."<br>";

		}
		catch(PDOException $e) {
			echo $sql . "<br>" . $e->getMessage();
		}
	}
	
	function insertEmple_depart($conexion,$dni,$cod_dpto,$fecha_inicio){
			//INSERTAR EN TABLA EMPLE_DEPART
		try {
			$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO emple_depart VALUES ('$dni','$cod_dpto','$fecha_inicio',null)";
		
		// Se usa exec() porque no se devuelven resultados
			$conexion->exec($sql);
			echo "Nuevo registro creado con éxito"."<br>";

		}
		catch(PDOException $e) {
			echo $sql . "<br>" . $e->getMessage();
		}
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