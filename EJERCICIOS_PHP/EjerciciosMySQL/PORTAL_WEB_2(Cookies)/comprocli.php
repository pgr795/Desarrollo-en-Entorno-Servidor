<!DOCTYPE HTML>
<?php
	include('funciones.php');
	var_dump($_POST);
	var_dump($_COOKIE);
	
	if (!isset($_COOKIE['nif'])){
		header("location: comlogincli.php");
	}
	accionEnvio();
?>
<html>
<head>
	<meta charset="utf-8">
	<title>Registro</title>
</head>
<body>
	<h1>Bienvenido <?php echo $_COOKIE['nombre']."-NIF: ".$_COOKIE['nif']; ?></h1> 
	<h2>Alta de Registro</h2>
		<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
			<div>
				<input type="submit" value="Comprar Productos" name="comprar">
				<input type="submit" value="Cerrar Sesion" name="cerrar">
			</div>	
		</form>
</body>
</html>
