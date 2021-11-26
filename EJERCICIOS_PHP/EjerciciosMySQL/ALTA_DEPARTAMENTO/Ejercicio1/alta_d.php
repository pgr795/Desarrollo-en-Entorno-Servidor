<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>Alta Departamento</title>
</head>
<body>
	<h1>Alta Departamento</h1>
	<form method="post" action='funciones.php'>
		<p>Departamento <input type='text' name='departamento' size=15></p><br>
		   <input type="submit" name="submit" value="Alta"/>
	</form>
</body>
</html>
<?php
include('funciones.php');
	/* var_dump($_POST); */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$valor1 = limpieza($_POST["departamento"]);
	
	$departamento=$valor1;

	$conexion=crear_conexion1();

	var_dump($conexion);

	alta_departamento($conexion,$departamento);
}

?>
