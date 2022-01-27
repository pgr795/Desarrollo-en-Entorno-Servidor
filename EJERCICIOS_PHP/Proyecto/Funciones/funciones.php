<?php

function conexion(){
		$servername = "localhost"; //or IP
		$username = "root";
		$password = "rootroot";
		$dbname="pedidos";
		try {
		$conexion = new PDO("mysql:host=$servername;dbname=pedidos",$username,$password);
		$conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		return $conexion;
		}
		catch(PDOException $e){
			echo "Conexion fallida: " . $e->getMessage();
		}
}

//--------------

function limpiarCampo($campo){
	$campo=trim($campo);
  	$campo=stripslashes($campo);
  	$campo=htmlspecialchars($campo);
  	return $campo;
}


//----------------------------------------------------

function selectProductos(){
		try {
			$conexion=conexion();
			$stmt = $conexion->prepare("SELECT productName,productCode FROM products where quantityInStock=quantityInStock>=0");
			$stmt->execute();
			$resultado = $stmt->setFetchMode(PDO::FETCH_ASSOC);
			echo "<select name='productos'>";
			foreach($stmt->fetchAll() as $consulta){
			  echo '<option value="'.$consulta["productCode"].'">'.$consulta["productName"].'</option>';
			}
			echo "</select>";
		}
		catch(PDOException $e){
			echo "Error:". $e->getMessage();
		}
		$conexion = null;
}

//----------------------------------------------------
function mostrarProductos($aux){
	
		$datos=$aux;
		
		foreach($datos as $indice => $valor){
				echo "<p>Producto:$valor[0] Unidades:$valor[1]</p>";
		}

	}
//----------------------------------------------------
function mostrarPrecioTotal($PrecioTotal){
	$aux=$_SESSION['datos'];
	mostrarProductos($aux);
	echo "<p>Precio total:$PrecioTotal</p>";

}
//----------------------------------------------------
function generarCodigoPedido(){
		try {
			$conexion=conexion();
			$stmt = $conexion -> prepare("SELECT MAX(orderNumber) as ultimoCodigo FROM orderdetails");
			$stmt->execute();
			$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
			
			foreach($stmt->fetchAll() as $row){
				$ultimoCodigo=$row['ultimoCodigo'];
			}
		
			if(empty($ultimoCodigo)){
				$CodigoDepartamento=1;
			}
			else{
				$codigo=$ultimoCodigo;
				$num=$codigo;
				$num+=1;
				$CodigoDepartamento=$num;
			}
			return $CodigoDepartamento;
		}
		catch(PDOException $e) {
			echo "Error: ". $e->getMessage();
		}
		$conexion = null;
}
	



//-------------------------------------------------------------------------------------------------------------------------
//insertarPedido($conexion,$customerNumber,$productCode,$quantityOrdered,$checkNumber,$orderDate,$requiredDate,$shippedDate){
	
	//datosRecogidos=productCode,quantityOrdered,
	
function insertarPedido($conexion,$customerNumber,$datosRecogidos,$orderDate,$requiredDate,$shippedDate,$checkNumber){
		try {
			$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$orderNumber=generarCodigoPedido();//codigoPedido
			
			//var_dump($orderNumber);
			
			insertarOrders($conexion,$orderNumber,$orderDate,$requiredDate,$shippedDate,$customerNumber);
			
			insertarOrderDetails($conexion,$orderNumber,$datosRecogidos);//$productCode,$quantityOrdered
						
			insertPayments($conexion,$customerNumber,$orderNumber,$checkNumber,$datosRecogidos);//$productCode
			
			actualizarAlmacen($conexion,$datosRecogidos);//$productCode,$quantityOrdered
			
			$PrecioTotal=totalDelPedido($conexion,$orderNumber);
			
			mostrarPrecioTotal($PrecioTotal);
		}
		catch(PDOException $e) {
			echo "Error: ". $e->getMessage();
		}
		$conexion = null;
}
	
