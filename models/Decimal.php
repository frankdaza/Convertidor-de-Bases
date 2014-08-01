<?php 

/**
* Contiene los métodos para convertir un nùmero decimal a
* diferentes bases numéricas.
*/
class Decimal
{

	// Contiene el número decimal a convertir
	private $number;
	
	/**
	* Método constructor. 
	* Almacena un número decimal en la variable $number.
	* @param int|float $number
	*/
	function __construct($number) {
		$this->number = $number;
	}

	/**
	* Convierte una parte fraccional de un número entero a binario.
	* @param float
	* @return int número binario.
	*/
	public function fractional_binary($fraccional) {
		$i = 0;
		$tmp = $fraccional;
		$frac = "";
		while ($i <= 20) {
			$i++;
			$tmp = 2 * $tmp;	
			$array = explode(".", "".$tmp);			
			$frac = $frac.$array[0];			
			$tmp = $tmp - $array[0];
		}
		
		return $frac;
	}

	/**
	* Convierte un número decimal a binario.
	* @return float un número binario.
	*/
	public function decimal_binary() {
		if ( gettype($this->number) == 'integer' ) {
			return decbin($this->number);
		}
		else {
			// Divido el número en dos partes, la entera y la fraccionarioa
			// y los ingreso en un array.
			$array = explode(".", "".$this->number);
			
			// Convierto la parte entera en binario
			$integer = decbin($array[0]);

			// Parte fraccional
			$fractional = $this->number - $array[0];			

			// Parte fraccional convertida a binario
			$fractional = $this->fractional_binary($fractional);

			return "$integer".$fractional;
		}
	}

}

$numero = new Decimal(8.5);
echo $numero->decimal_binary()

?>