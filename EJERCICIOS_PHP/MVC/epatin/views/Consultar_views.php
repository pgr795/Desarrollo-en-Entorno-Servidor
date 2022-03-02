<html>
   
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Bienvenido a MovilMAD</title>
    <link rel="stylesheet" href="../views/css/bootstrap.min.css">
  </head>
   
 <body>
    <h1>Servicio de ALQUILER PATINETES ELÉCTRICOS</h1> 

    <div class="container ">
        <!--Aplicacion-->
		<div class="card border-success mb-3" style="max-width: 30rem;">
		<div class="card-header">Menú Usuario - CONSULTA ALQUILERES </div>
		<div class="card-body">
	  
	  	
	   

	<!-- INICIO DEL FORMULARIO -->
	<form action="" method="post">
				
		<B>Bienvenido/a:</B>    <BR><BR>
		<B>Saldo Cuenta:</B>    <BR><BR>
		     
			 Fecha Desde: <input type='date' name='fechadesde' value='' size=10 placeholder="fechadesde" class="form-control">
			 Fecha Hasta: <input type='date' name='fechahasta' value='' size=10 placeholder="fechahasta" class="form-control"><br><br>
		<?php
				function mostrartablas($fechadesde,$fechahasta,$id){
							try {
								$conexion=conexion();
								$stmt = $conexion->prepare("SELECT epatines.matricula as matriculas,bateria,fecha_alquiler,fecha_devolucion,preciototal
								FROM eclientes,ealquileres,epatines 
								WHERE eclientes.dni = ealquileres.dni 
								AND ealquileres.matricula = epatines.matricula 
								AND ealquileres.dni='$id' 
								AND ealquileres.fecha_alquiler BETWEEN '$fechadesde' AND '$fechahasta'
								ORDER BY fecha_alquiler ASC");
								$stmt->execute();
								echo "<table border='1'>";
									foreach($stmt->fetchAll() as $consulta){
										echo "<tr>
													<td>".$consulta['matriculas']."</td>
													<td>".$consulta['bateria']."</td>
													<td>".$consulta['fecha_alquiler']."</td>
													<td>".$consulta['fecha_devolucion']."</td>
													<td>".$consulta['preciototal']."</td>
											</tr>";
									}
								echo "</table>";
								}
							catch(PDOException $e){
								echo "Error:". $e->getMessage();
							}
				}
			?>
		<div>
			<input type="submit" value="Consultar" name="Volver" class="btn btn-warning disabled">
		
			<input type="submit" value="Volver" name="Volver" class="btn btn-warning disabled">
		
		</div>		
	</form>
	<!-- FIN DEL FORMULARIO -->
    <a href = "">Cerrar Sesion</a>

  </body>
   
</html>
