<html>
<head>
	<meta charset="utf-8">
	<title>Alta de Sorteo</title>
</head>
<body>
	<div class="card-header"><h2>Alta de Sorteo</h2></div>
		<div class="card-body">

		<B>Bienvenido/a:</B><?php echo $_SESSION['usuario']; ?> <BR><BR>
		<B>Identificador Empleado:</B><?php echo $_SESSION['id']; ?>  <BR>
		
	
	<form method="post" action="AltaSorteo_controllers.php">
			<p>Fecha: <input type="datetime-local" name="fecha"></p>
			<input type='submit' name='accion' value='Alta de Sorteo'/>
			<input type='submit' name='accion' value='Atras'/>
	</form>
</body>
</html>	
