<?php
	
function mostrarPelicula($conexion){
		try {
		 $numeroSocio= $_SESSION["idSocio"];
			$stmt = $conexion->prepare("SELECT rental.film_id,title FROM film,rental
            where film.film_id=rental.film_id and customer_id='$numeroSocio' and return_date is null");// select concat(matricula,'#',marca,'#',modelo) as pepe from rvehiculos where disponible='S';
			$stmt->execute();
			
				foreach($stmt->fetchAll() as $consulta){
					echo '<option value="'.$consulta["film_id"].'">'.$consulta["title"].'</option>';
				}
		
		}
		catch(PDOException $e){
			echo "Error:". $e->getMessage();
		}
}	
		
function devolverPelicula($conexion,$pelicula){
	  try {
            $fechaDevolucion= date("Y-m-d H:i:s");
            $numeroSocio= $_SESSION["idSocio"];

            //Sumaremos 1 a la cantidad del inventario de la película cuando se devuelva.
            $smtm= $conexion->prepare("SELECT quantity FROM inventory
            where film_id='$pelicula'");
            $smtm->execute();
            // set the resulting array to associative
            $result = $smtm->setFetchMode(PDO::FETCH_ASSOC);
            
            foreach($smtm->fetchAll() as $consulta) {
                $cantidad= $consulta["quantity"];
            }

            $nuevaCantidad= $cantidad+1;
            //Se hace el update para restar las unidades a la cantidad de películas.
            $updateUnidades="UPDATE inventory SET quantity='$nuevaCantidad' WHERE film_id='$pelicula'";
            $conexion->exec($updateUnidades);

            //Se hace el update para restar las unidades a la cantidad de películas.
            $updateFechaDevolucion= "UPDATE rental SET return_date='$fechaDevolucion' WHERE film_id='$pelicula'
            and customer_id='$numeroSocio' and return_date is null";
            $conexion->exec($updateFechaDevolucion);

            echo "La película se ha devuelto corretamente.";
        }
        catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
	
?>
