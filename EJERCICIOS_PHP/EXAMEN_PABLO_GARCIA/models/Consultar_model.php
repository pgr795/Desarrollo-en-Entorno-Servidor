<?php
function mostrarTematicas($conexion) {
        try {
            $numeroSocio= $_SESSION["idSocio"];

            $smtm= $conexion->prepare("SELECT distinct theme FROM film");
            $smtm->execute();
            // set the resulting array to associative
            $result = $smtm->setFetchMode(PDO::FETCH_ASSOC);
            foreach($smtm->fetchAll() as $consulta) {
                echo '<option value="'.$consulta["theme"].'">'.$consulta["theme"].'</option>';
            }
        } 
        catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

function consultarAlquileres($conexion,$tematica) {
            $numeroSocio= $_SESSION["idSocio"];

            //Solo mostrará los alquileres que han sido devueltos
            try {
                $queryAlquileresClientes= $conexion->prepare("SELECT title,release_year,rental_date,return_date 
                from film,rental 
                where film.film_id=rental.film_id 
                and theme='$tematica' and customer_id='$numeroSocio' and return_date is not null
                order by rental_date desc"); //ordenamos la fecha de más nueva a más antigua.
                $queryAlquileresClientes->execute();

                return $queryAlquileresClientes->fetchAll(PDO::FETCH_ASSOC);
            } 
            catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
?>
