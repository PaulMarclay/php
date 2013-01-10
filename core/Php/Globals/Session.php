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

	class Php_Globals_Session extends Php_Globals_Primitive {
		protected $_section = 'user';
		protected $_sections = array('api', 'user');
		
		public function __construct($section = 'user') {
			if (!in_array($section, $this->_sections)) {
				$section = 'user';
			}
			
			$this->_section = $section;
		}
		
		protected function unsetData($key=null) {
	        if (is_null($key)) {
	            $this->clear();
	        } else {
	        	if (isset($_SESSION[$this->_section][$key])) {
	            	unset($_SESSION[$this->_section][$key]);
	        	}
	        }
	        return $this;
	    }
	    
	    protected function getData($key = '') {
	    	if (!isset($_SESSION[$this->_section][$key])) {
	    		return null;
	    	}
	    	
	    	// return unserialize($_SESSION[$this->_section][$key]);
	    	return $_SESSION[$this->_section][$key];
	    }
	    
	    protected function setData($key, $value=null, $noSerialize = false)
	    {
	    	// $_SESSION[$this->_section][$key] = (($noSerialize || is_resource($value) == 'resource') ? $value : serialize($value));
	    	$_SESSION[$this->_section][$key] = $value;

	        return $this;
	    }
	    
		public function is_set($key) {
	    	return isset($_SESSION[$this->_section][$key]);
	    }
	    
	    public function clear() {
	    	$_SESSION[$this->_section] = array();
	    }
	    
	    // -- Getters
	    
	    public function getSessionId() {
	    	return session_id();
	    }
	}