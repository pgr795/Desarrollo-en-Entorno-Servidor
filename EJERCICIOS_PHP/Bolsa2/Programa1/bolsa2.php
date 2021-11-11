<?php
$fichero="ibex35.txt";
$archivo=fopen($fichero,"r");
echo $leer=fread($archivo, filesize($fichero));
fclose($archivo);


/* while (!feof($file))
{
echo fgetc($file);
} */

?>