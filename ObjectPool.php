<?php
/**
 * Object Pool
 */
class Product {
	protected $id;
	protected $name;

	public function __construct($id, $name){
		$this->id = $id;
		$this->name = $name;
	}

	public function getId(){
		return $this->id;
	}

	public function getName(){
		return $this->name;
	}
}

class Factory {
	protected static $products = array();

	public static function pushProduct(Product $product){
		self::$products[$product->getId()] = $product;
	}

	public static function getProduct($id){
		return isset(self::$products[$id]) ? self::$products[$id] : null;
	}

	public static function removeProduct($id){
		if(array_key_exists($id, self::$products)){
			unset(self::$products[$id]);
		}
	}
}

Factory::pushProduct(new Product('first', 'first_product'));
Factory::pushProduct(new Product('second', 'second_product'));

var_dump(Factory::getProduct('first')->getName());
var_dump(Factory::getProduct('second')->getName());
var_dump(Factory::getProduct('second'));

Factory::removeProduct('second');
var_dump(Factory::getProduct('second'));