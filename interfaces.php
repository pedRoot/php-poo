<?php //interfaces.php

const BR = PHP_EOL;

// Problem:
// Poseer odesarrollar una estructura con métodos cableados o atados a
// solo otra clase.

// Solo el handshakes no es suficiente, por lo que requerimos algo que regule
// que las clases que intervienen se rigan por un contrato de condiciones
// esto es una interface.

interface PaymentGateway
{
	// quien implemente este contrato debe desarrollar todos los metodos acá
	// descritos
	//
	// En la interfaces se indical cuales son las acciones que ejecutar cada clases
	// pero no qué debe hacer cada acción
	// Por ejemplo para Paypal debería existir un método store qu valida el momento
	// ingresado no sea mayor a la compra.
	// Pero
	// Para Stripe acepta todo lo que se le sea indicado.
	// La implementación depende de cada clase.
	//
	public function charge(int $amount);
}

class PurchasesController
{
	// al momento del desarrollo se cuenta con solo una pasarela de pago
	// pudieramos decir que funciona sin problema alguno esta implementación pero
	// qué pasa si luego se agrega otra pasarela de pago?
	//
	// Una solición sería tomar como parámetro el tipo de pago y pasarlo a store
	// luego hacer una instanciación desde esa clase tomada dinámicamente
	// $paypal = new $methodPay();
	// pero no se leería del todo bien
	//
	// Otra solución sería agregar un case o if
	// pero eso crecería hasta el infinto
	//
	// public function store()
	// {
	// 	$paypal = new Paypal();
	// 	$paypal->charge(100);
	// }

	public function store1_0(Paypal $paypal) // store solo recibe un tipo Paypal
	{
		$paypal->charge(100);
	}

	// Una manera aceptable de resolver es un lo que se conoce como handshakes
	// es un procedimiento más genérico.
	// Pero depende de que los métodos en las clases involucradas sean iguales
	// por ejemplo: Paypal->store(100) // Stripe->store(100)
	// Si cambia alguno (qué es lo más normal y permitido ya no funciona este método)
	//
	public function store2_0($paymentGateway) // carece de fuerte tipeado
	{
		// ...
		$paymentGateway->charge(100); // obligado las pasarelas deben poseer este método
	}

	public function store(PaymentGateway $paymentGateway)
	{
		// ...
		$paymentGateway->charge(100); // la interfaz asegura que exista el metodo charge
	}
}

class Paypal implements PaymentGateway
{
	public function charge(int $amount)
	{
		//...
		echo "Charging {$amount} with paypal." . BR;
	}
}

// Se agrega otra pasarela de pago
// por medio de interfaces se normaliza el buen funcionamiento de este proceso
//
class Stripe implements PaymentGateway
{
	public function charge(int $amount)
	{
		//...
		echo "Charging {$amount} with stripe." . BR;
	}
}

$controller = new PurchasesController();
$controller->store(new Paypal);
$controller->store(new Stripe);

