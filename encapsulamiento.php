<?php //encapsulamiento.php

const BR = PHP_EOL;

// public, protected private son la base para un buen manejo del
// encapsulamiento en una clase.
// Lo que se busca en realidad es controlar quién tiene acceso a las propiedades o métodos
//
class Bank
{
	protected int $balance = 0;

	// Quién instancie la clase puede depositar
	//
	public function deposit(int $amount)
	{
		$this->balance += $amount;
		return $this->printBalance();
	}

	// Quién instancie la clase puede depositar
	//
	public function withdraw(int $amount)
	{
		if ($this->cantWithDraw($amount)){
			$this->balance -= $amount;
			return $this->printBalance();
		}
		return $this->printMessage("Saldo insuficiente...!!");
	}

	// Método de consumo interno
	//
	private function printMessage(string $message)
	{
		echo $message . BR;
	}

	// método de consumo interno
	//
	private function printBalance()
	{
		$this->printMessage("Su actualizado y disponible es: {$this->balance}");
	}

	// método de consumo interno
	//
	private function cantWithDraw(int $amount) : bool
	{
		return $this->balance >= $amount;
	}
}

$myBank = new Bank();
echo $myBank->deposit(100);
echo $myBank->withdraw(200);
echo $myBank->withdraw(50);

echo "-------------" . BR;

// echo $myBank->cantWithDraw(50); // error !!!
// echo $myBank->balance; // error !!!
// echo $myBank->printMessage(); // error !!!
