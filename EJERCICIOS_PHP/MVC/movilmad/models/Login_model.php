<?php
    function login($email,$password){
        try{
			$conexion=conexion();
			$stmt = $conexion->prepare("SELECT nombre,apellido,email,idcliente FROM rclientes where email='$email' and apellido= '$password'");
			$stmt->execute();
			
			$cont=0;
			
		
			foreach($stmt->fetchAll() as $consulta){
                $apellidoBD=$consulta["apellido"];
				$emailBD=$consulta["email"];
				$cont++;
			}
			
			if($cont == 1) {
				if($emailBD==$email && $password==$apellidoBD){
                    $stmt->execute();
                    return $stmt->fetchAll();
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


        