<!DOCTYPE HTML>
<?php
include('funciones.php');
?>
<html>
<head>
	<meta charset="utf-8">
	<title>Cambio Departamento</title>
</head>
<body>
	<h1>Cambio Departamento</h1>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<p>DNI</p>
		<?php
			mostrarSelectDNI();
		?>
		<p>Departamento</p>
		<?php
			mostrarSelect();
			echo "<br>";
			echo "<br>";
		?>
		<input type="submit" name="submit" value="Cambio de Departamento"/>
	</form>
</body>
</html>
<?php
	/* var_dump($_POST); */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$valor1 = limpieza($_POST["dni"]);
	$valor2 = limpieza($_POST["departamento"]);

	$dni=$valor1;
	$departamento=$valor2;
	$conexion=crear_conexion();

	cambio_departamento($conexion,$dni,$departamento);
	
}
?>
