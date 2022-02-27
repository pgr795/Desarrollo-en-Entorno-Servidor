<?php
session_start();
var_dump($_SESSION);
/*Cuando se vuelva al login siempre se borrará la sesión activa*/
	if(isset($_SESSION["email"])){
		session_unset();
		session_destroy();
	}
	
include_once 'models/Login_model.php';
include_once 'views/Login_views.php';
include_once 'Funciones/funciones.php';
  var_dump($_SESSION);
	//Crear Conexion
	$conn=conexion();
		if(isset($_POST['submit'])){//Si no se ha pulsado el boton de login cierra sesión
				if(isset($_POST['usuario']) && isset($_POST['clave'])){//Si se han rellenado los campos del login
					
					$usuario=limpieza($_POST['usuario']);
					$clave=limpieza($_POST['clave']);
					//var_dump($usuario);
					//var_dump($clave);
					
					$respuesta = getCustomerId($conn,$usuario,$clave);
					
					//Conseguimos el nombre y el número de socio
					$result = $respuesta->setFetchMode(PDO::FETCH_ASSOC);
					
					foreach($respuesta->fetchAll() as $row) {
						$idSocio= $row["customer_id"];
						$nombre= $row["first_name"];
					}
					
					if($respuesta->rowCount() > 0){
						$_SESSION["email"]=$usuario;
						$_SESSION["nombre"]= $nombre;
						$_SESSION["idSocio"]= $idSocio;
						//var_dump($_SESSION);
						header("Location:controllers/Welcome_controllers.php");
					}
					else{
						echo "No existe ningun email con esa contrase&ntilde;a.";
						}
				}
				else
				{
					if(!isset($_POST['usuario'])){
						echo "No se ha proporcionado un usuario!";
					}
					if(!isset($_POST['clave'])){
						echo "No se ha proporcionado una contrase&ntilde;a!";
					}
				}
			 }

?>