<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>Alta Empleado</title>
</head>
<body>
	<h1>Alta Empleado</h1>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<p>DNI<input type='text' name='dni' size=15></p><br>
		<p>Nombre <input type='text' name='nombre' size=15></p><br>
		<p>Fecha Nacimiento <input type='text' name='fecha' size=15></p><br>
		<p>Departamento <input type='text' name='departamento' size=15></p><br>
		   <input type="submit" name="submit" value="Alta"/>
	</form>
</body>
</html>
<?php
include('funciones.php');
	/* var_dump($_POST); */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$valor1 = limpieza($_POST["dni"]);
	$valor2 = limpieza($_POST["nombre"]);
	$valor3 = limpieza($_POST["fecha"]);
	$valor4 = limpieza($_POST["departamento"]);

	$dni=$valor1;
	$nombre=$valor2;
	$fecha=$valor3;
	$departamento=$valor4;
	$conexion=crear_conexion1();

	alta_empleado($conexion,$dni,$nombre,$fecha,$departamento);
	
}
?>
