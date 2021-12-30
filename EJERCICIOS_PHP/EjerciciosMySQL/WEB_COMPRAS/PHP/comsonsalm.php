<!DOCTYPE HTML>
<?php
include('../Funciones/funciones.php');
?>
<html>
<head>
	<meta charset="utf-8">
	<title>Consulta de Almacenes</title>
</head>
<body>
	<h1>Consulta de Almacenes</h1>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<p>Almacenes</p>
		<?php
			mostrarSelect3();
		?>
		<p><input type="submit" name="submit" value="Consulta Productos"/></p>
		
	</form>
</body>
</html>
<?php
	/* var_dump($_POST); */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$valor1 = limpieza($_POST["almacen"]);
	$almacen=$valor1;
	
	$conexion=crear_conexion();

	consultarProductos($conexion,$almacen);
	
}
?>
