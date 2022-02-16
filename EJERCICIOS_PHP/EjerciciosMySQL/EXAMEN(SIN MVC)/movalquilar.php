<?php
	include('php/funciones.php');
	session_start();
	if (!isset($_SESSION['Usuario']) && !isset($_SESSION['id'])){
		header("location: movlogin.php");
	}
	$fecha=date("Y-m-d H:i:s"); 

if($_SERVER["REQUEST_METHOD"] == "POST") {
		$valor1 = limpieza($_POST["vehiculos"]);
		$matricula=$valor1;
		$fechaActual=$fecha;
		$usuario=$_SESSION['Usuario'];
		$idUsuario=$_SESSION['id'];
		$accion=$_POST['accion'];
		$saldo;
		$cesta=array();
				if($accion=="Agregar a Cesta"){
					if(!isset($_SESSION['datos'])){
							$datos=array(array($matricula,$fechaActual));
							$_SESSION['datos']=$datos;
							$aux=$_SESSION['datos'];
							mostrarCarrito($aux);
					}
					else{
							$datos=array($matricula,$fechaActual);
							array_push($_SESSION['datos'],$datos);
							$aux=$_SESSION['datos'];
							mostrarCarrito($aux);
					}
				}
				else if($accion=="Realizar Alquiler"){
						$datosRecogidos=$_SESSION['datos'];
						$saldo=comprobarSaldo($idUsuario);
						if($saldo>=10){
							modificarEstado($datosRecogidos);
							modificarTiempoAlquiler($datosRecogidos,$idUsuario,$fecha);
							header("location: movwelcome.php");
							unset($_SESSION['datos']);

						}
				}
				else if($accion=="Vaciar Cesta"){
					unset($_SESSION['datos']);
				}
	}
?>

	
<html>
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Bienvenido a MovilMAD</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
 </head>
   
 <body>
    <h1>Servicio de ALQUILER DE E-CARS</h1> 

    <div class="container ">
        <!--Aplicacion-->
		<div class="card border-success mb-3" style="max-width: 30rem;">
		<div class="card-header">Menú Usuario - ALQUILAR VEHÍCULOS</div>
		<div class="card-body">
	  	  

	<!-- INICIO DEL FORMULARIO -->
	<form action="" method="post">
	
		<B>Bienvenido/a:</B><?php echo $_SESSION['Usuario']?><BR><BR>
		<B>Identificador Cliente:</B><?php echo $_SESSION['id'];?><BR><BR>
		
		<B>Vehiculos disponibles en este momento:</B><?php echo $fecha;?>  <BR><BR>
		
			<B>Matricula/Marca/Modelo: </B><?php mostrarVehiculos();?>
			
		
		<BR> <BR><BR><BR><BR><BR>
		<div>
			<input type="submit" value="Agregar a Cesta" name="accion" class="btn btn-warning disabled">
			<input type="submit" value="Realizar Alquiler" name="accion" class="btn btn-warning disabled">
			<input type="submit" value="Vaciar Cesta" name="accion" class="btn btn-warning disabled">
			
		</div>		
	</form>
	<!-- FIN DEL FORMULARIO -->
  </body>
   
</html>

