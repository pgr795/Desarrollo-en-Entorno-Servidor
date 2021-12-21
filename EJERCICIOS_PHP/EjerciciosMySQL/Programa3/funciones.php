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
		$dbname="comprasweb";
		try {
		$conexion = new PDO("mysql:host=$servername;dbname=comprasweb",$username,$password);
		$conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	
		return $conexion;
		}
		catch(PDOException $e){
			echo "Conexion fallida: " . $e->getMessage();
		}
		
	}
	
	function generarCodigo(){
		try {
			$auxCod="0";
			$num=$auxCod;
			$num+=10;
			$auxCodigoDepartamento=$num;
			$CodigoDepartamento="";
			
			$conexion=crear_conexion();
			$stmt = $conexion -> prepare("SELECT MAX(NUM_ALMACEN) as ultimoCodigo FROM almacen");
			$stmt->execute();
			$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
			
			foreach($stmt->fetchAll() as $row){
				$ultimoCodigo=$row['ultimoCodigo'];
			}
			var_dump($ultimoCodigo);
		
			if(empty($ultimoCodigo)){
				$CodigoDepartamento=$auxCodigoDepartamento;
			}
			else{
				$codigo=$ultimoCodigo;
				$num=$codigo;
				$num+=10;
				$CodigoDepartamento=$num;
			}
			 var_dump($CodigoDepartamento);
			return $CodigoDepartamento;
			
		}
		
		catch(PDOException $e) {
			echo "Error: ". $e->getMessage();
		}
		
		$conexion = null;
		
	}
	
	
	function alta_almacen($conexion,$localidad){
		try {
		$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$codigo=generarCodigo();
		var_dump($codigo);

		$stmt = $conexion->prepare("INSERT INTO almacen (num_almacen,localidad)
		VALUES ('$codigo','$localidad')");
		$stmt->execute();
		echo "<br>";
		echo "Categoria añadida";
		}
		catch(PDOException $e) {
			echo "Error al insertar Categoria: ". $e->getMessage();
		}
		$conexion = null;	
	}
?>