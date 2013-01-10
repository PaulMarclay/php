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

	class Php_Globals_Server extends Php_Globals_Primitive {
		
		protected $_allowAddItem 	= false;
		protected $_allowUnsetItem 	= false;
		
		public function __construct() {
			if (!isset($_SERVER)) return;
			$this->_data = array();
			foreach ($_SERVER as $key => $data) {
				$this->setData($this->_underscore(strtolower($key)), $data);
			}
		}
		
		protected function unsetData($key=null) {
	        if (is_null($key)) {
	            $_SERVER = array();
	        } else {
	        	if (isset($_SERVER[$key])) {
	            	unset($_SERVER[$key]);
	        	}
	        }
	        return $this;
	    }
	    
	    protected function getData($key = '') {
	    	return isset($_SERVER[$key]) ? $_SERVER[$key] : null;
	    }
	    
	    protected function setData($key, $value=null)
	    {
	    	$_SERVER[$key] = $value;
            $this->_data[$key] = $value;
            
	        return $this;
	    }
	    
		public function is_set($key) {
	    	return isset($_SERVER[$key]);
	    }
	    
	    public function clear() {
	    	$_SERVER = array();
	    	$this->_data = array();
	    }
	    
		public function getUserIpAddress() {
	    	$retval = '';
	    	
			if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
				$retval = $_SERVER['HTTP_X_FORWARDED_FOR'];
			} else {
				$retval = $_SERVER['REMOTE_ADDR'];
			}
	 		
			return trim($retval);
	    }
		
	    public function isSupportedCompressionMethod($method) {
	    	return in_array($method, explode(',', $_SERVER['HTTP_ACCEPT_ENCODING']));
	    }
	}
