<?php
/**
 * Chain of Command
 *also named: Chain Of Responsibility
 */
interface Command {
	public function onCommand($name, $args);
}

class CommandChain {
	private $_commands = array();

	public function addCommand($cmd){
		$this->_commands[] = $cmd;
	}

	public function runCommand($name, $args){
		foreach ($this->_commands as $cmd) {
			if($cmd->onCommand($name, $args)){
				return ; 
			}
		}
	}
}

class CustCommand implements Command {
	public function onCommand($name, $args){
		if($name !== 'addCustomer'){
			return false;
		}else{
			echo 'This is Customer Command handling "addCustomer"' . PHP_EOL;
			echo 'The args:' . $args . PHP_EOL;
			return true;
		}
	}
}

class MailCommand implements Command {
	public function onCommand($name, $args){
		if($name !== 'sendMail'){
			return false;
		}else{
			echo 'This is Mail Command handling "sendMail"' . PHP_EOL;
			echo 'The args:' . $args . PHP_EOL;
			return true;
		}
	}
}

$chain = new CommandChain();
$chain->addCommand(new CustCommand());
$chain->addCommand(new MailCommand());
$chain->runCommand('addCustomer', 'lcpeng');
$chain->runCommand('sendMail', 'lcp0578@gmail.com');