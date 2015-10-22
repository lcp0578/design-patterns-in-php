<?php
/**
 * 		Singleton Class
 */
final class Product
{
	//@var self
	private static $instance;
	//@var mixed
	public $mix;
	/**
	 * Return self instance
	 * @return self
	 */
	public static function getInstance(){
		if(!(self::$instance instanceof self)){
			self::$instance = new self();
		}
		return self::$instance;
	}
	public function __construct(){
	}
	public function __clone(){
	}
}
$firstProduct = Product::getInstance();
$firstProduct->mix = 'first';
var_dump($firstProduct->mix);

$secondProduct = Product::getInstance();
$secondProduct->mix = 'second';
var_dump($firstProduct->mix);
var_dump($secondProduct->mix);