<?php
/**
 * Observer
 */
interface Observer {
	function onChanged($sender, $args);
}
interface Observable {
	function addObserver($observer);
}
class CustomerList implements Observable {
	private $_observers = array();

	public function addCustomer($name){
		foreach ($this->_observers as $obs) {
			$obs->onChanged($this, $name);
		}
	}
	public function addObserver($observer) {
		$this->_observers[] = $observer;
	}
}
class CustomerListLogger implements Observer {
	public function onChanged($sender, $args){
		echo 'Logger:' . $args . ' Customer has been added to the list' . PHP_EOL;
	}
}
class CustomerListUpdate implements Observer {
	public function onChanged($sender, $args){
		echo 'MySQL update: insert ' . $args .' into Customer table ' . PHP_EOL;
		echo '--------------------' . PHP_EOL;
	}
}

$cl = new CustomerList();
$cl->addObserver(new CustomerListLogger());
$cl->addObserver(new CustomerListUpdate());

$cl->addCustomer('Jack');
$cl->addCustomer('Lee');