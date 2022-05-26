<?php // inheritance.php

class Printer
{
	public function print(string $document)
	{
		echo "printing document: " . $document  . PHP_EOL;
	}

	public function refill()
	{
		if (self::checkTint()) return;
		echo "changing cartuchos..." . PHP_EOL;
	}

	protected function checkTint()
	{
		return true;
	}

}

// DEBE leerse así un ScannerPrinter es un Printer
// un hijo es un o una .... padre (solo una o un padre)
// si la lectura o el concepto no es este entonces
// estamos hablando de composición de objetos.
//
class ScannerPrinter extends Printer
{
	public function scanner(string $photo)
	{
		echo "scanning a photo (" . $photo .")" . PHP_EOL;
	}

	// Sobre escritura de métodos
	//
	public function refill()
	{
		if (parent::checkTint()) return;

		echo "changing tonner..." . PHP_EOL;
	}
}

$lx800 = new Printer();
$hp200 = new ScannerPrinter();

echo "----------------------" .PHP_EOL;
$lx800->print('contrado.doc');
$hp200->scanner('cedula');
$hp200->print('cedula.doc');
$hp200->refill();
echo "----------------------" .PHP_EOL;
