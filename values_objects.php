<?php // values_objects.php

const BR = PHP_EOL;

// Martin Fowler define los objetos de valor ( VO ) u objetos de valor
// de la siguiente manera: un objeto pequeño y simple, como el money
// o un rango de fechas, cuya igualdad no se basa en la identidad.
//
// DEBE cumplir con:
// Inmutabilidad:
// Un objeto no puede ser cambiado por nadie. Una vez creado, solo se
// puede clonar, por lo que la lógica que creó el objeto confía en que
// los datos nunca se alterarán. Esto agrega durabilidad adicional al
// sistema por diseño.
//
// Validacion incorporada:
// Un objeto contiene validadores integrados que imponen su formato interno.
// Digamos, una dirección debe tener una ciudad, un código postal y una
// dirección postal.
//
// Cada vez que crea una instancia de un nuevo objeto de dirección, debe
// proporcionarle datos válidos; de lo contrario, la creación de instancia
// del objeto falla.
//

final class Money
{
    private string $valor;

    private string $currency;

    public function __construct(int $value, string $currency = 'USD')
		{
      $this->value = $value;
			$this->currency = $currency	;
    }

    public function equals(Money $money): bool
    {
        return $this->value === $money->value
            && $this->currency === $money->currency;
    }

    public function getValue(): int
    {
        return $this->value;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }
}

echo "------- Igualdad por valor ----------" . BR;
$primerPago1 = new Money(1000);
$primerPago2 = new Money(1000);
var_dump($primerPago1->equals($primerPago2));
echo "------------------------------" . BR;


class Person
{
	private int $id;
	private string $name;

	public function __construct(string $name)
	{
			$this->name = $name;
	}

	public function equals(Person $person): bool
	{
		return $this === $person;
	}

	public function getId()
	{
		return $this->id;
	}

	public function getName()
	{
		return $this->name;
	}
}

echo "------- Igualdad por entidad ---------" . BR;
$person1 = new Person('Pedro');
$person2 = new Person('Pedro');
var_dump($person1->equals($person2));
echo "------------------------------" . BR;
