<?php
echo "<b>IBEX35
</b>";echo "<br>";
$Ibex35 = array();

for ($i = 0; $i < 35; $i++){
	$Ibex35[$i]=array("Au$i"=>array(
	"Precio"=>random_int(100, 999),
	"Variacion"=>random_int(100, 999),
	"Var"=>random_int(100, 999),
	"Vol"=>random_int(100, 999),
	"VolEuro"=>random_int(100, 999)

	));
	/* $Ibex35[$i]=array( array(
	"Precio"=>random_int(100, 999),
	"Variacion"=>random_int(100, 999),
	"Var"=>random_int(100, 999),
	"Vol"=>random_int(100, 999),
	"VolEuro"=>random_int(100, 999)
	)); */
}
		
/* var_dump($ibex35); */
var_dump($Ibex35);

?>