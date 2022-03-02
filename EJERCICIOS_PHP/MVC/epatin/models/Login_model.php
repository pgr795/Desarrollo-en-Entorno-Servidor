<?php

function login($email,$password){
	try{
		$conexion=conexion();
		$stmt = $conexion->prepare("SELECT dni,nombre,apellido,email,saldo FROM eclientes where email='$email' and dni= '$password'
		and fecha_baja IS NULL");
		$stmt->execute();
		$cont=0;
		
		foreach($stmt->fetchAll() as $consulta){
                $dniBD=$consulta["dni"];
				$emailBD=$consulta["email"];
				$cont++;
		}
		
		if($cont == 1){
			if($emailBD==$email && $password==$dniBD){
                    $stmt->execute();
                    return $stmt->fetchAll();
			}
			else{
					$error = "Error al iniciar sesion!!!";
                    echo $error;
			}
		}
	}
	catch(PDOException $e){
		echo "Error: Login " . $e->getMessage();	
	}
}

?>