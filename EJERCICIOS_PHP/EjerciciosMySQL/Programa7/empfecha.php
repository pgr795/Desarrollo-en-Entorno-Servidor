<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>Listado Fecha</title>
</head>
<body>
	<h1>Listado Fecha</h1>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<p>Fecha <input type='text' name='Fecha' size=15></p>
		 <p><input type="submit" name="submit" value="Listado Fecha"/></p>
	</form>
</body>
</html>
<?php
include('funciones.php');
	/* var_dump($_POST); */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$valor1 = limpieza($_POST["Fecha"]);

	$fecha=$valor1;
	$conexion=crear_conexion();
	$listado=listadoFecha($conexion,$fecha);
	$tamaño = count($listado);
	
	if ($tamaño == 0) {
		echo "<p>No se han encontrado empleados</p>";
	}
	foreach ($listado as $indice => $valor) {
		  echo "<li>".$listado[$indice]."</li>";
	}
}
?>
