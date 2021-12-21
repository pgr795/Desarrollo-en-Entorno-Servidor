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
		echo "Conectado";
		return $conexion;
		}
		catch(PDOException $e){
			echo "Conexion fallida: " . $e->getMessage();
		}
		
	}

	function generarCodigo(){
		try {
			$auxCod="C-000";
			$codigo=substr($auxCod,2,3);
			$num=$codigo;
			$num+=1;
			$auxCodigoDepartamento="C-".str_pad($num,3,"0",STR_PAD_LEFT);
			$CodigoDepartamento="";
			
			$conexion=crear_conexion();
			$stmt = $conexion -> prepare("SELECT MAX(ID_CATEGORIA) as ultimoCodigo FROM categoria");
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
				$codigo=substr($ultimoCodigo,2,3);
				$num=$codigo;
				$num+=1;
				$auxCodigoDepartamento="C-".str_pad($num,3,"0",STR_PAD_LEFT); 
				$CodigoDepartamento=$auxCodigoDepartamento;
			}
			
			return $CodigoDepartamento;
			
		}
		
		catch(PDOException $e) {
			echo "Error: ". $e->getMessage();
		}
		
		$conexion = null;
		
	}

	function generarCodigo2(){
		try {
			$auxCod="P0000";
			$codigo=substr($auxCod,1,4);
			$num=$codigo;
			$num+=1;
			$auxCodigoDepartamento="P".str_pad($num,4,"0",STR_PAD_LEFT);
			$CodigoDepartamento="";
			
			$conexion=crear_conexion();
			$stmt = $conexion -> prepare("SELECT MAX(ID_PRODUCTO) as ultimoCodigo FROM producto");
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
				$codigo=substr($ultimoCodigo,1,4);
				$num=$codigo;
				$num+=1;
				$auxCodigoDepartamento="P".str_pad($num,4,"0",STR_PAD_LEFT); 
				$CodigoDepartamento=$auxCodigoDepartamento;
			}
			
			return $CodigoDepartamento;
			
		}
		
		catch(PDOException $e) {
			echo "Error: ". $e->getMessage();
		}
		
		$conexion = null;
		
	}

	function generarCodigo3(){
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

	function mostrarSelect(){
		try {
			$conexion=crear_conexion();
			$stmt = $conexion->prepare("SELECT id_categoria,nombre FROM categoria");
			$stmt->execute();
			$resultado = $stmt->setFetchMode(PDO::FETCH_ASSOC);
			echo "<select name='categoria'>";
			foreach($stmt->fetchAll() as $consulta){
			  echo '<option value="'.$consulta["id_categoria"].'">'.$consulta["nombre"].'</option>';
	
			}
			echo "</select>";
		}
		catch(PDOException $e){
			echo "Error:". $e->getMessage();
		}
		$conexion = null;
	}
	
	function insertar_categoria($conexion,$categoria){
		try {
		$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$codigo=generarCodigo();
		var_dump($codigo);

		$stmt = $conexion->prepare("INSERT INTO categoria (id_categoria,nombre)
		VALUES ('$codigo', '$categoria')");
		$stmt->execute();
		echo "<br>";
		echo "Categoria añadida";
		}
		catch(PDOException $e) {
			echo "Error al insertar Categoria: ". $e->getMessage();
		}
		$conexion = null;	
	}

	function insertar_Producto($conexion,$producto,$precio,$categoria){
		try {
		$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$codigo=generarCodigo2();
		var_dump($codigo);

		$stmt = $conexion->prepare("INSERT INTO producto (id_producto,nombre,precio,id_categoria)
		VALUES ('$codigo','$producto','$precio','$categoria')");
		$stmt->execute();
		echo "<br>";
		echo "Categoria añadida";
		}
		catch(PDOException $e) {
			echo "Error al insertar Categoria: ". $e->getMessage();
		}
		$conexion = null;	
	}

	function alta_almacen($conexion,$localidad){
		try {
		$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$codigo=generarCodigo3();
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

