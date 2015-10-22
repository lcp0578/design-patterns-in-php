<?php
/**
 * Decorator
 */
class HtmlTemplate
{
	//any parent methods
}
class Template1 extends HtmlTemplate
{
	protected $_html;

	public function __construct(){
		$this->_html = "<p>__text__</p>";
	}

	public function set($html){
		$this->_html = $html;
	}

	public function render(){
		echo $this->_html .PHP_EOL;
	}
}

class Template2 extends HtmlTemplate
{
	protected $_element;
	protected $_html;

	public function __construct($ele, $html){
		$this->_element = $ele;
		$this->_html = $html;
		$this->set('<h2>' . $this->_html . '</h2>');
	}

	public function __call($name, $args){
		$param = implode(',', $args);
		$this->_element->$name($param);
	}
}

class Template3 extends HtmlTemplate
{
	protected $_element;

	public function __construct($ele, $html){
		$this->_element = $ele;
		$this->_html = $html;
		$this->set('<ul>' . $this->_html . '</ul>');
	}

	public function __call($name, $args){
		$param = implode(',', $args);
		$this->_element->$name($param);
	}
}

$tpl1 = new Template1();
$tpl1->render();
$tpl1->set('Hello Decorator!');
$tpl1->render();

$tpl2 = new Template2($tpl1, 'Hello TPL 2');
$tpl2->render();
$tpl2->set('Hello TPL 2 agian');
$tpl2->render();

$tpl2 = new Template3($tpl1, 'Hello TPL 3');
$tpl2->render();
$tpl2->set('Hello TPL 3 agian');
$tpl2->render();