<?php
echo "<html>";
echo "<body>";

$fichero=file("alumnos2.txt");
var_dump($fichero);

echo "<table border='1px'>";
echo "<tr>".
			"<td>"."Nombre"."</td>".
			"<td>"."Apellido1"."</td>".
			"<td>"."Apellido2"."</td>".
			"<td>"."Fecha"."</td>".
			"<td>"."Localidad"."</td>".
	"</tr>";
foreach($fichero as $linea=>$texto) {
	$contenido=explode('##',$texto);
	$nombre=$contenido[0];
	$Apellido1=$contenido[1];
	$Apellido2=$contenido[2];
	$Fecha=$contenido[3];
	$Localidad=$contenido[4];
	var_dump($contenido);
	echo "<tr>".
			"<td>".$nombre."</td>".
			"<td>".$Apellido1."</td>".
			"<td>".$Apellido2."</td>".
			"<td>".$Fecha."</td>".
			"<td>".$Localidad."</td>".
	"</tr>";
};
echo "</table>";
echo "</body>";
echo "</html>";
?>

