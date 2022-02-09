<!DOCTYPE HTML>
<?php
	include('funciones.php');
	if (!isset($_COOKIE['nif'])){
		header("location: comlogincli.php");
	}
	else{
		setcookie('datos',false, time() - (86400), "/");
	}
?>
	
<html>
<head>
	<meta charset="utf-8">
	<title>Alta Compras</title>
</head>
<body>
	<h2>Alta Compras</h2>
		<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<p>Productos</p>
			<?php
				mostrarSelect2();
			?>
			<p>Unidades: <input type='text' name='Unidades' size=15></p>
			<div>
				<input type="submit" name="submit" value="Agregar"/>
				<input type="submit" name="submit" value="Finalizar"/>
				<input type="submit" name="submit" value="Borrar">
			</div>
		</form>
</body>
</html>

<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$valor2 = limpieza($_POST["producto"]);
		$valor3 = $_POST["Unidades"];
		$valor4 = limpieza($_POST["submit"]);
		$cliente=$_COOKIE['nif'];
		$producto=$valor2;
		$unidades= $valor3;
		$fechaCompra=date('Y-m-d');
		$conexion=crear_conexion();
		$accion=$valor4 ;
		
		$cesta=array();
		
				if($accion=="Agregar"){
					if(!isset($_COOKIE['datos'])){
						if($unidades!=""){
							$cesta=array(array($producto,$unidades));
							mostrarProductos($cesta);
							$codificar=serialize($cesta);
							setcookie('datos',"$codificar", time() + (86400), "/");
						}
						else{
							echo "No has seleccionado unidades";
						}
					}
					else{
						if($unidades!=""){
							$datos=array($producto,$unidades);//Nuevo producto para agregar
							$cesta=unserialize($_COOKIE['datos']);//Recuperamos el producto anterior en array
							array_push($cesta,$datos);
							mostrarProductos($cesta);
							$codificar=serialize($cesta);
							setcookie('datos',"$codificar", time() + (86400), "/");
						}
						else{
							echo "No has seleccionado unidades";
						}
					}
				}
				else if($accion=="Finalizar"){
					
					$datosRecogidos=unserialize($_COOKIE['datos']);
					compraDeProductos($conexion,$cliente,$fechaCompra,$datosRecogidos);
					actualizarAlmacen($conexion,$datosRecogidos);
					header("location: comprocli.php");
				}
				else if($accion=="Borrar"){
					setcookie('datos',false, time() - (86400), "/");
				}
				var_dump($_COOKIE);
	}
?>
