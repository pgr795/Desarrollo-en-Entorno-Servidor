<?php
echo "<html>";
echo "<body>";

$fichero2=file("alumnos1.txt");
var_dump($fichero2);

$aux=implode(" ",$fichero2);
var_dump($aux);

$contenido=explode(" ",$aux);
$resultado = array_unique($contenido);

var_dump($resultado);

foreach($fichero2 as $linea=>$texto) {
	echo "<table style='border: solid;'>".
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
		 "</table>";
};

echo "</body>";
echo "</html>";
?>












