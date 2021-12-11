<!DOCTYPE HTML>
<?php
include('funciones.php');
?>
<html>
<head>
	<meta charset="utf-8">
	<title>Alta Empleado</title>
</head>
<body>
	<h1>Alta Empleado</h1>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<p>DNI<input type='text' name='dni' size=15></p>
		<p>Nombre <input type='text' name='nombre' size=15></p>
		<p>Apellidos <input type='text' name='apellido' size=15></p>
		<p>Fecha Nacimiento <input type='text' name='fecha' size=15></p>
		<p> Salario <input type='text' name='salario' size=15></p>
		<label for ="departamento">Departamento</label>
		<?php
			mostrarSelect();
		?>
		<p><input type="submit" name="submit" value="Alta"/></br>
	</form>
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$valor1 = limpieza($_POST["dni"]);
	$valor2 = limpieza($_POST["nombre"]);
	$valor3 = limpieza($_POST["apellido"]);
	$valor4 = limpieza($_POST["fecha"]);
	$valor5 = limpieza($_POST["salario"]);
	$valor6 = limpieza($_POST["departamento"]);
	
	
	$conexion=crear_conexion();
	$dni=$valor1;
	$nombre=$valor2;
	$apellido=$valor3;
	$fecha=$valor4;
	$salario=$valor5;
	$cod_dpto=$valor6;
	alta_empleado($conexion,$dni,$nombre,$apellido,$fecha,$salario,$cod_dpto);
}

?>