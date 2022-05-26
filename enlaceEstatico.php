<?php // enlaceEstatico.php
class Enginer
{
	public static function who()
	{
		echo __CLASS__ . PHP_EOL;
	}

	public static function callWithSelf()
	{
		// self::
		// Hace referencia en tiempo de ejecución
		// a la clase a la que pertenece la función invocada.
		//
		self::who();
	}

	public static function callWithStatic()
	{
		// static::
		// Hace referencia a la clase desde que se invocó la función
		// Notose que esta función pertenece a Enginer
		// pero ejecutará el método definido en Civil.
		//
		static::who();
	}
}

class Civil extends Enginer
{
	public static function who()
	{
		echo __CLASS__ . PHP_EOL;
	}
}

Civil::who(); // echo --> Civil
Civil::callWithSelf(); // echo --> Enginer
Civil::callWithStatic(); // echo --> Civil

//********************** */
abstract class A
{
	static function create()
	{
		return new static();
	}
}

class B extends A
{
	public function __(Type $var = null)
	{
		# code...
	}
}


echo "----------------" . PHP_EOL;
var_dump(B::create()); // crea un objecto B con una funcion desde A
// var_dump(A::create()); // Genera error poque A es abstracta
echo "----------------" . PHP_EOL;

//********************** */

class Automovil
{
	public static function index()
	{

		echo "Quién es el static en Automovil?" . PHP_EOL;
		var_dump(new static());
	}
}

class Sedan extends Automovil
{
	public static function index()
	{
		echo "Quién es el self?" . PHP_EOL;
		var_dump(new self());

		echo "Quién es el parent?" . PHP_EOL;
		var_dump(new parent());

		echo "Quién es el static?" . PHP_EOL;
		var_dump(new static());
	}
}

class Corsa extends Sedan
{}

echo "SELF PARENT STATIC ----------------" . PHP_EOL;
Corsa::index();
Automovil::index();
echo "----------------" . PHP_EOL;

//********************** */

class Drink
{
	public static array $typeDrink = ['Jugo', 'Merengada', 'Ron'];

	public static function description()
	{
		return static::$description;
	}
}

class Ron extends Drink
{
	public static string $description = __CLASS__ . ': '. 'Licor a base de caña de azúcar';
}

class Merengada extends Drink
{
	public static string $description = __CLASS__ . ': '. 'Jugo de frutas con leche';
}

class Jugo extends Drink
{
	public static string $description = __CLASS__ . ': '. 'Jugo de fruta';
}

echo "----------------" . PHP_EOL;

$drinkRamdon = Drink::$typeDrink[rand(0,2)];
echo $drinkRamdon::description() . PHP_EOL;

//echo $drink->description();
echo "----------------" . PHP_EOL;

