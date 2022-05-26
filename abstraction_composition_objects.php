<?php //abstraction_composition_objects.php

const BR = PHP_EOL;

// La composición de objetos es crear un objecto con información
// complementaria desde otras clases
//
class Sale
{
	// acá se aplica la abstracción del objeto que pudiera ser paypal, stripe ..etc
	private PaymentGateway $paymentGateway;

	public function __construct(PaymentGateway $paymentGateway)
	{
		// Acá se aplica la composición de objetos puesto que al objeto Sale se le
		// está agregando atributos y métodos de la pasarela de pago (paypoal o stripe)
		//
		$this->paymentGateway = $paymentGateway;
	}

	public function create()
	{
		# code...
	}

	public function cancel(Type $var = null)
	{
		$this->paymentGateway->getCustomer();
		$this->paymentGateway->getCustomerTransaction();
	}

	public function invoise(Type $var = null)
	{
		# code...
	}
}

// La interfaz garantiza que las clases que se vayan a usar en Sales
// posean los mismos métodos
//
interface PaymentGateway
{
	public function getCustomer();
	public function getCustomerTransaction();
}

class Stripe implements PaymentGateway
{
	public function getCustomer()
	{
	}

	public function getCustomerTransaction()
	{
	}
}

class Paypal implements PaymentGateway
{
	public function getCustomer()
	{
	}

	public function getCustomerTransaction()
	{
	}
}

echo "------------------------" . BR;
$paypal = new Sale(new Paypal());
var_dump($paypal);

// object(Sale)#1 (1) { ----> Objecto 1 Sale
//   ["paymentGateway":"Sale":private]=>
//   object(Paypal)#2 (0) { -----> Objecto 2 Paypal
//   }
// }

echo "------------------------" . BR;
$stripe = new Sale(new Stripe());
var_dump($stripe);

