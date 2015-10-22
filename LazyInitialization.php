<?php
/**
 * Lazy Initialization
 */
interface Product {
	public function getName();
}

class Factory {
	protected $firstProduct;
	protected $secondProduct;

	public function getFirstProduct(){
		if(!$this->firstProduct){
			$this->firstProduct = new FirstProduct();
		}
		return $this->firstProduct;
	}

	public function getSecondProduct(){
		if(!$this->secondProduct){
			$this->secondProduct = new SecondProduct();
		}
		return $this->secondProduct;
	}
}

class FirstProduct implements Product {
	public function getName(){
		return 'The first Product';
	}
}

class SecondProduct implements Product {
	public function getName(){
		return 'The second Product';
	}
}


$factory = new Factory();

var_dump($factory->getFirstProduct()->getName());
var_dump($factory->getSecondProduct()->getName());