<!DOCTYPE HTML>
<?php
include('../Funciones/funciones.php');
?>
<html>
<head>
	<meta charset="utf-8">
	<title>Alta Categoria</title>
</head>
<body>

	<h1>Alta Categoria</h1>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<p>Categoria<input type='text' name='categoria' size=15></p>
		<p><input type="submit" name="submit" value="Alta"></p></br> 
	</form>
</body>
</html>
<?php	
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$valor1 = limpieza($_POST["categoria"]);

	$categoria=$valor1;
	$conexion=crear_conexion();

	insertar_categoria($conexion,$categoria);
}
?>
