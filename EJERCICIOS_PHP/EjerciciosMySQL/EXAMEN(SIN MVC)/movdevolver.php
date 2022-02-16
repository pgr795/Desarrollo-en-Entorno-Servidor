<?php
	include('php/funciones.php');
	session_start();
	if (!isset($_SESSION['Usuario']) && !isset($_SESSION['id'])){
		session_unset();
		session_destroy();
		header("location: movlogin.php");
	}
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$usuario=$_SESSION['Usuario'];
		$idUsuario=$_SESSION['id'];
		$matricula=$_POST['vehiculos'];
		$accion=$_POST['accion'];
		$fecha=date("Y-m-d H:i:s"); 
		var_dump($accion);
		var_dump($matricula);	
		var_dump($_POST);
		
		if($accion=="Devolver Vehiculo"){
			devolverVehiculo($matricula,$idUsuario,$fecha);
		}
		else if($accion="Volver"){
			header("Location:movwelcome.php");
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
		<div class="card-header">Menú Usuario - DEVOLUCIÓN VEHÍCULO </div>
		<div class="card-body">
	  
	   

	<!-- INICIO DEL FORMULARIO -->
	<form action="movdevolver.php" method="post">
	
		<B>Bienvenido/a:</B><?php echo $_SESSION['Usuario'];?>   <BR><BR>
		<B>Identificador Cliente:</B><?php echo $_SESSION['id'];?>  <BR><BR>
				
			<B>Matricula/Marca/Modelo: </B>
				<?php
					$id=$_SESSION['id'];
					mostrarVehiculoCliente($id);
				?>
		<BR><BR>
		<div>
			<input type="submit" value="Devolver Vehiculo" name="accion" class="btn btn-warning disabled">
			<input type="submit" value="Volver" name="accion" class="btn btn-warning disabled">
		</div>		
	</form>
	<!-- FIN DEL FORMULARIO -->
	<a href = "cerrarsesion.php">Cerrar Sesion</a>
	
  </body>
   
</html>		
