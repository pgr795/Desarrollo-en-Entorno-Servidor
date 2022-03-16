<?php
function combinacionGanadora(){
    $combinacionGanadora=array(); //Array Vacio
    $contador=0;
	
    while($contador != 7){
       
	   $bola=bolas(); //Bola Random
		
        if(!in_array($bola,$combinacionGanadora)){
            $combinacionGanadora[$contador]=$bola;
            $contador++;
		}
		
		else{
            $bola=bolas();
		}
    }   
    $combinacionGanadora[7]=reintegro();
    
    return $combinacionGanadora;
}
function bolas(){
    $bola=rand(1,49);
    return $bola;
}
function reintegro(){
    $reintegro=rand(1,9);
    return $reintegro;
}
function mostrarSelect(){
	try {
		$conexion=conexion();
		$select = $conexion->prepare("SELECT NSORTEO FROM sorteo WHERE activo='S'");	 
		$select->execute();
			
		echo "<select name='idSorteo'>";
		
		foreach($select->fetchAll() as $consulta){
			echo '<option value="'.$consulta["NSORTEO"].'">'.$consulta["NSORTEO"].'</option>';
		}
		
		echo "</select>";
		
		}
		
		catch(PDOException $e){
			echo "Error mostrarSelect"."<br>";
			echo $e->getMessage();
		}
		$conexion=null;
	}
?>