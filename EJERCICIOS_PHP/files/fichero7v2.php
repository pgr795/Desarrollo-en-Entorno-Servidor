<?php

$validar="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["caja1"])) {
    echo $validar = "Error: No se ha introducido ninguna ruta <br>";
  }
  if (empty($_POST["caja2"])&& $_POST["fichero"]=="CopiarFichero") {
    echo $validar = "Error: No se ha introducido ninguna ruta <br>";
  }
   if (empty($_POST["fichero"])) {
    echo $validar = "Error: No has elegido operacion <br>";
  }
  
}
 $valor1 = ($_POST["caja1"]);
 $valor2 = ($_POST["caja2"]);
 $valor3 = ($_POST["fichero"]);
 
var_dump($_POST);

//https://www.ventics.com/manejo-de-archivos-con-php/
/* https://informaticapc.com/tutorial-php/manejo-de-archivos.php */
/* https://www.neoguias.com/renombrar-archivos-con-php/ */
/* https://parzibyte.me/blog/2018/07/10/trabajando-con-archivos-y-carpetas-en-php-crud/ */



/* $from = 'C:\\xampp\htdocs\imagenes';
$to = 'C:\\xampp\htdocs\imagenes-copiadas';

//Abro el directorio que voy a leer
//opendir
$dir = opendir($from);
 */
 
//Copio el archivo manteniendo el mismo nombre en la nueva carpeta
     /* copy($from.'/'.$file, $to.'/'.$file);
		$from = 'C:\\xampp\htdocs\copy\images\*.*';
		$to = 'C:\\xampp\htdocs\copy\copy-images'; */

		/* $aux=fopen("$origen","x");
		fwrite($aux,"hello");
		fclose($aux); */

//Ejecuto el comando para copiar los archivos de la carpeta from a to
// exec('copy "'.$from.'" "'.$to.'"');

$fichero1=$valor1;
var_dump($fichero1);
$fichero2=$valor2;
var_dump($fichero2);
$fichero_origen=basename($valor1);
var_dump($fichero_origen);
$fichero_destino=basename($valor2);
var_dump($fichero_destino);
$origen=dirname($valor1);
var_dump($origen);
$destino=dirname($valor2);
var_dump($destino);

if(file_exists($fichero1)){
		echo "El fichero ORIGEN ".dirname($fichero1)." EXISTE";
		if($valor3=="CopiarFichero"){
			//copy — Copia un fichero
			$nuevo_fichero= "$destino.'/'.$fichero";
			/* var_dump($nuevo_fichero); */
			if (file_exists($nuevo_fichero)) {
				echo "Error al copiar el fichero $nuevo_fichero EXISTE <br>";
			}else{
				echo "Se ha copiado el fichero  <br>";
				copy($origen.'/'.$fichero_origen, $destino.'/'.$fichero_destino);
			}
		}
		
		if($valor3=="RenombrarFichero"){
			//rename — Renombra un fichero o directorio
			if($origen==$destino){
				 if(file_exists($fichero2)){	
					$fichero_origen=basename($valor1);
					var_dump($fichero_origen);
					$nuevo_fichero = "$origen.'\'.$fichero_origen";
					var_dump($nuevo_fichero);
					$fichero_destino=basename($valor2);
					var_dump($fichero_destino);
					$nuevo_fichero2 = "$destino.'\'.$fichero_destino";
					var_dump($nuevo_fichero2);
					rename("$nuevo_fichero","$nuevo_fichero2");
					echo "<br>";
					echo "Se ha renombrado el fichero";
					echo "<br>";
				 }
				 else{
					echo "<br>";
					echo "No se ha podido renombrar el fichero";
					echo "<br>";
				 }
			}
			else{
				echo "<br>";
				echo "Diferente rutas";
				echo "<br>";
			}
			/* rename("$valor1","$fichero4"); */			
		}
		if($valor3=="BorrarFichero"){
			//unlink — Borra un fichero
		}
	}
else{
	$directorio=dirname($fichero1);
	$ficheroAux=basename($fichero1);
	var_dump($directorio);
	var_dump($ficheroAux);
	echo "El directorio "."$directorio"." NO existe <br>";
	mkdir("$directorio");
	echo "Se ha creado el directorio <br>".$origen;
		if(file_exists($ficheroAux)){
			echo "El fichero "."$ficheroAux"." existe <br>";
		}
		else{
			echo "<br>";
			echo "El fichero "."$ficheroAux"." no existe <br>";
			$aux=fopen("$fichero1","x");
			var_dump($aux);
			fwrite($aux,"$ficheroAux");
			fclose($aux);
		}
}


if(file_exists($fichero2)) {
	echo "El fichero DESTINO ".dirname($fichero2)." EXISTE";
}
else{
	$directorio2=dirname($fichero2);
	$ficheroAux2=basename($fichero2);
	var_dump($directorio2);
	var_dump($ficheroAux2);
	echo "El directorio $directorio2 NO EXISTE <br>";
	mkdir("$directorio2");
	echo "Se ha creado el directorio <br>".$directorio2;
		if(file_exists($ficheroAux2)){
			echo "El fichero $ficheroAux2 EXISTE <br>";
		}
		else{
			echo "<br>";
			echo "El fichero $ficheroAux2 NO EXISTE <br>";
			$aux2=fopen("$fichero2","x");
			var_dump($aux2);
			fwrite($aux2,"$ficheroAux2");
			fclose($aux2);
		}
}


 /*  fileatime () Devuelve la última hora de acceso a un archivo */
 /* filemtime () Devuelve la última hora de modificación de un archivo */
 /*  fstat () Devuelve información sobre un archivo abierto */
 /* lstat () Devuelve información sobre un archivo o enlace simbólico */
 /* pathinfo () Devuelve información sobre la ruta de un archivo */
 /* realpath () Devuelve el nombre de la ruta absoluta */
/* stat () Devuelve información sobre un archivo
 /* filesize() */

?>
