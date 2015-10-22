<?php
/**
 *  Strategy
 */
interface OutputInterface
{
	public static function load($array);
}
/**
 * Serialize
 */
class SerializedArrayOutput implements OutputInterface
{
	public static function load($array){
		return serialize($array);
	}
}
/**
 * Json String
 */
class JsonStringArrayOutput implements OutputInterface
{
	public static function load($array){
		return json_encode($array);
	}
}

$arr = array('a' => 'A', 'b' => 'B', array(1, 2, 3));
var_dump(SerializedArrayOutput::load($arr));
var_dump(JsonStringArrayOutput::load($arr));