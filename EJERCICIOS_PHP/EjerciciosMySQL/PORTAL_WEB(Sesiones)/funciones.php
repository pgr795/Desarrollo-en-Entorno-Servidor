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


function generarClave($apellido){
	return strrev($apellido);
}

function añadirCliente($conexion,$nif,$nombre,$apellido,$cp,$direccion,$ciudad,$clave){
	try {
		$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
		$stmt = $conexion->prepare("INSERT INTO cliente (nif,nombre,apellido,cp,direccion,ciudad,clave)
		VALUES ('$nif','$nombre','$apellido','$cp','$direccion','$ciudad','$clave')");
		$stmt->execute();
		header("location: comlogincli.php");
		echo "<br>";
		echo "Cliente añadido";
	}
	catch(PDOException $e) {
			echo "Error al insertar cliente: ". $e->getMessage();
	}
		$conexion = null;	
	}

	
//------------------------------------------------------------------------------------------------------------------
	//Validaciones
	function validacion($nif){
		$numero=substr($nif,0,7);
		$letra=substr($nif,-1);
		$correcto=true;
		if(strlen($nif)==8 && $nif!=""){
			for($i=0;$i<strlen($numero);$i++){
				if(!is_numeric(substr($numero,$i,1))){
					$correcto=false;
				}
			}
			if(!ctype_alpha($letra)){
				$correcto=false;
			}
			else{
				$correcto=false;
			}
			return $correcto;
		}
	}
	
	
// -----------------------------------------------------------------------------------------------------------------	

	//GENERAR CODIGOS DE CAMPOS
	function generarCodigo(){
		try {
			$conexion=crear_conexion();
			$stmt = $conexion -> prepare("SELECT MAX(ID_CATEGORIA) as ultimoCodigo FROM categoria");
			$stmt->execute();
			$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
			
			foreach($stmt->fetchAll() as $row){
				$ultimoCodigo=$row['ultimoCodigo'];
			}
			var_dump($ultimoCodigo);
		
			if(empty($ultimoCodigo)){
				$CodigoDepartamento="C-000";
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
			$conexion=crear_conexion();
			$stmt = $conexion -> prepare("SELECT MAX(ID_PRODUCTO) as ultimoCodigo FROM producto");
			$stmt->execute();
			$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
			
			foreach($stmt->fetchAll() as $row){
				$ultimoCodigo=$row['ultimoCodigo'];
			}
			var_dump($ultimoCodigo);
		
			if(empty($ultimoCodigo)){
				$CodigoDepartamento="P0000";
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
			$conexion=crear_conexion();
			$stmt = $conexion -> prepare("SELECT MAX(NUM_ALMACEN) as ultimoCodigo FROM almacen");
			$stmt->execute();
			$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
			
			foreach($stmt->fetchAll() as $row){
				$ultimoCodigo=$row['ultimoCodigo'];
			}
		
			if(empty($ultimoCodigo)){
				$CodigoDepartamento=$auxCodigoDepartamento;
			}
			else{
				$codigo="0";
				$num=$codigo;
				$num+=10;
				$CodigoDepartamento=$num;
			}
			return $CodigoDepartamento;
		}
		catch(PDOException $e) {
			echo "Error: ". $e->getMessage();
		}
		
		$conexion = null;
		
	}
	
// -----------------------------------------------------------------------------------------------------------------	

// MOSTRAR SELECT
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
	
	
	function mostrarSelect2(){
		try {
			$conexion=crear_conexion();
			$stmt = $conexion->prepare("SELECT id_producto,nombre FROM producto");
			$stmt->execute();
			$resultado = $stmt->setFetchMode(PDO::FETCH_ASSOC);
			echo "<select name='producto'>";
			foreach($stmt->fetchAll() as $consulta){
			  echo '<option value="'.$consulta["id_producto"].'">'.$consulta["nombre"].'</option>';
	
			}
			echo "</select>";
		}
		catch(PDOException $e){
			echo "Error:". $e->getMessage();
		}
		$conexion = null;
	}
	
	function mostrarSelect3(){
		try {
			$conexion=crear_conexion();
			$stmt = $conexion->prepare("SELECT num_almacen FROM almacen");
			$stmt->execute();
			$resultado = $stmt->setFetchMode(PDO::FETCH_ASSOC);
			echo "<select name='almacen'>";
			foreach($stmt->fetchAll() as $consulta){
			  echo '<option value="'.$consulta["num_almacen"].'">'.$consulta["num_almacen"].'</option>';
	
			}
			echo "</select>";
		}
		catch(PDOException $e){
			echo "Error:". $e->getMessage();
		}
		$conexion = null;
	}
	
	function mostrarSelect4(){
		try {
			$conexion=crear_conexion();
			$stmt = $conexion->prepare("SELECT nif,nombre FROM cliente");
			$stmt->execute();
			$resultado = $stmt->setFetchMode(PDO::FETCH_ASSOC);
			echo "<select name='cliente'>";
				
				foreach($stmt->fetchAll() as $consulta){
				  echo '<option value="'.$consulta["nif"].'">'.$consulta["nombre"].'</option>';
				}
				
			echo "</select>";
		}
		catch(PDOException $e){
			echo "Error:". $e->getMessage();
		}
		$conexion = null;
	}

// -----------------------------------------------------------------------------------------------------------------	

	//INSERTAR NUEVO CAMPOS

	function insertar_categoria($conexion,$categoria){
		try {
			$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$codigo=generarCodigo();
			var_dump($codigo);

			$stmt = $conexion->prepare("INSERT INTO categoria (id_categoria,nombre)
			VALUES ('$codigo', '$categoria')");
			$stmt->execute();
			
			var_dump($stmt);
			
			echo "<br>";
			echo "Categoria añadida";
		}
		catch(PDOException $e) {
			echo "Error al insertar Categoria: ". $e->getMessage();
		}
		$conexion = null;	
	}
	
	
	function insertar_cliente($conexion,$NIF,$Nombre,$Apellido,$CP,$Direccion,$Ciudad){
		try {
			if(empty($NIF)){
				$nifErr = "<p>NIF ES REQUERIDO</p>";
				echo $nifErr;
			} 
			else{
				if(!validacion($NIF)){
					$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$stmt = $conexion->prepare("INSERT INTO cliente (nif,nombre,apellido,cp,direccion,ciudad)
					VALUES ('$NIF','$Nombre','$Apellido','$CP','$Direccion','$Ciudad')");
					$stmt->execute();		
					echo "<br>";
					echo "<p>Cliente añadido</p>";
				}
				else{
					echo "<p>FORMATO DE NIF INCORRECTO</p>";
				}
			}
		}
		catch(PDOException $e) {
			echo "Error al insertar Cliente: ". $e->getMessage();
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
			echo "Producto añadida";
		}
		catch(PDOException $e) {
			echo "Error al insertar Producto: ". $e->getMessage();
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
			echo "Almacen añadido";
		}
		catch(PDOException $e) {
			echo "Error al insertar Almacen: ". $e->getMessage();
		}
		$conexion = null;	
	}
	
	function aprovisionarProductos($conexion,$cantidad,$producto,$numAlmacen){
		try {
			$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$codigo=generarCodigo3();

			$stmt = $conexion->prepare("INSERT INTO almacena (num_almacen,id_producto,cantidad)
			VALUES ('$numAlmacen','$producto','$cantidad')");
			$stmt->execute();
			echo "<br>";
			echo "Cantidad Almacenada";
		}
		catch(PDOException $e) {
			echo "Error al insertar Cantidad: ". $e->getMessage();
		}
		$conexion = null;	
	}
	
	function compraDeProductos($conexion,$cliente,$producto,$fechaCompra,$unidades){
		try {
			$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$stmt = $conexion->prepare("INSERT INTO compra (nif,id_producto,fecha_compra,unidades)
			VALUES ('$cliente','$producto','$fechaCompra','$unidades')");
			$stmt->execute();
			echo "Compra Realizada";
			
		}
		catch(PDOException $e) {
			echo "Error al comprar el Producto: ". $e->getMessage();
		}
		$conexion = null;
	}
	
	
// -----------------------------------------------------------------------------------------------------------------	
	
	// CONSULTAS DE CAMPOS
	
	function consultarStock($conexion,$producto){
		try {
			$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$stmt = $conexion->prepare("SELECT cantidad FROM almacena WHERE id_producto='$producto'");
			$stmt->execute();
		
			foreach($stmt->fetchAll() as $row){
				echo "<br>";
				echo "Cod_Producto: ".$producto." Cantidad: ".$row["cantidad"]."<br>";
			}
		}
		catch(PDOException $e) {
			echo "Error al insertar cantidad: ". $e->getMessage();
		}
		$conexion = null;	
	}
	
	function consultarProductos($conexion,$almacen){
		try {
			$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$stmt = $conexion->prepare("select id_producto,cantidad from almacena almacen where num_almacen='$almacen'");
			$stmt->execute();
		
			foreach($stmt->fetchAll() as $consulta){
				echo "<br>";
				echo "<b>Cod_Producto:</b> ".$consulta["id_producto"]."<br>"." <b>Cantidad:</b> ".$consulta["cantidad"]."<br>";
			}
		}
		catch(PDOException $e) {
			echo "Error al insertar cantidad: ". $e->getMessage();
		}
		$conexion = null;	
	}
	
	function consultarCompras($conexion,$almacen){
		try {
			$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$stmt = $conexion->prepare("select id_producto,cantidad from almacena almacen where num_almacen='$almacen'");
			$stmt->execute();
		
			foreach($stmt->fetchAll() as $consulta){
				echo "<br>";
				echo "<b>Cod_Producto:</b> ".$consulta["id_producto"]."<br>"." <b>Cantidad:</b> ".$consulta["cantidad"]."<br>";
			}
		}
		catch(PDOException $e) {
			echo "Error al insertar cantidad: ". $e->getMessage();
		}
		$conexion = null;	
	}
	
	function disponibilidadAlmacen($conexion,$producto){
		try {
			$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$stock="";
			
			$stmt = $conexion->prepare("select sum(cantidad) as stock from almacena where id_producto='$producto'");
			$stmt->execute();
		
			foreach($stmt->fetchAll() as $consulta){
				$stock=$consulta["stock"];
			}
			
			return $stock;
		}
		catch(PDOException $e) {
			echo "Error: ". $e->getMessage();
		}
		$conexion = null;	
	}
	
	function consultarCompras2($conexion,$cliente,$fechaIni,$fechaFin){
		$total=0;
		
		$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $conexion->prepare("SELECT CLIENTE.NOMBRE AS CLIENTE,PRODUCTO.NOMBRE AS PRODUCTO,PRODUCTO.PRECIO,COMPRA.FECHA_COMPRA FROM CLIENTE,PRODUCTO,COMPRA
        WHERE CLIENTE.NIF = COMPRA.NIF AND PRODUCTO.ID_PRODUCTO = COMPRA.ID_PRODUCTO
        AND CLIENTE.NIF = '$cliente' AND COMPRA.FECHA_COMPRA >= '$fechaIni' AND COMPRA.FECHA_COMPRA <= '$fechaFin'");
		$stmt->execute();
		
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);//Guardo los resultados
        foreach($stmt->fetchAll() as $row) {
			echo "Cliente: ".$row['CLIENTE']." || Producto: ".$row['PRODUCTO']." || Precio: ".$row['PRECIO']."€ ||FechaCompra ".$row['FECHA_COMPRA'];
			$total += $row['PRECIO'];
			echo "<br>";
       }
	   echo "Total: ".$total."€";
    }
		
	
	
// -----------------------------------------------------------------------------------------------------------------	
	
	// ACTUALIZAR CAMPOS
	
	function actualizarAlmacen($conexion,$producto,$unidades){
		$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $conexion->prepare("SELECT ALMACENA.CANTIDAD AS STOCK FROM PRODUCTO,ALMACEN,ALMACENA
                              WHERE PRODUCTO.ID_PRODUCTO = ALMACENA.ID_PRODUCTO AND ALMACEN.NUM_ALMACEN = ALMACENA.NUM_ALMACEN
                              AND PRODUCTO.ID_PRODUCTO = '$producto'");
		$stmt->execute();
		
		foreach($stmt->fetchAll() as $consulta){
				$stock=$consulta["STOCK"];
		}
	}
	
?>