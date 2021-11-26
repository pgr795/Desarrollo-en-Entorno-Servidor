<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>Alta Empleado</title>
</head>
<body>
	<h1>Alta Empleado</h1>
	<form method="post" action='funciones.php'>
		<p>Nombre<input type='text' name='nombre' size=15></p><br>
		<p>Apellido <input type='text' name='apellido' size=15></p><br>
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
	$valor1 = limpieza($_POST["nombre"]);
	$valor2 = limpieza($_POST["apellido"]);
	$valor3 = limpieza($_POST["fecha"]);
	$valor4 = limpieza($_POST["departamento"]);
}
	$nombre=$valor1;
	$apellido=$valor2;
	$fecha=$valor3;
	$departamento=$valor4;
	
	$conexion=crear_conexion1();

	alta_departamento($conexion,$nombre,$apellido,$fecha,$departamento);
	

?>
