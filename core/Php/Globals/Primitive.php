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

	abstract class Php_Globals_Primitive extends Ancestor {
		
		protected $_allowAddItem 	= true;
		protected $_allowUnsetItem 	= true;
		protected $_data 			= array();
		
		protected function _underscore($name) {
	        $result = strtolower(preg_replace('/(.)([A-Z])/', "$1_$2", $name));
	        return $result;
	    }

		public function __call($method, $args) {
	    	switch (substr($method, 0, 3)) {
            case 'get' :
                $key = $this->_underscore(substr($method,3));
                $data = $this->getData($key, isset($args[0]) ? $args[0] : null);
                return $data;

            case 'set' :
                $key = $this->_underscore(substr($method,3));
                $result = $this->setData($key, isset($args[0]) ? $args[0] : null);
                return $result;
	    	
            case 'uns' :
                $key = $this->_underscore(substr($method,3));
                $result = $this->unsetData($key);
                return $result;

            case 'has' :
                $key = $this->_underscore(substr($method,3));
                return $this->is_set($key);
	    	}
	    }
	    
	    protected function _camelize($name) {
	        return Conversor::uc_words($name, '');
	    }
		
	    public function setDataUsingMethod($key, $args=array())
	    {
	        $method = 'set'.$this->_camelize($key);
	        $this->$method($args);
	        return $this;
	    }
	
	    public function getDataUsingMethod($key, $args=null)
	    {
	        $method = 'get'.$this->_camelize($key);
	        return $this->$method($args);
        }
        
        public function unsDataUsingMethod($key) {
            $this->unsetData($key);
        }
		
	    public function getAllItemsToArray() {
			return $this->_data;
		}
		
		public function clear() {
	    	$this->_data = array();
	    }
		
	}