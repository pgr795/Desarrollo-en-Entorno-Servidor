<!DOCTYPE HTML>
<?php
	include('funciones.php');
	session_start();
	var_dump($_SESSION);
	var_dump($_POST);
	
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
				<input type="submit" value="Cerrar Sesión" name="cerrar">
			</div>	
		</form>
</body>
</html>
<?php
// var_dump($_POST);
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$valor1 = limpieza($_POST["comprar"]);
		$valor2 = limpieza($_POST["consultar"]);
		$valor3 = limpieza($_POST["cerrar"]);
		
		
		if($valor1){
			header("location: compro.php");
		}
		else if($valor2){
			header("location: comconscom.php");
		}
		else if($valor3){
			// remove all session variables
			session_unset();
			// destroy the session
			session_destroy();
			header("location: comlogincli.php");
		}
	}
?>