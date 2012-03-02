<?php

class Application_Model_Articulo extends ZExtraLib_Model {

    protected $_articulo;
    
    function __construct() {
        parent::__construct();
        $this->_articulo = new Application_Model_DbTable_Articulo();        
    }
    
    function listarArticulo($idmenu) {
        $db = $this->_articulo
                ->getAdapter()
                ->select()
                ->from(array($this->_articulo->getName()))
                ->where('idMenu = ? ', $idmenu)
                ->where('idEstadoArticulo = ? ', 1);
        
        $result = $db->query()->fetchAll();
        
        return $result;
    }
}
