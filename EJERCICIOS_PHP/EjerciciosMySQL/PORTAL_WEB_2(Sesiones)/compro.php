<!DOCTYPE HTML>
<?php
	include('funciones.php');
	session_start();
	if (!isset($_SESSION['nif'])){
		header("location: comlogincli.php");
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
//var_dump($_POST);
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$valor2 = limpieza($_POST["producto"]);
		$valor3 = $_POST["Unidades"];
		$valor4 = limpieza($_POST["submit"]);
		
		$cliente=$_SESSION['nif'];
		$producto=$valor2;
		$unidades= $_POST["Unidades"];
		$fechaCompra=date('Y-m-d');
		$conexion=crear_conexion();
		$accion=$valor4 ;
		
		$datos=array();

				if($accion=="Agregar"){
					if(!isset($_SESSION['datos'])){
						if($unidades!=""){
						var_dump($unidades);
							$datos=array(array($producto,$unidades));
							var_dump($datos);
							$_SESSION['datos']=$datos;
							$aux=$_SESSION['datos'];
							mostrarProductos($aux);
						}
						else{
							echo "No has seleccionado unidades";
							}
					}
					else{
						if($unidades!=""){
							$datos=array($producto,$unidades);
							array_push($_SESSION['datos'],$datos);
							$aux=$_SESSION['datos'];
							mostrarProductos($aux);
						}
						else{
							echo "No has seleccionado unidades";
							}
							var_dump($unidades);
					}
					
				}
				else if($accion=="Finalizar"){
					$datosRecogidos=$_SESSION['datos'];
					compraDeProductos($conexion,$cliente,$fechaCompra,$datosRecogidos);
					actualizarAlmacen($conexion,$datosRecogidos);
					header("location: comprocli.php");
				}
				else if($accion=="Borrar"){
					//$borrarDatos=$_SESSION['datos'];
					//borrarCampos($conexion,$borrarDatos);
					unset($_SESSION['datos']);
				}
	
				var_dump($_SESSION);
	}


?>
