<html>
   <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>VIDEOCLUB - IES Leonardo Da Vinci</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    </head>
   
    <body>
    <h1 class="text-center"> VIDEOCLUB IES LEONARDO DA VINCI</h1>

    <div class="container ">
        <!--Aplicacion-->
		<div class="card border-success mb-3" style="max-width: 30rem;">
		<div class="card-header">Menú Usuario</div>
		<div class="card-body">
		<B>Nombre Cliente:</B><?php echo $_SESSION['nombre'];?><BR>
		<B>Email Cliente:</B><?php echo $_SESSION['email'];?><BR>
		<B>Número Socio:</B><?php echo $_SESSION['idSocio'];?><BR>
			
		<!--Formulario con botones -->
		<input type="button" value="Alquilar Películas" onclick="window.location.href='../controllers/Alquiler_controllers.php'" class="btn btn-warning disabled">
		
		<input type="button" value="Consultar Alquileres" onclick="window.location.href='../controllers/Consultar_controllers.php'" class="btn btn-warning disabled">
		
		<input type="button" value="Devolver Películas" onclick="window.location.href='../controllers/Devolver_controllers.php'" class="btn btn-warning disabled"><BR>
		
		<input type="button" value="Volver" onclick="window.location.href=''" class="btn btn-warning disabled"><BR>

		  <BR><a href="../index.php">Cerrar Sesión</a>
	</div>  
	  
	  
     
   </body>
   
</html>