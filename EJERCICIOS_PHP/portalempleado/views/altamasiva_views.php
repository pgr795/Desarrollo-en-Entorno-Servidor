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
			<div class="card-header">Alta varios Empleado</div>
			<div class="card-body">
			
				<form id="" name="" action="../controllers/altamasiva_controllers.php" method="post" class="card-body">
				<div class="form-group">
					Nombre <input type="text" name="nombre"  class="form-control"><br>
					Apellido<input type="text" name="apellido"  class="form-control"><br>
					Fecha de nacimiento <input type="date" name="birth" class="form-control"><br>
					Genero:<br>
					Masculino:<input type="radio" name="gender" value="M" class="form-control" checked><br>
					Femenino:<input type="radio" name="gender" value="F" class="form-control" >
						  <br>
					Fecha de contratacion <input type="date" name="date" class="form-control"><br>
					Fecha de expiracion <input type="text" name="expirar" class="form-control"><br>
				</div>
				<div class="form-group">
					Nombre del departamento
					<?php	
						require_once("../db/db.php");
						require_once("../models/altamasiva_model.php");
						mostrarDepartamento();
					?>
				</div>
				<div class="form-group">
					Salario<input type="text" name="salario" placeholder="salario" class="form-control">
				</div>	
				<div class="form-group">
					Cargo<input type="text" name="cargo" placeholder="cargo" class="form-control">
				</div>	
				
				<input type="submit" value="Agregar Empleado" name="accion" class="btn btn-warning disabled">
				<input type="submit" value="Dar Alta" name="accion" class="btn btn-warning disabled">
				<input type="submit" value="Vaciar Listado" name="accion" class="btn btn-warning disabled">
				<BR><a href="./retornarWelcome_controllers.php">Volver</a>
				</form>
			
			</div>
			</div>
	</div>
</body>
</html>