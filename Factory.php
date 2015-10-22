<?php
/**
 * Factory
 */
interface Factory{
	public function getProduct();
}
interface Product{
	public function getName();
}
class FirstFactory implements Factory{
	public function getProduct(){
		return new FirstProduct();
	}
}

class SecondFactory implements Factory{
	public function getProduct(){
		return new SecondProduct();
	}
}

class FirstProduct implements Product{
	public function getName(){
		return 'The first product!';
	}
}

class SecondProduct implements Product{
	public function getName(){
		return 'The second product';
	}
}

$firstFactory = new FirstFactory();
$firstProduct = $firstFactory->getProduct();

$secondFactory = new SecondFactory();
$secondProduct = $secondFactory->getProduct();

var_dump($firstProduct->getName());
var_dump($secondProduct->getName());