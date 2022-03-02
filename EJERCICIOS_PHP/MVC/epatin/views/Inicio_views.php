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
		<div class="card-header">Menú Usuario - OPERACIONES </div>
		<div class="card-body">


		<B>Bienvenido/a:</B><?php echo $_SESSION['usuario']?><BR><BR>
		<B>Saldo Cuenta:</B> <?php echo $_SESSION['saldo']?><BR><BR>
	  
		<!--Formulario con enlaces -->
		<ul>
		 	
		<input type="button" value="Alquilar Patin" onclick="window.location.href='Alquiler_controllers.php'" class="btn btn-warning disabled">
		<input type="button" value="Consultar Alquileres" onclick="window.location.href='Consultar_controllers.php'" class="btn btn-warning disabled">
		<input type="button" value="Aparcar Patin" onclick="window.location.href='Aparcar_controllers.php'" class="btn btn-warning disabled">
		
		</ul>
		
       
		
		  <BR><a href="../index.php">Cerrar Sesión</a>
	</div>  
	  
	  
     
   </body>
   
</html>


