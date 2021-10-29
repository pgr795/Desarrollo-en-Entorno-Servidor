<?php
echo "<html>";
echo "<body>";

$fichero2=file("alumnos1.txt");
var_dump($fichero2);

foreach($fichero2 as $linea=>$texto) {
	echo "<table style='border: solid;'>".
		 "<tr>".
			"<td style='border: solid;'>"."Linea: ",$linea."</td>".
			"<td style='border: solid;'>".$texto."</td>".
		 "</tr>".
		 "</table>";
};

echo "</body>";
echo "</html>";
?>












