<!DOCTYPE HTML>
<?php
include('funciones.php');
?>
<html>
<head>
	<meta charset="utf-8">
	<title>Modificar Salario</title>
</head>
<body>
	<h1>Modificar Salario</h1>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<p>Empleado</p>
		<?php
			mostrarSelect();
			echo "<br>";
			echo "<br>";
		?>
		<label for="aumentoSueldo">Cambio Salario</label>
		<input type="text" name="aumentoSueldo"/><br>
		<br>
		<input type="submit" name="submit" value="Modificar Salario"/>
	</form>
</body>
</html>
<?php
	// var_dump($_POST); 
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$valor1 = limpieza($_POST["nombre"]);
		$valor2 = limpieza($_POST["aumentoSueldo"]);
		$empleado=$valor1;
		$porcentaje=$valor2;
		$conexion=crear_conexion();
		modificarSueldo($conexion,$empleado,$porcentaje);
	}
?>
