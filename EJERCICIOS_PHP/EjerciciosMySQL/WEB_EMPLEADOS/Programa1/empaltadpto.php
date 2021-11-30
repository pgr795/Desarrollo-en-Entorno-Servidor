<?php
	var_dump($_POST);
	
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$valor1 = limpieza($_POST["departamento"]);
	}

	function limpieza($datos) {
	  $datos = trim($datos);
	  $datos = stripslashes($datos);
	  $datos = htmlspecialchars($datos);
	  return $datos;
	}

	$conexion=crear_conexion();
	$codigoDepartamento=generarCodigoDepartamento($conexion);
	$departamento=$valor1;
	alta_departamento($conexion,$codigoDepartamento,$departamento);

	function crear_conexion(){
		$servername = "localhost"; //or IP
		$username = "root";
		$password = "rootroot";
		$dbname="empleadosnn";

	// Crear conexion
		
		$conexion = mysqli_connect($servername, $username, $password,$dbname);
		
	// Checkear conexion
		if (!$conexion) {
			die("Conexion fallida: " . mysqli_connect_error());
		}
		else{
			echo "Conexion: OK";
		}
		return $conexion;
	}

	
	function generarCodigoDepartamento($conexion){ 
		$auxCod="D0000";
		$codigo=substr($auxCod,1,4);
		$num=$codigo;
		$num+=1;
		$auxCodigoDepartamento="D".str_pad($num,3,"0",STR_PAD_LEFT); 
		$CodigoDepartamento="";
		
		$sql = "SELECT MAX(cod_dpto) as ultimoCodigo FROM departamento";  
		$resultado = mysqli_query($conexion, $sql);
		$row = mysqli_fetch_assoc($resultado);
		var_dump($resultado);
		var_dump($row);
		$ultimoCodigo = $row['ultimoCodigo'];
		
		
		if(empty($ultimoCodigo)){
			$CodigoDepartamento=$auxCodigoDepartamento;
		}
		else{
			$codigo=substr($ultimoCodigo,1,4);
			$num=$codigo;
			$num+=1;
			$auxCodigoDepartamento="D".str_pad($num,3,"0",STR_PAD_LEFT);  //D0001
			$CodigoDepartamento=$auxCodigoDepartamento;
		}
		return $CodigoDepartamento;
		
		var_dump($num);
		var_dump($codigoDepartamento);
	}
	
	function alta_departamento($conexion,$cod_Departamento,$nombre_Departamento){
		$conex=$conexion;
			$sql = "INSERT INTO departamento VALUES ('$cod_Departamento','$nombre_Departamento')";
			if (mysqli_query($conex, $sql)) {
				echo "New record created successfully";
			} 
			else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conex);
			}
		mysqli_close($conex);
	}
	
?>