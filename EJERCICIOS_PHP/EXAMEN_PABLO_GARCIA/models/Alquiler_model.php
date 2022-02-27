<?php
function mostrarPelicula($conexion){
		try {
			$stmt = $conexion->prepare("SELECT film.film_id,title FROM film,inventory 
            where film.film_id=inventory.film_id and quantity>0");// select concat(matricula,'#',marca,'#',modelo) as pepe from rvehiculos where disponible='S';
			$stmt->execute();
			
				foreach($stmt->fetchAll() as $consulta){
					echo '<option value="'.$consulta["film_id"].'">'.$consulta["title"].'</option>';
				}
		
		}
		catch(PDOException $e){
			echo "Error:". $e->getMessage();
		}
}

function agregarPelicula($datos,$pelicula){
	if(!isset($_SESSION['pelicula'])){
		$datos=array(array($pelicula));
		$_SESSION['pelicula']=$datos;
		$aux=$_SESSION['pelicula'];
	}
	else{
		$datos=array($pelicula);
		array_push($_SESSION['pelicula'],$datos);
		$aux=$_SESSION['pelicula'];
		}
}

function realizarAlquiler($datosRecogidos,$conexion){
	 try {
		//recorrer almacenes, si está en el almacen coger el producto de ese almacén y hacer todo.
            $fechaAlquiler=date("Y-m-d H:i:s");
            $numeroSocio=$_SESSION["idSocio"];
			
            foreach($datosRecogidos as $indice => $valor) {
				$pelicula=$valor[0];
                $smtm= $conexion->prepare("SELECT quantity FROM inventory where film_id='$pelicula'");
                $smtm->execute();
                // set the resulting array to associative
                $result = $smtm->setFetchMode(PDO::FETCH_ASSOC);
                
                foreach($smtm->fetchAll() as $consulta) {
                    $cantidad=$consulta["quantity"];
                }
                
                //Si hay al menos una película disponible...
                if($cantidad>=1) {
                    //Insertamos en la tablas rental.
                    $insertPelicula= "INSERT INTO rental VALUES ('$pelicula','$fechaAlquiler','$numeroSocio',null)";
                    $conexion->exec($insertPelicula);

                    $nuevaCantidad= $cantidad-1;
					
                    //Se hace el update para restar las unidades a la cantidad de películas.
                    $updateUnidades= "UPDATE inventory SET quantity='$nuevaCantidad' WHERE film_id='$pelicula'";
                    $conexion->exec($updateUnidades);
                    echo "El alquiler de la pelicula $pelicula se ha realizado correctamente. <br>";
                }
                else {
                    echo "No hay unidades suficientes de la película $pelicula";
                }
            }
        }
        catch(PDOException $e) {
            echo $e->getMessage();
        }
    }


?>

