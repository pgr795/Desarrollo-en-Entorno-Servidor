<!DOCTYPE HTML>
<?php
include('../Funciones/funciones.php');
?>
<html>
<head>
	<meta charset="utf-8">
	<title>Aprovisionar Productos</title>
</head>
<body>
	<h1>Aprovisionar Productos</h1>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<p>Cantidad</p>
		<input type='text' name='cantidad' size=15/>
		<p>Nombre Producto</p>
		<?php
			mostrarSelect2();
		?>
		<p>Numero de los almacenes</p>
		<?php
			mostrarSelect3();
		?>
		<br>
		<br>
		<input type="submit" name="submit" value="Alta"/>
	</form>
</body>
</html>
<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$valor1 = limpieza($_POST["cantidad"]);
		$valor2 = limpieza($_POST["producto"]);
		$valor3 = limpieza($_POST["almacen"]);


		$cantidad=$valor1;
		$producto=$valor2;
		$numAlmacen=$valor3;
		$conexion=crear_conexion();

		aprovisionarProductos($conexion,$cantidad,$producto,$numAlmacen);
	}
?>
