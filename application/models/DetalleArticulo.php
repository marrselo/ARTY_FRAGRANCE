<?php

class Application_Model_DetalleArticulo extends ZExtraLib_Model {

    protected $_articulo;
    
    function __construct() {
        parent::__construct();
        $this->_articulo = new Application_Model_DbTable_DetalleArticulo();
    }
    
    function listarArticulo($idArticulo) {
        $db = $this->_articulo
                ->getAdapter()
                ->select()
                ->from(array($this->_articulo->getName()))
                ->where('idArticulo = ? ', $idArticulo);
                
        $result = $db->query()->fetchAll();
        
        return $result;
    }
    
    function buscaArticulo($id) {
        $db = $this->_articulo
                ->getAdapter()->select()
                ->from(array($this->_articulo->getName()))
                ->where('idDetalleArticulo = ? ', $id);
        
        $result = $db->query()->fetch();
        
        return $result;
    }
}
