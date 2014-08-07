<?php 

require "../models/Validator.php";
require "../models/Hexadecimal.php";

// Obtengo los valores del formulario conversor de bases y elimino los espacios en blanco.
$hexadecimal = strtoupper(str_replace(" ", "", $_GET["hexadecimal"]));

$numeroValidado = new Validator($hexadecimal);

if (strlen($hexadecimal) > 0) {
	if ($numeroValidado->validator_hexadecimal()) {		
		$number = new Hexadecimal($hexadecimal);		
		
		$decimal = $number->hexadecimal_decimal();		
		
		echo $decimal;
		
	}
	else {
		echo "¡Número hexadecimal no válido!";
	}
}


?>