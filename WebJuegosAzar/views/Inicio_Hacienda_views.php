<html>
 <head>
    <meta charset="UTF-8">
     <title>INICIO HACIENDA</title>
 </head>
   
 <body>
    <h1>INICIO HACIENDA</h1> 

    <div class="container ">
        <!--Aplicacion-->
		<div class="card border-success mb-3" style="max-width: 30rem;">
		<div class="card-header">Menú Empleado - OPERACIONES </div>
		<div class="card-body">
		<BR>

		<B>Bienvenido/a:</B><?php echo $_SESSION['usuario']; ?> <BR><BR>
		<B>Identificador Cliente:</B><?php echo $_SESSION['id']; ?>  <BR><BR>
	 
		
       <!--Formulario con botones -->
	
		<input type="button" value="Alta de Sorteos" onclick="window.location.href='AltaSorteo_controllers.php'" class="btn btn-warning disabled">
		<input type="button" value="Realizar Sorteo" onclick="window.location.href='RealizarSorteo_controllers.php'" class="btn btn-warning disabled">
		</br></br>
		
		
		  <BR><a href="../index.php">Cerrar Sesión</a>
	</div>  
	  
	  
     
   </body>
   
</html>


