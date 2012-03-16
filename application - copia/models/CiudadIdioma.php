<?php

class Application_Model_CiudadIdioma extends ZExtraLib_Model {
    protected $_ciudadIdioma;

    function __construct() {
        parent::__construct();        
        $this->_ciudadIdioma = new Application_Model_DbTable_CiudadIdioma();    
    }    
    
}