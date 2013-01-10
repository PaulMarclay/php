<?php
	/*
	*	PHP version 1.0
	*
	*	Imagina - Plugin.
	*
	*
	*	Copyright (c) 2012 Dolem Labs
	*
	*	Authors:	Paul Marclay (paul.eduardo.marclay@gmail.com)
	*
	*/

	class Php_Globals_Post extends Php_Globals_Primitive {
		
		protected $_allowAddItem 	= false;
		protected $_allowUnsetItem 	= false;
		
		public function __construct() {
			if (!isset($_POST)) return;
			$this->_data = array();
			foreach ($_POST as $key => $data) {
				$this->setData($this->_underscore(strtolower($key)), $data);
			}
		}
		
		protected function unsetData($key=null) {
	        if (is_null($key)) {
	            $_POST = array();
	        } else {
	        	if (isset($_POST[$key])) {
	            	unset($_POST[$key]);
	        	}
	        }
	        return $this;
	    }
	    
	    protected function getData($key = '') {
	    	return isset($_POST[$key]) ? $_POST[$key] : null;
	    }
	    
	    protected function setData($key, $value=null)
	    {
	    	$_POST[$key] = $value;
	    	$this->_data[$key] = $value;
            	
	        return $this;
	    }
	    
		public function is_set($key) {
	    	return isset($_POST[$key]);
	    }
	    
	    public function clear() {
	    	$_POST = array();
	    	$this->_data = array();
	    }
		
	}
