<?php
/**
 * Abstract Factory
 */
class Config {
	public static $factory = 1;
}
interface Product {
	public function getName();
}
abstract class AbstractFactory {
	public static function getFactory(){
		switch(Config::$factory){
			case 1:
				return new FirstFactory();
				break;
			case 2:
				return new SecondFactory();
				break;
		}
		throw new Exception('Bad Config');
	}

	abstract public function getProduct();
}
class FirstFactory extends AbstractFactory {
	public function getProduct(){
		return new FirstProduct();
	}
}

class FirstProduct implements Product {
	public function getName(){
		return 'The product form the first factory ';
	}
}

class SecondFactory extends AbstractFactory {
	public function getProduct() {
		return new SecondProduct();
	}
}

class SecondProduct implements Product {
	public function getName(){
		return 'The product form the second factory ';
	}
}

$firstProduct = AbstractFactory::getFactory()->getProduct();
Config::$factory = 2;
$secondProduct = AbstractFactory::getFactory()->getProduct();

var_dump($firstProduct->getName());
var_dump($secondProduct->getName());