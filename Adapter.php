<?php
/**
 * 	Adpater
 */
class SimpleBook {
	private $_author;
	private $_title;

	public function __construct($author, $title){
		$this->_author = $author;
		$this->_title  = $title;
	}

	public function getAuthor(){
		return $this->_author;
	}

	public function getTitle(){
		return $this->_title;
	}
}
class BookAdpater {
	private $_book;

	public function __construct( SimpleBook $book){
		$this->_book = $book;
	}

	public function getAuthorAndTitle(){
		return 'Author: ' . $this->_book->getAuthor() . 
		' , Title: ' . $this->_book->getTitle();
	}
}

//Usage
$book = new SimpleBook("Gamma, Helm, Johnson etc", "Design Patterns");

$bookAdpater = new BookAdpater($book);

echo $bookAdpater->getAuthorAndTitle() . PHP_EOL;