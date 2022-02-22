<?php
	//session_start();
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

    <title>PORTAL EMPLEADO</title>
 </head>
      
<body>
    <h1>PORTAL EMPLEADO</h1>

    <div class="container ">
			<!--Aplicacion-->
			<div class="card border-success mb-3" style="max-width: 30rem;">
			<div class="card-header">Modificar Salario</div>
			<div class="card-body">
			
			<form id="" name="" action="../controllers/modificar_salario_controllers.php" method="post" class="card-body">
			
			<div class="form-group">
				ID empleado <input type="text" name="ID" class="form-control">
			</div>
			<div class="form-group">
				Salario <input type="text" name="Salario" class="form-control">
			</div>				
			
			<input type="submit" name="submit" value="Modificar Salario" class="btn btn-warning disabled"><br>
			<a href="./retornarWelcome_controllers.php">Volver</a>
			</form>
			
			</div>
			</div>
	</div>
</body>
</html>