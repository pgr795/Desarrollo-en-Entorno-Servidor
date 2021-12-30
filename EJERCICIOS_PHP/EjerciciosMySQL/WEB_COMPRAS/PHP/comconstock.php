<!DOCTYPE HTML>
<?php
include('../Funciones/funciones.php');
?>
<html>
<head>
	<meta charset="utf-8">
	<title>Consulta de Stock</title>
</head>
<body>
	<h1>Consulta de Stock</h1>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<p>Productos</p>
		<?php
			mostrarSelect2();
		?>
		<input type="submit" name="submit" value="Consulta"/>
	</form>
</body>
</html>
<?php
	// var_dump($_POST); 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$valor1 = limpieza($_POST["producto"]);

	$producto=$valor1;

	$conexion=crear_conexion();

	consultarStock($conexion,$producto);
	
}
?>
