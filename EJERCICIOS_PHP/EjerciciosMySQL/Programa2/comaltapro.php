<!DOCTYPE HTML>
<?php
include('funciones.php');
?>
<html>
<head>
	<meta charset="utf-8">
	<title>Alta Producto</title>
</head>
<body>

	<h1>Alta Producto</h1>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<p>Producto<input type='text' name='producto' size=15></p>	
		<p>Precio<input type='text' name='precio' size=15></p>
		<label for ="Categoria">Categoria</label>
		<?php
			mostrarSelect();
		?>
		  <p><input type="submit" name="submit" value="Alta"></p></br> 
	</form>
</body>
</html>
<?php	
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$valor1 = limpieza($_POST["categoria"]);
	$valor2 = limpieza($_POST["producto"]);
	$valor3 = limpieza($_POST["precio"]);
	
	$categoria=$valor1;
	$producto=$valor2;
	$precio=$valor3;
	
	$conexion=crear_conexion();

	insertar_Producto($conexion,$producto,$precio,$categoria);
}
var_dump($_POST);
?>
