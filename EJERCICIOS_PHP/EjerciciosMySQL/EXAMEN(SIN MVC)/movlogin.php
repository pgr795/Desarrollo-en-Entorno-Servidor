<html>
   <?php
	include('php/funciones.php');
	var_dump($_POST);
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		try{
			$email = limpieza($_POST["email"]);
			$contraseña = limpieza($_POST["password"]);
		
			$conexion=crear_conexion();
			$stmt = $conexion->prepare("SELECT nombre,apellido,email,idcliente,fecha_baja FROM rclientes where email='$email'");
			$stmt->execute();
			
			$cont=0;
			
			$nombreBD="";
			$apellidoBD="";
			$emailBD="";
			$idclienteBD="";
			$fecha_bajaBD="";
			
			foreach($stmt->fetchAll() as $consulta){
				$nombreBD=$consulta["nombre"];
				$apellidoBD=$consulta["apellido"];
				$emailBD=$consulta["email"];
				$idclienteBD=$consulta["idcliente"];
				$fecha_bajaBD=$consulta["fecha_baja"];
				$cont++;
			}
			
			if($cont == 1) {
				if($emailBD==$email && $contraseña==$apellidoBD && $fecha_bajaBD==NULL){
					session_start();
					$_SESSION['Usuario'] = $nombreBD." ".$apellidoBD;
					$_SESSION['id'] = $idclienteBD;
					//var_dump($_SESSION);
					header("location: movwelcome.php");
				}
				else { 
					$error = "Usuario o password incorrectos !!!";
				echo $error;
				}
			}
			else{
				echo "ERROR";
			}
		}
		catch(PDOException $e){
			echo "Error: " . $e->getMessage();	
		}
	}
	?>
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page - MovilMad</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
 </head>
      
<body>
    <h1>MOVILMAD</h1>

    <div class="container ">
        <!--Aplicacion-->
		<div class="card border-success mb-3" style="max-width: 30rem;">
		<div class="card-header">Login Usuario</div>
		<div class="card-body">
		
		<form id="" name="" action="" method="post" class="card-body">
		
		<div class="form-group">
			Email <input type="text" name="email" placeholder="email" class="form-control">
        </div>
		<div class="form-group">
			Clave <input type="password" name="password" placeholder="password" class="form-control">
        </div>				
        
		<input type="submit" name="submit" value="Login" class="btn btn-warning disabled">
        </form>
		
	    </div>
    </div>
    </div>
    </div>

</body>
</html>