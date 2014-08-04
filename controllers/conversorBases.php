<?php 

session_start();

require "../models/Validator.php";
require "../models/Decimal.php";
require "../models/Binary.php";
require "../models/Octal.php";
require "../models/Hexadecimal.php";

// Obtengo los valores del formulario conversor de bases y elimino los espacios en blanco.
$decimal = str_replace(" ", "", $_POST["decimal"]);
$binary = str_replace(" ", "", $_POST["binary"]);
$octal = str_replace(" ", "", $_POST["octal"]);
$hexadecimal = strtoupper( str_replace(" ", "", $_POST["hexadecimal"]) );

$numeroValidado = new Validator($decimal);

if (strlen($decimal) > 0) {
	if ($numeroValidado->validator_decimal()) {
		$number = new Decimal($decimal);

		$_SESSION["decimal"] = $decimal;
		$_SESSION["binary"] = $number->decimal_binary();
		$_SESSION["octal"] = $number->decimal_octal();
		$_SESSION["hexadecimal"] = $number->decimal_hexadecimal();

		header("Location: ../software.php");
		break;
	}
	else {
		$_SESSION["errorDecimal"] = true;
		header("Location: ../software.php");
	}
}

if (strlen($binary) > 0) {
	$numeroValidado = new Validator($binary);

	if ($numeroValidado->validator_binary()) {
		$number1 = new Binary($binary);
		$tmp = $number1->binary_decimal();
		$number = new Decimal($tmp);

		$_SESSION["decimal"] = $tmp;
		$_SESSION["binary"] = $number->decimal_binary();
		$_SESSION["octal"] = $number->decimal_octal();
		$_SESSION["hexadecimal"] = $number->decimal_hexadecimal();	

		header("Location: ../software.php");
	}
	else {
		$_SESSION["errorBinary"] = true;
		header("Location: ../software.php");
	}
}

if (strlen($octal) > 0) {
	$numeroValidado = new Validator($octal);

	if ($numeroValidado->validator_octal()) {
		$number1 = new Octal($octal);
		$tmp = $number1->octal_decimal();
		$number = new Decimal($tmp);

		$_SESSION["decimal"] = $tmp;
		$_SESSION["binary"] = $number->decimal_binary();		
		$_SESSION["octal"] = $number->decimal_octal();
		$_SESSION["hexadecimal"] = $number->decimal_hexadecimal();	
		
		header("Location: ../software.php");
	}
	else {
		$_SESSION["errorOctal"] = true;
		header("Location: ../software.php");
	}
}

if (strlen($hexadecimal) > 0) {
	$numeroValidado = new Validator($hexadecimal);

	if ($numeroValidado->validator_hexadecimal()) {
		$number1 = new Hexadecimal($hexadecimal);
		$tmp = $number1->hexadecimal_decimal();
		$number = new Decimal($tmp);

		$_SESSION["decimal"] = $tmp;
		$_SESSION["binary"] = $number->decimal_binary();		
		$_SESSION["octal"] = $number->decimal_octal();
		$_SESSION["hexadecimal"] = $number->decimal_hexadecimal();	
		
		header("Location: ../software.php");
	}
	else {
		$_SESSION["errorHexadecimal"] = true;
		header("Location: ../software.php");
	}
}


?>