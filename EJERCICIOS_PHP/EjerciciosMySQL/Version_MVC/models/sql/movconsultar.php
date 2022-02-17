<?php
	include('php/funciones.php');
	session_start();
	if (!isset($_SESSION['Usuario']) && !isset($_SESSION['id'])){
		header("location: movlogin.php");
	}
		//$_SESSION['Usuario'] = $nombreBD."".$apellidoBD;
		//$_SESSION['id'] = $id;
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
		<div class="card-header">Menú Usuario - CONSULTA ALQUILERES </div>
		<div class="card-body">
	  
	  	
	   

	<!-- INICIO DEL FORMULARIO -->
	<form action="" method="post">
				
		<B>Bienvenido/a:</B><?php echo $_SESSION['Usuario']?>   <BR><BR>
		<B>Identificador Cliente:</B><?php echo $_SESSION['id']?>  <BR><BR>
		     
			 Fecha Desde: <input type='date' name='fechadesde' value='' size=10 placeholder="fechadesde" class="form-control">
			 Fecha Hasta: <input type='date' name='fechahasta' value='' size=10 placeholder="fechahasta" class="form-control"><br><br>
				
		<div>
			<input type="submit" value="Consultar" name="Volver" class="btn btn-warning disabled">
		
			<input type="submit" value="Volver" name="Volver" class="btn btn-warning disabled">
		
		</div>		
	</form>
	<!-- FIN DEL FORMULARIO -->
    <a href = "">Cerrar Sesion</a>

  </body>
   
</html>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
		$valor1 = $_POST["fechadesde"];
		$valor2 = $_POST["fechahasta"];
	
		$fechadesde=$valor1;
		$fechahasta=$valor2;
		$cesta=unserialize($_COOKIE['cesta']);
		$usuario=$_SESSION['Usuario'];
		$idUsuario=$_SESSION['id'];
		mostrartablas($cesta,$fechadesde,$fechahasta,$idUsuario);
		var_dump($_POST);
		var_dump($cesta);
	}
		// var_dump($_COOKIE);
		// var_dump($matricula);
		// var_dump($accion);
		// var_dump($usuario);
		// var_dump($idUsuario);	
		// var_dump($_POST);
?>
