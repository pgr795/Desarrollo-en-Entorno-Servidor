<!DOCTYPE HTML>
<?php
include('../Funciones/funciones.php');
?>
<html>
<head>
	<meta charset="utf-8">
	<title>Alta Compras</title>
</head>
<body>
	<h2>Alta Compras</h2>
		<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<p>NIF</p>
			<?php
				mostrarSelect4();
			?>
			<p>Productos</p>
			<?php
				mostrarSelect2();
			?>
			<p>Unidades: <input type='text' name='Unidades' size=15></p>
			<p><input type="submit" name="submit" value="Alta Compra"/></p>
		</form>
</body>
</html>
<?php
// var_dump($_POST);
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$valor1 = limpieza($_POST["cliente"]);
		$valor2 = limpieza($_POST["producto"]);
		$valor3 = limpieza($_POST["Unidades"]);
		
		$cliente=$valor1;
		$producto=$valor2;
		$unidades=$valor3;
		$fechaCompra=date('Y-m-d');
		$conexion=crear_conexion();
		
		$almacen=disponibilidadAlmacen($conexion,$producto);
		
		// var_dump($almacen);
		
		if($almacen <= 0){
			echo "<h2>No hay stock en ninguno de los almacenes</h2>";
		}
		else{
		//insertar 
			compraDeProductos($conexion,$cliente,$producto,$fechaCompra,$unidades);
			// actualizarAlmacen($conexion,$producto,$unidades);
		}
	}

?>
