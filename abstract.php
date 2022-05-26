<?php //abstract.php
/**
 * En las clases abstractas se definen dos tipos de métodos
 * los abstractos (que no contiene lógica definida) y métodos normales
 * heredables con lógica definida, el uso para ese tipo de clase
 * es poder contar con una estructura que contiene parte de métodos
 * que van a ser implementados en la clase hija y al menos un método
 * (abstracto) cuya lógica será definida dentro de cada clase hija.
 *
 * En el momento que se tenga la necesidad de usa unos métodos de una clases
 * pero la lógica de al menos de uno de ellos es propia de la clase, en else {
 * momento estamos hablando de una clase abstracta.
 *
 * Las clases abstractas no se instancian
 */

abstract class Fruit
{
	public function show()
	{
		// uso de reflection, que es una introspectiva de una clase
		echo "<pre>--------------" . PHP_EOL;
		var_dump(new ReflectionClass($this));
		echo "</pre>--------------" . PHP_EOL;
		echo strtolower((new ReflectionClass($this))->getShortName()) . ".png" . PHP_EOL;

	}

	// una clase abstracta debe poseer al menos una método abstracto
	abstract protected public function eat();
}

class Apple extends Fruit
{
	protected public function eat()
	{
		echo "Cortada en trozos..." . PHP_EOL;
	}
}

class Orange extends Fruit
{
	protected public function eat()
	{
		echo "Quitar la concha, cortar y servir" . PHP_EOL;
	}
}

class Banana extends Fruit
{
	protected public function eat()
	{
		echo "Quitar la concha y comer" . PHP_EOL;
	}
}

$fruits = ['Banana', 'Orange', 'Apple'];
$expectFruit = $fruits[rand(0,count($fruits)-1)];

$fruit = new $expectFruit();
echo "---------------------" . PHP_EOL;
$fruit->show(); // Método que se comparte entre todas las frutas
$fruit->eat(); // Método de una fruta pero
echo "---------------------" . PHP_EOL;

