<?php

class Application_Model_Foto extends ZExtraLib_Model {

    protected $_foto;
    
    function __construct() {
        parent::__construct();
        $this->_foto = new Application_Model_DbTable_Foto();
    }
    
    function buscaArticulo($id) {
        $db = $this->_foto
                ->getAdapter()->select()
                ->from(array($this->_foto->getName()))
                ->where('idFoto = ? ', $id);
        
        $result = $db->query()->fetch();
        
        return $result;
    }
    
    function maxId() {
        $db = $this->_foto->getAdapter();
        
        $select = $db->select()->from(
                $this->_foto->getName(), array(
                    new Zend_Db_Expr('max(idFoto)+1 as max')));
        
        $result = $db->fetchOne($select);
        
        if(is_null($result))
            return 1;
        else
            return $result;
        
    }
}
