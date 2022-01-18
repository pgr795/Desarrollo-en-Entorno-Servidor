<!DOCTYPE HTML>
<?php
	include('funciones.php');
	var_dump($_POST);
	var_dump($_COOKIE);
	$_COOKIE['nif'];
	$_COOKIE['nombre'];
	if(!isset($_COOKIE['nif'],$_COOKIE['nombre'])) {
		setcookie('nif', "", time() - 3600);
		setcookie('nombre', "", time() - 3600);
		header("location: comlogincli.php");
	}
    	
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
				setcookie('nif', "", time() - 3600);
				setcookie('nombre', "", time() - 3600);
			// destroy the session
			header("location: comlogincli.php");
		}
	}
?>