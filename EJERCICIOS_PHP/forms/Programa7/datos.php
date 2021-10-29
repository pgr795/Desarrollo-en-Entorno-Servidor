<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = limpieza($_POST["nombre"]);
    $apellido1 = limpieza($_POST["apellido1"]);
    $apellido2 = limpieza($_POST["apellido2"]);
    $email = limpieza($_POST["email"]);
    $sexo = limpieza($_POST["sexo"]);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($nombre)){
        echo "El campo nombre está vacío <br>"; 
		echo "<br>";
	}
    if(empty($email)){
        echo "El campo email está vacío <br>"; 
		echo "<br>";
	}
    if(empty($sexo)){
        echo "El campo sexo está vacío <br>"; 
		echo "<br>";
	}
}

function limpieza($datos) {
  $datos = trim($datos);
  $datos = stripslashes($datos);
  $datos = htmlspecialchars($datos);
  return $datos;
}

echo "<table border='1px'>";
			echo "<tr>".
					"<td>"."Nombre"."</td>".
					"<td>"."Apellidos"."</td>".
					"<td>"."email"."</td>".
					"<td>"."sexo"."</td>".
				 "</tr>";	
			echo "<tr>". 
					"<td>".$nombre."</td>".
					"<td>".$apellido1." ".$apellido2."</td>".
					"<td>".$email."</td>".
					"<td>".$sexo."</td>".
				"</tr>";
echo "</table>";

?>
