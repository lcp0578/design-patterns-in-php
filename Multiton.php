<?php
/**
 * Multiton,Abstract Factory Class
 */
error_reporting(~E_NOTICE);
abstract class FactoryAbstract
{
	protected static $instances = array();

	public static function getInstance(){
		$className = static::getClassName();
		if(!(self::$instances[$className] instanceof $className)){
			self::$instances[$className] = new $className();
		}
		return self::$instances[$className];
	}
	public static function removeInstance(){
		$className = static::getClassName();
		if(array_key_exists($className, self::$instances)){
			unset(self::$instances[$className]);
		}
	}
	public static function getInstanceList(){
		return self::$instances;
	}
	final protected static function getClassName(){
		return get_called_class();
	}
	protected function __construct(){}

	final protected function __clone(){}
}
/**
 * Factory Class
 */
abstract class Factory extends FactoryAbstract
{
	final public static function getInstance(){
		return parent::getInstance();
	}

	final public static function removeInstance(){
		parent::removeInstance();
	}
}

//using 
class FirstProduct extends Factory
{
	public $keys = [];
}

class SecondProduct extends FirstProduct
{
}

FirstProduct::getInstance()	->keys[] = 1;
SecondProduct::getInstance()->keys[] = 2;
FirstProduct::getInstance()	->keys[] = 3;
SecondProduct::getInstance()->keys[] = 4;
FirstProduct::getInstance()	->keys[] = 5;

var_dump(FirstProduct::getInstance()->keys);
var_dump(SecondProduct::getInstance()->keys);
var_dump(FactoryAbstract::getInstanceList());

FirstProduct::removeInstance();
var_dump(FactoryAbstract::getInstanceList());

var_dump(FirstProduct::getInstance()->keys);
var_dump(SecondProduct::getInstance()->keys);
var_dump(FactoryAbstract::getInstanceList());
