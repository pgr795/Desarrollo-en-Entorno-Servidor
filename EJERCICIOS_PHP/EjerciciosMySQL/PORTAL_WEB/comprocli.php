<!DOCTYPE HTML>
<?php
	include('funciones.php');
	session_start();
	var_dump($_SESSION);
?>
<html>
<head>
	<meta charset="utf-8">
	<title>Registro</title>
</head>
<body>
	<h1>Bienvenido <?php echo $_SESSION['nombre']."-NIF: ".$_SESSION['nif']; ?></h1> 
	<h2>Alta de Registro</h2>
		<div>
			<input type="submit" value="Comprar Productos" name="comprar">
			<input type="submit" value="Consulta Compras" name="consultar">
			<input type="submit" value="Cerrar Sesión" name="cerrar">
		</div>	
</body>
</html>
<?php
// var_dump($_POST);
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	}
?>