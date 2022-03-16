<html>
<head>
	<meta charset="utf-8">
	<title>Registro Empleado</title>
</head>
<body>
	<h2>Alta de Registro</h2>
	<form method="post" action="Registro_controllers.php">
			<p>DNI: <input type='text' name='dni' maxlength="9" size=9></p>
			<p>Nombre: <input type='text' name='nombre' maxlength="40" size=40></p>
			<p>Apellido: <input type='text' name='apellido' maxlength="20" size=20></p>
			<p>EMAIL: <input type='text' name='email' maxlength="60" size=60></p>
			<input type='submit' name='accion' value='Registro Empleado'/>
			<input type='submit' name='accion' value='Atras'/>
	</form>
</body>
</html>