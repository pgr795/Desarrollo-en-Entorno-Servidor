<html>
<head>
	<meta charset="utf-8">
	<title>Consultar Sorteo</title>
</head>
<body>
	<div class="card-header"><h2>Consultar Sorteo</h2></div>
		<div class="card-body">

		<B>Bienvenido/a:</B><?php echo $_SESSION['usuario']; ?> <BR><BR>
		<B>Identificador Empleado:</B><?php echo $_SESSION['id']; ?>  <BR>
		
	
	<form method="post" action="ConsultarSorteo_controllers.php">
			<p>Desplegable que al seleccionar saque la informacion del sorteo</p>
			<input type='submit' name='accion' value='Alta de Sorteo'/>
			<input type='submit' name='accion' value='Atras'/>
	</form>
</body>
</html>	
