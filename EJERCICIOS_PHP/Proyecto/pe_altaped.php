<?php
	include('./Funciones/funciones.php');
	
	session_start();
	
	if (!isset($_SESSION['customerNumber'])){
		header("location: pe_login.php");
	}
	var_dump($_SESSION);

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
				mostrarProductos();
			?>
			<p>Cantidad <input type='text' name='cantidad' size=15></p>
			<p>Forma de Pago/checkNumber <input type='text' name='pago' size=15></p>
			<div>
				<input type="submit" name="submit" value="Alta Pedido"/>
				<input type="submit" name="submit" value="Cerrar Sesion"/>
			</div>
		</form>
</body>
</html>

<?php
   if ($_SERVER["REQUEST_METHOD"] == "POST"){ 
		$valor1 = limpiarCampo($_POST["productos"]);
		$valor2 = limpiarCampo($_POST["cantidad"]);
		$valor3 = limpiarCampo($_POST["pago"]);
	var_dump($_POST);
	
	
	$conexion=conexion();
	
	$productos=$valor1;
	$cantidad=$valor2;
	$pago=$valor3; //checkNumber
	
    $fechaPedido=date("Y-m-d"); //orderDate
    $fechaSolicitud=date("Y-m-d");//requiredDAte
	$fechaEnvio=null; //shippedDate
    //$amount
	
	//GenerarCodigo
	//ActualizarAlmacen
	//InsertarPedido
	//MostrarInformacionPago
    
   }
?>