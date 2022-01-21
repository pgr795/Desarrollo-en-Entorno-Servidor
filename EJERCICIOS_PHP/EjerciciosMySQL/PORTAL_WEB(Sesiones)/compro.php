<!DOCTYPE HTML>
<?php
	include('funciones.php');
	session_start();
	if (!isset($_SESSION['nif'])){
		header("location: comlogincli.php");
	}
	var_dump($_SESSION);
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
				<input type="submit" name="submit" value="Alta Compra"/>
				<input type="submit" name="submit" value="Atras">
			</div>
		</form>
</body>
</html>
<?php
var_dump($_POST);
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$valor2 = limpieza($_POST["producto"]);
		$valor3 = limpieza($_POST["Unidades"]);
		$valor4 = limpieza($_POST["submit"]);
		
		$cliente=$_SESSION['nif'];
		$producto=$valor2;
		$unidades=$valor3;
		$fechaCompra=date('Y-m-d');
		$conexion=crear_conexion();
		$accion=$valor4 ;
		
		$almacen=disponibilidadAlmacen($conexion,$producto);
		
		// var_dump($almacen);
		
		compraDeProductos($conexion,$cliente,$producto,$fechaCompra,$unidades);
				//actualizarAlmacen($conexion,$producto,$unidades);
			
		
				$datos=array();
			
				//cod nombre canti

				if($accion=="Alta Compra"){
					if(!isset($_SESSION['datos'])){
						$datos=array(recogerDatos($conexion,$producto));
						var_dump($datos);
						$_SESSION['datos']=$datos;
					}
					else{
					   $datos=recogerDatos($conexion,$producto);
					   array_push($_SESSION['datos'],$datos);
					   
					}
				}
				else if($accion=="Atras"){
					header("location: comprocli.php");
				}
	}

?>
