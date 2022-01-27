<?php

function conexion(){

  $servername = "localhost";
  $username = "root";
  $password = "rootroot";
  $dbname = "pedidos";

  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

  catch(PDOException $e){
    echo "Error: " . $e->getMessage();
  }

  return $conn;
}//de function

//--------------

function limpiarCampo($campo){
	$campo=trim($campo);
  	$campo=stripslashes($campo);
  	$campo=htmlspecialchars($campo);
  	return $campo;
}


//--------------------------------------------------------------------------------

function desplegableNumCliente($baseDatos){

//la información de los pedidos realizados: número pedido (orderNumber), fecha pedido (orderDate), estado pedido (status).


  $stmt = $baseDatos->prepare("SELECT orderNumber,orderDate,status FROM orders where ");
  $stmt->execute();

  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

  return $stmt;

}//de function

//----------------------------------------------------

function desplegablePedidos($baseDatos){

  $stmt = $baseDatos->prepare("SELECT customerNumber,customerName FROM customers");
  $stmt->execute();

  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

  return $stmt;

}//de function

//----------------------------------------------------

function mostrarProductos(){
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

	function generarCodigoOrders(){
		try {
			$conexion=crear_conexion();
			$stmt = $conexion -> prepare("SELECT MAX(orderNumber) as ultimoCodigo FROM orders");
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
	
	function generarCodigoOrdersDetails(){
		try {
			$conexion=crear_conexion();
			$stmt = $conexion -> prepare("SELECT MAX(orderNumber) as ultimoCodigo FROM orderdetails");
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
		

	function insertarOrders($){
		
	
	
	}














?>
