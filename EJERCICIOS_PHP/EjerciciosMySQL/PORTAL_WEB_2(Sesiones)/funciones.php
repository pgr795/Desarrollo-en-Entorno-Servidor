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
		if($nif!="" || $nombre!="" || $apellido!="" || $cp!="" || $direccion!="" || $ciudad!=""){	
			$stmt = $conexion->prepare("INSERT INTO cliente (nif,nombre,apellido,cp,direccion,ciudad,clave)
			VALUES ('$nif','$nombre','$apellido','$cp','$direccion','$ciudad','$clave')");
			$stmt->execute();
			header("location: comlogincli.php");
		}
		else{
			echo "HAY CAMPOS VACIOS";		
		}
	}
	catch(PDOException $e) {
			echo "Error al insertar cliente: ". $e->getMessage();
	}
		$conexion = null;	
	}

//--------------------------------------------------------------------------------------------------------
	function carritoComprar($productos){
		echo "<h2>Carrito de la compra</h2>";
		$aux=count($productos);
		//var_dump($aux);
		foreach($productos as $clave => $valor){
				if($aux==1){
					echo "<p>$valor</p>";
				}
				else{
					echo "<p>Producto:$valor[0] Unidades:$valor[1]</p>";
				}
		}
		unset($_SESSION['datos']);
	}
//--------------------------------------------------------------------------------------------------------		
	function accionEnvio(){
	
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$valor1 = limpieza($_POST["comprar"]);
			$valor2 = limpieza($_POST["consultar"]);
			$valor3 = limpieza($_POST["cerrar"]);
			
			
			if($valor1=="Comprar Productos"){
				header("location: compro.php");
			}
			else if($valor2=="Consulta Compras"){
				header("location: comconscom.php");
			}
			else if($valor3=="Cerrar Sesion"){
				// remove all session variables
				session_unset();
				// destroy the session
				session_destroy();
				header("location: comlogincli.php");
			}
		}
	}
	
//--------------------------------------------------------------------------------------------------------
	//Validaciones
	function validacion($nif){
		$numero=substr($nif,0,8);
		$letra=substr($nif,-1);
		$correcto=true;
		if(strlen($nif)==9 && $nif!=""){
			for($i=0;$i<strlen($numero);$i++){
				if(!is_numeric($numero[$i])){
					$correcto=false;
				}
				if(!ctype_alpha($letra)){
					$correcto=false;
				}
			}
		}
		else{
			$correcto=false;
		}
			var_dump($correcto);
			var_dump($numero);
			var_dump($letra);
			return $correcto;
		
	}
	
	
//-----------------------------------------------------------------------------------------------------------------	
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
	
	function mostrarSelect4($nif){
		try {
			$conexion=crear_conexion();
			$stmt = $conexion->prepare("SELECT nif,nombre FROM cliente where nif='$nif'");
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
	
	function mostrarProductos($aux){
	
		$datos=$aux;
		
		foreach($datos as $indice => $valor){
			echo "<p>Producto:$valor[0] Unidades:$valor[1]</p>";
		}
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
	
	function compraDeProductos($conexion,$cliente,$fechaCompra,$datosRecogidos){
		try {
			$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			var_dump($datosRecogidos);
				foreach($datosRecogidos as $indice => $valor){
					$productos=$valor[0];
					$unidades=$valor[1];
					//var_dump($unidades);
					//var_dump($productos);
						$stmt = $conexion->prepare("INSERT INTO compra (nif,id_producto,fecha_compra,unidades)
						VALUES ('$cliente','$productos','$fechaCompra','$unidades')");
						$stmt->execute();
						echo "Compra Realizada";
					}	
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
	

	
		
	
	
// -----------------------------------------------------------------------------------------------------------------	
	
	// ACTUALIZAR CAMPOS
	
	function actualizarAlmacen($conexion,$datosRecogidos){
		$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$conexion2=crear_conexion();
		$unidades="";
		$productos="";
		
		foreach($datosRecogidos as $indice => $valor){
			$productos=$valor[0];
			$unidades=$valor[1];
			//var_dump($unidades);
			//var_dump($productos);
			
			$stmt = $conexion->prepare("select num_almacen,cantidad from almacena where id_producto='$productos'");
			$stmt->execute();
			
			foreach($stmt->fetchAll() as $consulta){
					$stock=$consulta['cantidad'];
					var_dump($stock);
					var_dump($unidades);
					if($stock>$unidades){
						$stmt2 = $conexion2->prepare("UPDATE almacena SET cantidad = cantidad - '$unidades' WHERE id_producto = '$productos'");
						$stmt2->execute();
					}
					else{
						$_SESSION['datos']=array("No hay unidades del $productos en este momento");
					}
					//var_dump($stock);
			}
		}
		$conexion=null;
		$conexion2=null;
	}
?>