//Datos al insertar: orderNumber,orderDate,requiredDate,shippedDate("Null"),status,comments("null"),customerNumber	
function insertarOrders($conexion,$orderNumber,$orderDate,$requiredDate,$shippedDate,$customerNumber){
		try {
			$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$stmt = $conexion->prepare("INSERT INTO orders (orderNumber,orderDate,requiredDate,shippedDate,status,comments,customerNumber)
			VALUES ('$orderNumber', '$orderDate', '$requiredDate', '$shippedDate', 'In Process', 'null','$customerNumber')");
			//STATUS NO SE QUE HAY QUE PONER.
			$stmt->execute();
		}
		
		catch(PDOException $e) {
			echo "Error al insertar Orders: ". $e->getMessage();
		}
		
		$conexion = null;	
}
	

//Datos al insertar: orderNumber,productCode,quantityOrdered,priceEach,orderLineNumber
function insertarOrderDetails($conexion,$orderNumber,$datosRecogidos){
		try {
			$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			foreach($datosRecogidos as $indice=> $valor){
				$productCode=$valor[0];
				$quantityOrdered=$valor[1];
				$priceEach=buscarPrecio($productCode); //Precio del producto
				$orderLineNumber=rand(1,32767);	//PENDIENTE DE MODIFICAR
				$stmt = $conexion->prepare("INSERT INTO orderdetails (orderNumber,productCode,quantityOrdered,priceEach,orderLineNumber)
				VALUES ('$orderNumber', '$productCode', '$quantityOrdered', '$priceEach', '$orderLineNumber')");
				$stmt->execute();
			}
		}
		catch(PDOException $e){
				echo "Error al insertar OrderDetails: ". $e->getMessage();
		}
		$conexion = null;	
}

//customerNumber,checkNumber,paymentDate,amount
function insertPayments($conexion,$customerNumber,$checkNumber,$orderNumber){
		try{
			$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$paymentdate=date("Y-m-d");
			$amount=totalDelPedido($conexion,$orderNumber);
			//var_dump($amount);
			$stmt = $conexion->prepare("INSERT INTO payments (customerNumber,checkNumber,paymentDate,amount)
			VALUES ('$customerNumber', '$checkNumber', '$paymentdate', '$amount')");
			$stmt->execute();
	
		}
		catch(PDOException $e){
				echo "Error al insertar Payments: ". $e->getMessage();
		}
		$conexion = null;	
}


//Precio del Producto
function buscarPrecio($productCode){
		try {
			$conexion=conexion();
			$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$stmt = $conexion->prepare("SELECT msrp FROM products WHERE productCode='$productCode'");
			$stmt->execute();
			$priceEach=$stmt->setFetchMode(PDO::FETCH_ASSOC);
			//var_dump($priceEach);
			return $priceEach;
		}
		catch(PDOException $e){
				echo "Error al buscar precio: ". $e->getMessage();
			}
		$conexion = null;	
	}

//ActualizarAlmacen
function actualizarAlmacen($conexion,$datosRecogidos){
	try {
		$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
		foreach($datosRecogidos as $indice=> $valor){
			$productCode=$valor[0];
			$quantityOrdered=$valor[1];
			$stmt = $conexion->prepare("UPDATE products SET quantityInStock=quantityInStock-$quantityOrdered WHERE productCode='$productCode'");
			$stmt->execute();
		}
	}
	catch(PDOException $e){
			echo "Error al actualizar el Almacen: ". $e->getMessage();
	}
		$conexion = null;	
}


//----------------------------------------------------	
//PRECIO TOTAL DEL PEDIDO

function totalDelPedido($conexion,$orderNumber){
	try {
		$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//$stmt = $conexion->prepare("UPDATE products SET quantityInStock=quantityInStock-$quantityOrdered WHERE productCode='$productCode'");
		//$stmt = $conexion->prepare("SELECT quantityordered, priceeach FROM orderdetails WHERE orderNumber='$orderNumber'");
		
		$stmt=$conexion->prepare("SELECT quantityOrdered,priceEach FROM orderdetails WHERE orderNumber='$orderNumber'");
		$stmt->execute();
	
		$precio=0;
	
		foreach($stmt->fetchAll() as $consulta){
			$precio+=floatval($consulta['quantityOrdered'])*floatval($consulta['priceEach']);
			//var_dump($consulta['quantityOrdered']);
			//var_dump($consulta['priceEach']);
		}
		return $precio;
	}
	catch(PDOException $e){
			echo "Error al mostrar el precio total". $e->getMessage();;
	}
	$conexion=null;	
}
//select * from orders where customerNumber="495";
?>
