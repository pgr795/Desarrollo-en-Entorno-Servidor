<!DOCTYPE HTML>
<?php
include('funciones.php');
?>
<html>
<head>
	<meta charset="utf-8">
	<title>Consulta de Compras</title>
</head>
<body>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<h2>Consultar Compras</h2>
		<form>
			<p>NIF</p>
			<?php
				mostrarSelect4();
			?>
			<p>Fecha desde: <input type='text' name='fechaIni' size=15></p>
			<p>Fecha hasta: <input type='text' name='fechaFin' size=15></p>
			<p><input type="submit" name="submit" value="Consulta Comprar"/></p>
		</form>
	</form>
</body>
</html>
<?php
// var_dump($_POST);
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$valor1 = limpieza($_POST["cliente"]);
		$valor2 = limpieza($_POST["fechaIni"]);
		$valor3 = limpieza($_POST["fechaFin"]);
		
		$cliente=$valor1;
		$fechaIni=$valor2;
		$fechaFin=$valor3;
		
		$conexion=crear_conexion();
		
		consultarCompras2($conexion,$cliente,$fechaIni,$fechaFin);
		
	}
?>
