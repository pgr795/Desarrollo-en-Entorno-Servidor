<?php
	include('funciones.php');
	
	//Limpieza de Parametros
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$valor1 = limpieza($_POST["departamento"]);
	}


	//Parametros
	$conexion=crear_conexion();
	$codigoDepartamento=generarCodigoDepartamento($conexion);
	$departamento=$valor1;
	alta_departamento($conexion,$codigoDepartamento,$departamento);

	
	function generarCodigoDepartamento($conexion){ 
		$auxCod="D000";
		$codigo=substr($auxCod,1,3);
		$num=$codigo;
		$num+=1;
		$auxCodigoDepartamento="D".str_pad($num,3,"0",STR_PAD_LEFT); 
		$CodigoDepartamento="";
		
		$sql = "SELECT MAX(cod_dpto) as ultimoCodigo FROM departamento";  
		$resultado = mysqli_query($conexion, $sql);
		$row = mysqli_fetch_assoc($resultado);
		// var_dump($resultado);
		// var_dump($row);
		$ultimoCodigo = $row['ultimoCodigo'];
		
		
		if(empty($ultimoCodigo)){
			$CodigoDepartamento=$auxCodigoDepartamento;
		}
		else{
			$codigo=substr($ultimoCodigo,1,4);
			$num=$codigo;
			$num+=1;
			$auxCodigoDepartamento="D".str_pad($num,3,"0",STR_PAD_LEFT);  
			$CodigoDepartamento=$auxCodigoDepartamento;
		}
		return $CodigoDepartamento;
		
		// var_dump($num);
		// var_dump($codigoDepartamento);
	}
	
	function alta_departamento($conexion,$cod_Departamento,$nombre_Departamento){
		$conex=$conexion;
			$sql = "INSERT INTO departamento VALUES ('$cod_Departamento','$nombre_Departamento')";
			if (mysqli_query($conex, $sql)) {
				echo "Nuevo registro creado con éxito";
			} 
			else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conex);
			}
		mysqli_close($conex);
	}
	
?>