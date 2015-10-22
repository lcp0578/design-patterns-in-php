<?php
/**
 * Registry
 */
class Package
{
	protected static $data = array();

	public static function set($key, $value){
		self::$data[$key] = $value;
	}

	public static function get($key){
		return isset(self::$data[$key]) ? self::$data[$key] :null;
	}

	public static function removeObject($key){
		if(array_key_exists($key, self::$data)){
			unset(self::$data[$key]);
		}
	}
}

Package::set('ACL', 'Assess Control List');
Package::set('DISP', 'Dispatcher');

var_dump(Package::get('ACL'));
var_dump(Package::get('DISP'));

Package::removeObject('ACL');
var_dump(Package::get('ACL'));
