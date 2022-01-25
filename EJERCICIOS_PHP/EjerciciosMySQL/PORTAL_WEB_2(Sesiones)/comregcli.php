<!DOCTYPE HTML>
<?php
	include('funciones.php');
?>
<html>
<head>
	<meta charset="utf-8">
	<title>Registro</title>
</head>
<body>
	<h2>Alta de Registro</h2>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
			<p>NIF: <input type='text' name='nif' size=15></p>
			<p>Nombre: <input type='text' name='nombre' size=15></p>
			<p>Apellido: <input type='text' name='apellido' size=15></p>
			<p>CP: <input type='text' name='cp' size=15></p>
			<p>Direccion: <input type='text' name='direccion' size=15></p>
			<p>Ciudad: <input type='text' name='ciudad' size=15></p><br>
			<input type='submit' name='submit' value='Registro'/>
			
		</form>
</body>
</html>
<?php
// var_dump($_POST);
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$valor1 = limpieza($_POST["nif"]);
		$valor2 = limpieza($_POST["nombre"]);
		$valor3 = limpieza($_POST["apellido"]);
		$valor4 = limpieza($_POST["cp"]);
		$valor5 = limpieza($_POST["direccion"]);
		$valor6 = limpieza($_POST["ciudad"]);
	
		$nif=$valor1;
		$nombre=$valor2;
		$apellido=$valor3;
		$cp=$valor4;
		$direccion=$valor5;
		$ciudad=$valor6;
		$clave=generarClave($apellido);
		$conexion=crear_conexion();
		
		añadirCliente($conexion,$nif,$nombre,$apellido,$cp,$direccion,$ciudad,$clave);

	}
?>