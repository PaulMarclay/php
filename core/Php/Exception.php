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

	class Php_Exception extends Exception {
		
        public function __construct($message, $code = null, $previous = null) {
            Api::getLog()->put("Exception: $message", 4, 'red');
            parent::__construct($message, $code, $previous);
        }
	}