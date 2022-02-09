<!DOCTYPE HTML>
<?php
	include('funciones.php');
	var_dump($_POST);
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		try{
			$usuario = limpieza($_POST["usuario"]);
			$contraseña = limpieza($_POST["contraseña"]);
		
			$conexion=crear_conexion();
			$stmt = $conexion->prepare("SELECT nombre,nif,clave FROM cliente where nif='$usuario' and clave='$contraseña' ");
			$stmt->execute();
			
			$cont=0;
			
			$usuarioBD="";
			$nifBD="";
			
			foreach($stmt->fetchAll() as $consulta){
				$usuarioBD=$consulta["nombre"];
				$nifBD=$consulta["nif"];
				$cont++;
			}
			
			if($cont == 1) {
				$_SESSION['nombre'] = $usuarioBD;
				setcookie('nombre',$usuarioBD, time() + (86400), "/");
				$_SESSION['nif'] = $nifBD;
				setcookie('nif',$nifBD, time() + (86400), "/");
				var_dump($_COOKIE);
				header("location: comprocli.php");
			}
			else { 
				$error = "Usuario o password incorrectos !!!";
				echo $error;
			}
		}
		catch(PDOException $e){
			echo "Error: " . $e->getMessage();	
		}
	}
?>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
</head>
<body>
	<h2>LOGIN</h2>
		<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
			<p>Usuario <input type='text' name='usuario' size=15></p>
			<p>Contraseña<input type='text' name='contraseña' size=15></p>
			<input type='submit' name='submit' value='Iniciar Sesion'/>
		</form>
		<div>
		
		</div>
</body>
</html>
