<?php
echo "<html>";
echo "<body>";

$fichero2=file("alumnos1.txt");
var_dump($fichero2);

echo "<table border='1px'>";
echo "<tr>".
			"<td>"."Nombre"."</td>".
			"<td>"."Apellido1"."</td>".
			"<td>"."Apellido2"."</td>".
			"<td>"."Fecha"."</td>".
			"<td>"."Localidad"."</td>".
	"</tr>";
foreach($fichero2 as $linea=>$texto) {
	$nombre=substr($texto,0,39);
	$Apellido1=substr($texto,39,40);
	$Apellido2=substr($texto,79,42);
	$Fecha=substr($texto,120,11);
	$Localidad=substr($texto,132,27);
	echo "<tr>".
			"<td>".$nombre."</td>".
			"<td>".$Apellido1."</td>".
			"<td>".$Apellido2."</td>".
			"<td>".$Fecha."</td>".
			"<td>".$Localidad."</td>".
	"</tr>";
};
echo "</table>";


	/* "<table style='border: solid;'>".
		 "<tr>".
			"<td>"."Nombre"."</td>".
			"<td>"."Apellido1"."</td>".
			"<td>"."Apellido2"."</td>".
			"<td>"."Fecha"."</td>".
			"<td>"."Localidad"."</td>".
		 "</tr>".
		 "<tr>".
			"<td>"."Linea: ",$linea."</td>".
			"<td>".$texto."</td>".
		 "</tr>".
	"</table>"; */
echo "</body>";
echo "</html>";
?>












