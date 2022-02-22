<?php
	require_once("../db/modificar_salario_db.php");
	function modificarSalarioEmpleado($idEmpleado,$salario){
		modificarSalaries($idEmpleado,$salario);
	}
?>
