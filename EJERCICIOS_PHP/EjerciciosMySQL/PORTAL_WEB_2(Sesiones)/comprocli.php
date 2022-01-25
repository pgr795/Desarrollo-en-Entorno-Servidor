<!DOCTYPE HTML>
<?php
	include('funciones.php');
	var_dump($_POST);
	
	session_start();
	var_dump($_SESSION);
	
	if (!isset($_SESSION['nif'])){
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
	<h1>Bienvenido <?php echo $_SESSION['nombre']."-NIF: ".$_SESSION['nif']; ?></h1> 
	<h2>Alta de Registro</h2>
		<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
			<div>
				<input type="submit" value="Comprar Productos" name="comprar">
				<input type="submit" value="Consulta Compras" name="consultar">
				<input type="submit" value="Cerrar Sesion" name="cerrar">
			</div>	
		</form>
</body>
</html>
<?php
// var_dump($_POST);
if (isset($_SESSION['datos'])){
		$productos=$_SESSION['datos'];
		carritoComprar($productos);
		
}
    	
?>