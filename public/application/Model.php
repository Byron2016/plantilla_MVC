<?php 

class Model
{
	private $_registry;
    protected $_db;
    
    public function __construct() 
    {
    	$this->_registry = Registry::getInstancia(); //22
		$this->_db = $this->_registry->_db; //22
        //$this->_db = new Database(); //22
        
    }
}
