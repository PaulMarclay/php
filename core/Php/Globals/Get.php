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

	class Php_Globals_Get extends Php_Globals_Primitive {
		
		protected $_allowAddItem 	= false;
		protected $_allowUnsetItem 	= false;
		
		public function __construct() {
			if (!isset($_GET)) return;
			$this->_data = array();
			foreach ($_GET as $key => $data) {
				$this->setData($this->_underscore(strtolower($key)), $data);
			}
		}
		
		protected function unsetData($key=null) {
	        if (is_null($key)) {
	            $_GET = array();
	        } else {
	        	if (isset($_GET[$key])) {
	            	unset($_GET[$key]);
	        	}
	        }
	        return $this;
	    }
	    
	    protected function getData($key = '') {
	    	return isset($_GET[$key]) ? $_GET[$key] : null;
	    }
	    
	    protected function setData($key, $value=null)
	    {
	    	$_GET[$key] = $value;
	    	$this->_data[$key] = $value;
            	
	        return $this;
	    }
	    
		public function is_set($key) {
	    	return isset($_GET[$key]);
	    }
	    
	    public function clear() {
	    	$_GET = array();
	    	$this->_data = array();
	    }
		
	}
