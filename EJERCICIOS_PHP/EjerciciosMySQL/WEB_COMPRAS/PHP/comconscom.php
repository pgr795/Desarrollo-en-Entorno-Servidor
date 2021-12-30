<!DOCTYPE HTML>
<?php
include('../Funciones/funciones.php');
?>
<html>
<head>
	<meta charset="utf-8">
	<title>Consulta de Compras</title>
</head>
<body>
	<h1>Consulta de Compras</h1>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<h2>Alta de Cliente</h2>
		<form>
			<p>NIF: <input type='text' name='nif' size=15></p>
			<p>Nombre: <input type='text' name='nombre' size=15></p>
			<p>Apellido: <input type='text' name='apellido' size=15></p>
			<p>CP: <input type='text' name='cp' size=15></p>
			<p>Direccion: <input type='text' name='direccion' size=15></p>
			<p>Ciudad: <input type='text' name='ciudad' size=15></p><br>
			<input type="submit" name="submit" value="Alta de Cliente"/>
		</form>
	<h2>Alta Compras</h2>
		<form>
			<p>NIF</p>
			<?php
				mostrarSelect4();
			?>
			<p>Productos</p>
			<?php
				mostrarSelect2();
			?>
			<p>Fecha_Compra(Automatico):</p> <!-- <input type='text' name='fechaIni' size=15> -->
			<p>Unidades: <input type='text' name='Unidades' size=15></p>
			<p><input type="submit" name="submit" value="Alta Compra"/></p>
		</form>
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
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$valor1 = limpieza($_POST["nif"]);
		$valor2 = limpieza($_POST["nombre"]);
		$valor3 = limpieza($_POST["apellido"]);
		$valor4 = limpieza($_POST["cp"]);
		$valor5 = limpieza($_POST["direccion"]);
		$valor6 = limpieza($_POST["ciudad"]);
		$valor7 = limpieza($_POST["cliente"]);
		$valor8 = limpieza($_POST["producto"]);
		
		$valor9 = limpieza($_POST["submit"]);
		
			
			$NIF=$valor1;
			$Nombre=$valor2;
			$Apellido=$valor3;
			$CP=$valor4;
			$Direccion=$valor5;
			$Ciudad=$valor6;
			
			$cliente=$valor7;
			$producto=$valor8;
			
			$conexion=crear_conexion();
			insertar_cliente($conexion,$NIF,$Nombre,$Apellido,$CP,$Direccion,$Ciudad);
	}
?>
