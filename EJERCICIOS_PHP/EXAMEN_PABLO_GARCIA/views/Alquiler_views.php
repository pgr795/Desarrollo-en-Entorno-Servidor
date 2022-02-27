<html>
<html>
   <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>VIDEOCLUB - IES Leonardo Da Vinci - Alquiler Películas</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    </head>
   

   
   <body>
    <h1 class="text-center"> VIDEOCLUB IES LEONARDO DA VINCI</h1>

    <div class="container ">
        <!--Aplicacion-->
		<div class="card border-success mb-3" style="max-width: 30rem;">
		<div class="card-header">Alquiler Películas</div>
		<div class="card-body">
	    

	<!-- INICIO DEL FORMULARIO -->
	<form action="Alquiler_controllers.php" method="post">
		
	<B>Nombre Cliente:</B><?php echo $_SESSION['nombre'];?>   <BR>
	<B>Email Cliente:</B><?php echo $_SESSION['email'];?> <BR>
	<B>Número Socio:</B><?php echo $_SESSION['idSocio'];?> <BR><BR>
		<label for="pelicula"><B>Selecciona pelicula: </B></label>
		<select name='pelicula' class='form-control'>
			<?php
				mostrarPelicula($conexion);
			?>
		</select>
		<div>
			<input type="submit" value="Agregar Pelicula" name="accion" class="btn btn-warning disabled">
			<input type="submit" value="Realizar Alquiler" name="accion" class="btn btn-warning disabled">
			<input type="submit" value="Vaciar Cesta" name="accion" class="btn btn-warning disabled">
			<input type="submit" value="Volver" name="accion" class="btn btn-warning disabled">
			
		</div>	
				
	</form>
	<!-- FIN DEL FORMULARIO -->
	</div>	
  </div>



</body>
</html>


