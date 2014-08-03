<?php 

/**
* Contiene los métodos para convertir un número hexadecimal a
* diferentes bases numéricas.
*/
class Hexadecimal
{

	// Contiene el número hexadecimal a convertir
	private $number;
	
	/**
	* Método constructor. 
	* Almacena un número hexadecimal en la variable $number.
	* @param string $number
	*/
	function __construct($number) {
		$this->number = $number;
	}

	/**
	* Convierte una parte fraccional de un número hexadecimal a decimal.
	* @param float
	* @return int número hexadecimal.
	*/
	public function fractional_hexadecimal($fraccional) {		
		$i = 0;
		$x = 0;
		$y = 1;				
		$frac = 0;
		while ($i <= 10) {
			$i++;
			$tmp = substr($fraccional, $x, 1);
			$tmp2 = $tmp * pow(16, -$y);
			if ($tmp2 == "10") {
				$frac = $frac + "A";
			}			
			if ($tmp2 == "11") {
				$frac = $frac + "B";
			}			
			if ($tmp2 == "12") {
				$frac = $frac + "C";
			}			
			if ($tmp2 == "13") {
				$frac = $frac + "D";
			}			
			if ($tmp2 == "14") {
				$frac = $frac + "E";
			}
			if ($tmp2 == "15") {
				$frac = $frac + "F";
			}			
			$frac = $frac + $tmp2;
			$x++;
			$y++;
		}		
		// Divido el número en dos partes, la entera y la fraccionaria
		// y los ingreso en un array.
		$array = explode(".", "".$frac);		
		return $array[1];
	}

	/**
	* Convierte un número hexadecimal a decimal.
	* @return float un número decimal.
	*/
	public function hexadecimal_decimal() {
		if ( gettype($this->number) == 'integer' ) {
			return hexdec($this->number);
		}
		else {
			// Divido el número en dos partes, la entera y la fraccionaria
			// y los ingreso en un array.
			$array = explode(".", "".$this->number);
			
			// Convierto la parte entera en hexadecimal
			$integer = hexdec($array[0]);

			// Parte fraccional			
			$fractional = $array[1];			

			// Parte fraccional convertida a hexadecimal
			$fractional = $this->fractional_hexadecimal($fractional);

			return "$integer.".$fractional;
		}
	}
	
}

?>