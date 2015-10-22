<?php
/**
 * @name 	Builder
 * @author 	lcp0578@gmail.com
 */
class Product {
	private $_name;

	public function setName($name){
		$this->_name = $name;
	}

	public function getName(){
		return $this->_name;
	}
}

abstract class Builder {
	protected $product;

	final public function getProduct(){
		return $this->product;
	}

	public function buildProduct(){
		$this->product = new Product();
	}
}

class FirstBuilder extends Builder {
	public function buildProduct(){
		parent::buildProduct();
		$this->product->setName('The product of the first builder');
	}
}

class SecondBuilder extends Builder {
	public function buildProduct(){
		parent::buildProduct();
		$this->product->setName('The product of the second builder');
	}
}

class Factory {
	private $_builder;

	public function __construct(Builder $builder){
		$this->_builder = $builder;
		$this->_builder->buildProduct();
	}

	public function getProduct(){
		return $this->_builder->getProduct();
	}
}

$firstDirector = new Factory(new FirstBuilder());
$secondDirector = new Factory(new SecondBuilder());

var_dump($firstDirector->getProduct()->getName());
var_dump($secondDirector->getProduct()->getName());