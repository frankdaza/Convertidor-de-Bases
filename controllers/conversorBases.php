<?php 

require "../models/Validator.php";

// Obtengo los valores del formulario conversor de bases y elimino los espacios en blanco.
$decimal = str_replace(" ", "", $_POST["decimal"]);
$binary = str_replace(" ", "", $_POST["binary"]);
$octal = str_replace(" ", "", $_POST["octal"]);
$hexadecimal = strtoupper( str_replace(" ", "", $_POST["hexadecimal"]) );

echo "Decimal: $decimal <br>";
echo "Binario: $binary <br>";
echo "Octal: $octal <br>";
echo "Hexadecimal: $hexadecimal <br>";

$numeroValidado = new Validator($decimal);

if ($numeroValidado->validator_decimal()) {
	echo "$decimal Si es un número decimal.";
}
else {
	echo "$decimal No es un número decimal.";
}
?>