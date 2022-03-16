<html>
<head>
	<meta charset="utf-8">
	<title>Alta de Sorteo</title>
</head>
<body>
	<div class="card-header"><h2>Alta de Sorteo</h2></div>
		<div class="card-body">

		<B>Bienvenido/a:</B><?php echo $_SESSION['usuario']; ?> <BR><BR>
		<B>Identificador Cliente:</B><?php echo $_SESSION['id']; ?>  <BR>
		
	
	<form method="post" action="Registro_controllers.php">
			<p>Fecha: <input type='text' name='fecha'></p>
			<input type='submit' name='accion' value='Alta de Sorteo'/>
			<input type='submit' name='accion' value='Atras'/>
	</form>
</body>
</html>	
