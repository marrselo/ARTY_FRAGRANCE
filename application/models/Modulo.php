<?php

class Application_Model_Modulo extends ZExtraLib_Model {
    protected $_modulo;
    function __construct() {
        parent::__construct();
        $this->_modulo = new Application_Model_DbTable_Modulo();
    }
    function listarModulo(){
        if (!($result = $this->_cache->load('listaModulo'))) {
        $result = $this->_modulo->getAdapter()->fetchAssoc($this->_modulo->select());
        $this->_cache->save($result, 'listaModulo');
        }
        return $result;
    }
    
}

?>
