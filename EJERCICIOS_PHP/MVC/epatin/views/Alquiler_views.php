<html> 
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Bienvenido a EPATIN</title>
    <link rel="stylesheet" href="../views/css/bootstrap.min.css">
 </head>
 
 <body>
    <h1>Servicio de ALQUILER PATINETES ELÉCTRICOS</h1> 

    <div class="container ">
        <!--Aplicacion-->
		<div class="card border-success mb-3" style="max-width: 30rem;">
		<div class="card-header">Menú Usuario - ALQUILAR PATINETES</div>
		<div class="card-body">
	  	  

	<!-- INICIO DEL FORMULARIO -->
	<form action="" method="post">
	
		<B>Bienvenido/a:</B><?php echo $_SESSION['usuario']?><BR><BR>
		<B>Saldo Cuenta:</B> <?php echo $_SESSION['saldo']?><BR><BR>
		
		<B>PATINETES disponibles</B><?php echo $fecha=date("Y-m-d H:i:s");?><BR>
		
			<select name="patinetes" class="form-control">
				<?php mostrarPatinetes($conexion);?>
			</select>
			
		
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

