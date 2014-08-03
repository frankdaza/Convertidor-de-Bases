<?php 

/**
* Contiene los métodos para convertir un número binario a
* diferentes bases numéricas.
*/
class Binary
{
	
	// Contiene el número binario a convertir
	private $number;
	
	/**
	* Método constructor. 
	* Almacena un número binario en la variable $number.
	* @param string $number
	*/
	function __construct($number) {
		$this->number = $number;
	}

	/**
	* Convierte una parte fraccional de un número binario a decimal.
	* @param float
	* @return int número binario.
	*/
	public function fractional_binary($fraccional) {		
		$i = 0;
		$x = 0;
		$y = 1;				
		$frac = 0;
		while ($i <= 10) {
			$i++;
			$tmp = substr($fraccional, $x, 1);			
			$frac = $frac + $tmp * pow(2, -$y);				
			$x++;
			$y++;
		}		
		// Divido el número en dos partes, la entera y la fraccionaria
		// y los ingreso en un array.
		$array = explode(".", "".$frac);		
		return $array[1];
	}

	/**
	* Convierte un número binario a decimal.
	* @return float un número decimal.
	*/
	public function binary_decimal() {
		if ( gettype($this->number) == 'integer' ) {
			return bindec($this->number);
		}
		else {
			// Divido el número en dos partes, la entera y la fraccionaria
			// y los ingreso en un array.
			$array = explode(".", "".$this->number);
			
			// Convierto la parte entera en binario
			$integer = bindec($array[0]);

			// Parte fraccional			
			$fractional = $array[1];

			// Parte fraccional convertida a octal
			$fractional = $this->fractional_binary($fractional);

			return "$integer.".$fractional;
		}	
	}

}

?>