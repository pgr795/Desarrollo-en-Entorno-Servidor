<html>
<head>
	<meta charset="utf-8">
	<title>Realizar Sorteo</title>
</head>
<body>
	<div class="card-header"><h2>Realizar Sorteo</h2></div>
		<div class="card-body">

		<B>Bienvenido/a:</B><?php echo $_SESSION['usuario']; ?> <BR><BR>
		<B>Identificador Cliente:</B><?php echo $_SESSION['id']; ?>  <BR>
		
	
	<form method="post" action="Registro_controllers.php">
			<p>Mostrar desplegable sorteos activos</p>
			<p>Mirar el ejercicio de la primitiva</p>
			<input type='submit' name='accion' value='Realizar Sorteo'/>
			<input type='submit' name='accion' value='Atras'/>
	</form>
</body>
</html>	
