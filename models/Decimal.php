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
			$fractional = $array[1];



			return $integer;

		}
	}

}

$numero = new Decimal(3.9023);
echo $numero->decimal_binary()

?>