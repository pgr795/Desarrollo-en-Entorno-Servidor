<!DOCTYPE HTML>
<?php
	include('funciones.php');
	if (!isset($_COOKIE['nif'])){
		header("location: comlogincli.php");
	}
//var_dump($_POST);
	// if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// $valor2 = limpieza($_POST["producto"]);
		// $valor3 = $_POST["Unidades"];
		// $valor4 = limpieza($_POST["submit"]);
		
		// $cliente=$_COOKIE['nif'];
		// $producto=$valor2;
		// $unidades= $valor3;
		// $fechaCompra=date('Y-m-d');
		// $conexion=crear_conexion();
		// $accion=$valor4 ;
		
		
				// if($accion=="Agregar"){
					// $datosTotal;
					// if(!isset($_COOKIE['datos'])){
						
						// if($unidades!=""){
							// setcookie('datos',"", time() + (86400), "/");
							// $datosTotal=array(array($producto,$unidades));
							// mostrarProductos($datosTotal);
						// }
						// else{
							// echo "No has seleccionado unidades";
						// }
					// }
					// else{
						// if($unidades!=""){
							// $datos=array(array($producto,$unidades));
							// array_push($datosTotal,$datos);
							// mostrarProductos($datosTotal);
						// }
						// else{
							// echo "No has seleccionado unidades";
						// }
							
							// array_push($datos,$datosTotal);
							// var_dump($datos);
					// }
				// }	
				// else if($accion=="Finalizar"){
					// $datosRecogidos=$_COOKIE['datos'];
					// compraDeProductos($conexion,$cliente,$fechaCompra,$datosRecogidos);
					// actualizarAlmacen($conexion,$datosRecogidos);
					// header("location: comprocli.php");
				// }
				// else if($accion=="Borrar"){
					// $borrarDatos=$_SESSION['datos'];
					// borrarCampos($conexion,$borrarDatos);
					// setcookie('datos',"", time() - (86400), "/");
				// }

		// var_dump($datosTotal);		
	// }
// ?>
	
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
		
		$datosTotal=array();
		$datos="";
		if($accion=="Agregar"){
					if(!isset($_COOKIE['datos'])){
						if($unidades!=""){
							setcookie('datos',"$producto|$unidades", time() + (86400), "/");
							$datos=$_COOKIE['datos'];
							setcookie('carrito',$datos, time() + (86400), "/");
							mostrarProductos($datos);
							var_dump($datos);
						}
						else{
							echo "No has seleccionado unidades";
						}
					}
				}	
				else if($accion=="Finalizar"){
					//$datosRecogidos=$_COOKIE['datos'];
					compraDeProductos($conexion,$cliente,$fechaCompra,$datosRecogidos);
					actualizarAlmacen($conexion,$datosRecogidos);
					header("location: comprocli.php");
				}
				else if($accion=="Borrar"){
					setcookie('datos',"", time() - (86400), "/");
				}
				var_dump($_COOKIE);
	}
?>

<?php
				// if($accion=="Agregar"){
						// if($unidades!=""){
							// setcookie('producto',"$producto|$unidades", time() + (86400), "/");
							// $aux=$_COOKIE['producto'];
							// setcookie('Carrito',"$aux", time() + (86400), "/");
							
							// mostrarProductos($aux);
							// var_dump($aux);
						// }
						// else{
							// echo "No has seleccionado unidades";
						// }
					// }
					
					
					
					
					
					
					// if(!isset($_COOKIE['datos'])){
						// if($unidades!=""){
							// setcookie('datos',"$producto|$unidades", time() + (86400), "/");
							// $datos=serialize(array($producto,$unidades));
							// array_push($datosTotal,array($producto,$unidades));
							// mostrarProductos($datosTotal);
							// var_dump($datosTotal);
							// var_dump($datos);
						// }
						// else{
							// echo "No has seleccionado unidades";
						// }
					// }
					?>