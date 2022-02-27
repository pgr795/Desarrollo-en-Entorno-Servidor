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
		<div class="card-header">Consulta Alquileres</div>
		<div class="card-body">
      
	   

	<!-- INICIO DEL FORMULARIO -->
	<form action="Consultar_controllers.php" method="post">
	
	<B>Nombre Cliente:</B><?php echo $_SESSION['nombre'];?>   <BR>
	<B>Email Cliente:</B><?php echo $_SESSION['email'];?> <BR>
	<B>Número Socio:</B><?php echo $_SESSION['idSocio'];?> <BR><BR>
				 
		<label for="tematica" ><B> Seleccionar Temática:</B> </label>
		<select name="tematica" class="form-control">
		<?php mostrarTematicas($conexion);?>
		</select>
		<BR>
		
		<BR>		
		<div>
		    <input type="submit" value="Consultar" name="consultar" class="btn btn-warning disabled">
			<input type="submit" value="Volver" name="Volver" class="btn btn-warning disabled">
		</div>	
		
		<?php 
			function mostrarTematica($peliculasTematica){
			//var_dump($peliculasTematica);
			echo "<table border='1'>";
				foreach($peliculasTematica as $indice => $valor){
					echo "<tr>";
					foreach($valor as $indice2 => $valor2){
						echo "<td>".$valor2."</td>";
					}
					echo "</tr>";
				}
			echo "</table>";
			}
		?>
	</form>
	<!-- FIN DEL FORMULARIO -->
  </div>



</body>
</html>

