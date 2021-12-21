<!DOCTYPE HTML>
<?php
include('../Funciones/funciones.php');
?>
<html>
<head>
	<meta charset="utf-8">
	<title>Alta Almacen</title>
</head>
<body>
	<h1>Alta Almacen</h1>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<p>Localidad<input type='text' name='localidad' size=15></p><br>
		  <p><input type="submit" name="submit" value="Alta"></p></br> 
	</form>
</body>
</html>
<?php
	/* var_dump($_POST); */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$valor1 = limpieza($_POST["localidad"]);

	$localidad=$valor1;

	$conexion=crear_conexion();

	alta_almacen($conexion,$localidad);
}
?>
