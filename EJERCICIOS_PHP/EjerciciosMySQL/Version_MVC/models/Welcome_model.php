<?php

function login($email,$password) {

	global $conexion;

	try{
		if($email!="" && $password!=""){
			$stmt = $conexion->prepare("SELECT first_name,last_name,email,customer_id 
			FROM customer where email='$email'");
			$stmt->execute();
			
			$cont=0;
			$nombreBD="";
			$apellidoBD="";
			$emailBD="";
			$idclienteBD="";
			
				foreach($stmt->fetchAll() as $consulta){
					$nombreBD=$consulta["first_name"];
					$apellidoBD=$consulta["last_name"];
					$emailBD=$consulta["email"];
					$idclienteBD=$consulta["customer_id"];
					$cont++;
				}
				
				if($cont == 1){
						session_start();
						$_SESSION['Usuario'] = $nombreBD." ".$apellidoBD;
						$_SESSION['id'] = $idclienteBD;
						$estado="ok";
				}
				else { 
					$error = "Usuario o password incorrectos !!!";
					echo $error;
					$estado="no";
				}
		}
	}
	catch(PDOException $e){
			echo "Error: " . $e->getMessage();	
		}
	return $estado;
	$conexion=null;
}

?>