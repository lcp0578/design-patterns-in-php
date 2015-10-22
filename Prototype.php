<?php
/**
 * Prototype
 */
interface Product {
}

class Factory {
	private $_product;

	public function __construct(Product $product){
		$this->_product = $product;
	}
	public function getProduct(){
		return clone $this->_product;
	}
}

class SomeProduct implements Product {
	private $_name;
	public function setName($name){
		$this->_name = $name;
	}
	public function getName(){
		return $this->_name;
	}
}

$prototypeFactory = new Factory(new SomeProduct());

$firstProduct = $prototypeFactory->getProduct();
$firstProduct->setName('first_product');

$secondProduct = $prototypeFactory->getProduct();
$secondProduct->setName('second_product');

var_dump($firstProduct->getName());
var_dump($secondProduct->getName());