<?php

class Application_Model_Idioma  {
    protected $_idioma;
    
    function __construct() 
    {
        $this->_idioma = new Application_Model_DbTable_Idioma();
    }
    public function getIdiomas(){
        return $this->_idioma->select();        
    }
    public function getIdiomaDefault(){
        $flag = 1;
        return $this->_idioma->select()->where('FlagDefaultIdioma = ? ',$flag)->query()->fetch();
    }
}

