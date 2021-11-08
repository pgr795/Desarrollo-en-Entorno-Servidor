<?php
$archivo=file("ibex35.txt");
foreach($archivo as $indice => $valor) {
		echo $valor."$";
		echo "<br>";
	}

?>