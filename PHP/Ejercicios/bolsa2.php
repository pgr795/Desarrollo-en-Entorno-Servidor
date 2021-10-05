<?php
echo "<b>IBEX35
</b>";echo "<br>";
/* $ibex35=array(
	"Acciona"=>array("Precio"=>31,"Variacion"=>"-0.06%","Var"=>"0.02€","Vol"=>478.240,"VolEuro"=>15.115
	),
	"ACERINOX"=>array("Precio"=>31,"Variacion"=>"-0.06%","Var"=>"0.02€","Vol"=>478.240,"VolEuro"=>15.115
	),
	"ACS"=>array("Precio"=>31,"Variacion"=>"-0.06%","Var"=>"0.02€","Vol"=>478.240,"VolEuro"=>15.115
	),
	"AENA"=>array("Precio"=>31,"Variacion"=>"-0.06%","Var"=>"0.02€","Vol"=>478.240,"VolEuro"=>15.115
	),
	"ACS"=>array("Precio"=>31,"Variacion"=>"-0.06%","Var"=>"0.02€","Vol"=>478.240,"VolEuro"=>15.115
	),
	"ALMIRALL"=>array("Precio"=>31,"Variacion"=>"-0.06%","Var"=>"0.02€","Vol"=>478.240,"VolEuro"=>15.115
	),
	"A"=>array("Precio"=>31,"Variacion"=>"-0.06%","Var"=>"0.02€","Vol"=>478.240,"VolEuro"=>15.115
	),
	"AM"=>array("Precio"=>31,"Variacion"=>"-0.06%","Var"=>"0.02€","Vol"=>478.240,"VolEuro"=>15.115
	),
	"AMA"=>array("Precio"=>31,"Variacion"=>"-0.06%","Var"=>"0.02€","Vol"=>478.240,"VolEuro"=>15.115
	),
	"AMAD"=>array("Precio"=>31,"Variacion"=>"-0.06%","Var"=>"0.02€","Vol"=>478.240,"VolEuro"=>15.115
	),
	"AMADE"=>array("Precio"=>31,"Variacion"=>"-0.06%","Var"=>"0.02€","Vol"=>478.240,"VolEuro"=>15.115
	),
	"AMADEU"=>array("Precio"=>31,"Variacion"=>"-0.06%","Var"=>"0.02€","Vol"=>478.240,"VolEuro"=>15.115
	),
	"S"=>array("Precio"=>31,"Variacion"=>"-0.06%","Var"=>"0.02€","Vol"=>478.240,"VolEuro"=>15.115
	),
	"US"=>array("Precio"=>31,"Variacion"=>"-0.06%","Var"=>"0.02€","Vol"=>478.240,"VolEuro"=>15.115
	),
	"EUS"=>array("Precio"=>31,"Variacion"=>"-0.06%","Var"=>"0.02€","Vol"=>478.240,"VolEuro"=>15.115
	),
	"DEUS"=>array("Precio"=>31,"Variacion"=>"-0.06%","Var"=>"0.02€","Vol"=>478.240,"VolEuro"=>15.115
	),
	"ADEUS"=>array("Precio"=>31,"Variacion"=>"-0.06%","Var"=>"0.02€","Vol"=>478.240,"VolEuro"=>15.115
	),
	"MADEUS"=>array("Precio"=>31,"Variacion"=>"-0.06%","Var"=>"0.02€","Vol"=>478.240,"VolEuro"=>15.115
	),
	"AMDEUS"=>array("Precio"=>31,"Variacion"=>"-0.06%","Var"=>"0.02€","Vol"=>478.240,"VolEuro"=>15.115
	),
	"AMAEUS"=>array("Precio"=>31,"Variacion"=>"-0.06%","Var"=>"0.02€","Vol"=>478.240,"VolEuro"=>15.115
	),
	"AMAUS"=>array("Precio"=>31,"Variacion"=>"-0.06%","Var"=>"0.02€","Vol"=>478.240,"VolEuro"=>15.115
	),
	"AADEUS"=>array("Precio"=>31,"Variacion"=>"-0.06%","Var"=>"0.02€","Vol"=>478.240,"VolEuro"=>15.115
	),
	"AMADUS"=>array("Precio"=>31,"Variacion"=>"-0.06%","Var"=>"0.02€","Vol"=>478.240,"VolEuro"=>15.115
	),
	"EUS"=>array("Precio"=>31,"Variacion"=>"-0.06%","Var"=>"0.02€","Vol"=>478.240,"VolEuro"=>15.115
	),
	"DUS"=>array("Precio"=>31,"Variacion"=>"-0.06%","Var"=>"0.02€","Vol"=>478.240,"VolEuro"=>15.115
	),
	"AUS"=>array("Precio"=>31,"Variacion"=>"-0.06%","Var"=>"0.02€","Vol"=>478.240,"VolEuro"=>15.115
	),
	"MUS"=>array("Precio"=>31,"Variacion"=>"-0.06%","Var"=>"0.02€","Vol"=>478.240,"VolEuro"=>15.115
	),
	"AEUS"=>array("Precio"=>31,"Variacion"=>"-0.06%","Var"=>"0.02€","Vol"=>478.240,"VolEuro"=>15.115
	),
	"AMUS"=>array("Precio"=>31,"Variacion"=>"-0.06%","Var"=>"0.02€","Vol"=>478.240,"VolEuro"=>15.115
	),
	"AUS"=>array("Precio"=>31,"Variacion"=>"-0.06%","Var"=>"0.02€","Vol"=>478.240,"VolEuro"=>15.115
	),
	"AAUS"=>array("Precio"=>31,"Variacion"=>"-0.06%","Var"=>"0.02€","Vol"=>478.240,"VolEuro"=>15.115
	),
	"AUS"=>array("Precio"=>31,"Variacion"=>"-0.06%","Var"=>"0.02€","Vol"=>478.240,"VolEuro"=>15.115
	),
	); */

$Ibex35 = array();

for ($i = 0; $i < 35; $i++){
	$nombre="Aus$i";
	$Ibex35[$nombre]= array(
	"Precio"=>random_int(100, 999),
	"Variacion"=>random_int(100, 999),
	"Var"=>random_int(100, 999),
	"Vol"=>random_int(100, 999),
	"VolEuro"=>random_int(100, 999)
	);
}
		
/* var_dump($ibex35); */
var_dump($Ibex35);

?>