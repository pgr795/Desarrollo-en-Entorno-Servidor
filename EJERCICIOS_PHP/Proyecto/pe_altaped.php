<?php
	include('./Funciones/funciones.php');
	session_start();
	if (!isset($_SESSION['customerNumber'])){
		header("location: pe_login.php");
	}
	//var_dump($_SESSION);

?>
<html>
<head>
	<meta charset="utf-8">
	<title>PEDIDOS</title>
</head>
<body>
	<h2>ALTA PEDIDOS</h2>
		<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<p>Productos</p>
			<?php
				selectProductos();
			?>
			<p>Cantidad <input type='text' name='cantidad' size=15></p>
			<p>Forma de Pago/checkNumber <input type='text' name='pago' size=15></p>
			<div>
				<input type="submit" name="submit" value="Agregar Producto"/>
				<input type="submit" name="submit" value="Alta Pedido"/>
				<input type="submit" name="submit" value="Borrar"/>
			</div>
		</form>
</body>
</html>

<?php
   if ($_SERVER["REQUEST_METHOD"] == "POST"){ 
		$valor1 = limpiarCampo($_POST["productos"]);
		$valor2 = limpiarCampo($_POST["cantidad"]);
		$valor3 = limpiarCampo($_POST["pago"]);
		
	//var_dump($_POST);
	
	
	$accion=$_POST["submit"];
	
	$conexion=conexion();
	$customerNumber=$_SESSION['customerNumber'];//cliente
	$productCode=$valor1;//productos
	$quantityOrdered=$valor2;//cantidad
	$checkNumber=$valor3; //Forma de pago
    $orderDate=date("Y-m-d"); //fechaPedido
    $requiredDate= date("Y-m-d"); //fechaSolicitud
	$shippedDate= date("Y-m-d"); //fechaEnvio
	
	$datos=array();

				if($accion=="Agregar Producto"){
					if(!isset($_SESSION['datos'])){
						if($quantityOrdered!=""){
						//var_dump($unidades);
							$datos=array(array($productCode,$quantityOrdered));
							//var_dump($datos);
							$_SESSION['datos']=$datos;
							$aux=$_SESSION['datos'];
							mostrarProductos($aux);
						}
						else{
							echo "No has seleccionado unidades";
							}
					}
					else{
						if($quantityOrdered!=""){
							$datos=array($productCode,$quantityOrdered);
							array_push($_SESSION['datos'],$datos);
							$aux=$_SESSION['datos'];
							mostrarProductos($aux);
						}
						else{
							echo "No has seleccionado unidades";
						}
					}
					//var_dump($datos);
					//var_dump($_SESSION['datos']);
				}
				else if($accion=="Alta Pedido"){
					$datosRecogidos=$_SESSION['datos'];
						
					//insertarPedido($conexion,$customerNumber,$productCode,$quantityOrdered,$checkNumber,$orderDate,$requiredDate,$shippedDate);
					insertarPedido($conexion,$customerNumber,$datosRecogidos,$orderDate,$requiredDate,$shippedDate,$checkNumber);
					//header("location: pe_login");
				}
				else if($accion=="Borrar"){
					unset($_SESSION['datos']);
				}

   }
	


    
?>