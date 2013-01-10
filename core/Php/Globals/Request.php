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

	class Php_Globals_Request extends Php_Globals_Primitive {
		
		protected $_allowAddItem 	= false;
		protected $_allowUnsetItem 	= false;
		
		public function __construct() {
			if (!isset($_REQUEST)) return;
			$this->_data = array();
			foreach ($_REQUEST as $key => $data) {
				$this->setData($this->_underscore(strtolower($key)), $data);
			}
		}
		
		protected function unsetData($key=null) {
	        if (is_null($key)) {
	            $_REQUEST = array();
	        } else {
	        	if (isset($_REQUEST[$key])) {
	            	unset($_REQUEST[$key]);
	        	}
	        }
	        return $this;
	    }
	    
	    protected function getData($key = '') {
	    	return isset($_REQUEST[$key]) ? $_REQUEST[$key] : null;
	    }
	    
	    protected function setData($key, $value=null)
	    {
	    	$_REQUEST[$key] = $value;
	    	$this->_data[$key] = $value;
            	
	        return $this;
	    }
	    
		public function is_set($key) {
	    	return isset($_REQUEST[$key]);
	    }
	    
	    public function clear() {
	    	$_REQUEST = array();
	    	$this->_data = array();
	    }
	    
	    // -- 
	    
	    public function getGet() {
	    	return new Php_Globals_Get;
	    }
	    
	    public function getPost() {
	    	return new Php_Globals_Post;
	    }
		
	}
