<?php
	var_dump($_SESSION);
	if (!isset($_SESSION['NOMBRE']) && !isset($_SESSION['ID']) && !isset($_SESSION['DEPT'])){
		session_destroy();
		session_unset();
		header("Location:../views/login_views.php");
	}
?>
<html>
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Bienvenido a Portal de Empleado</title>
 </head>
   
 <body>
    <h1>Bienvenido a Portal de Empleado</h1> 

    <div class="container ">
        <!--Aplicacion-->
		<div class="card border-success mb-3" style="max-width: 30rem;">
		<div class="card-header">Menú Usuario - OPERACIONES </div>
		<div class="card-body">


		<B>Bienvenido/a:</B><?php echo $_SESSION['NOMBRE'];?> <BR><BR>
		<B>Identificador empleado:</B><?php echo $_SESSION['ID'];?> <BR><BR>
		<B>Departamento:</B><?php echo $_SESSION['DEPT'];?><BR><BR>
		
       <!--Formulario con botones -->
	
		<input type="button" value="Alta Empleado" onclick="window.location.href='altaempleado_controllers.php'" class="btn btn-warning disabled">
		<input type="button" value="Alta Masiva Empleados" onclick="window.location.href='altamasiva_controllers.php'" class="btn btn-warning disabled">
		<input type="button" value="Modificar salario" onclick="window.location.href='modificar_salario_controllers.php'" class="btn btn-warning disabled">
		<input type="button" value="Vida laboral" onclick="window.location.href='vida_laboral_controllers.php'" class="btn btn-warning disabled">
		<input type="button" value="Info departamentos" onclick="window.location.href='info_dept_controllers.php'" class="btn btn-warning disabled">
		<input type="button" value="Cambio departamento" onclick="window.location.href='cambio_dept_controllers.php'" class="btn btn-warning disabled">
		<input type="button" value="Nuevo jefe departamento" onclick="window.location.href='nuevo_jef_controllers.php'" class="btn btn-warning disabled">
		<input type="button" value="Baja empleado" onclick="window.location.href='baja_emp_controllers.php'" class="btn btn-warning disabled">
		<input type="button" value="Mi nomina" onclick="window.location.href='nomina_controllers.php'" class="btn btn-warning disabled">
		<input type="button" value="Historial laboral" onclick="window.location.href='historial_lab_controllers.php'" class="btn btn-warning disabled">
		</br></br>
		
		
		  <BR><a href="">Cerrar Sesión</a>
	</div>  
   </body>
   
</html>


