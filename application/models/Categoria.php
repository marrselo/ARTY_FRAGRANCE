<?php

class Application_Model_Categoria extends ZExtraLib_Model {

    protected $_categoria;
    
    function __construct() {
        parent::__construct();
        $this->_categoria = new Application_Model_DbTable_Categoria();
    }
    
    function listarCategoria($idArticulo) {
        $db = $this->_categoria
                ->getAdapter()
                ->select()
                ->from(array($this->_categoria->getName()))
                ->where('idArticulo = ? ', $idArticulo);
                
        $result = $db->query()->fetchAll();
        
        return $result;
    }
    
    function buscaCategoria($id) {
        $db = $this->_categoria
                ->getAdapter()->select()
                ->from(array($this->_categoria->getName()))
                ->where('idCat = ? ', $id);
        
        $result = $db->query()->fetch();
        
        return $result;
    }
    function updateCategoria($values=array()) {
        $db = $this->_categoria->getAdapter();
        $data = array(
            'nombre' => $values["nombre"]
            );
        $where = $db->quoteInto('idCat = ?', $values["idCat"]);
        $db->update($this->_categoria->getName(),$data, $where); 
        
        return true;
    }    
    
    function insertCategoria($values=array()) {
        $db = $this->_categoria->getAdapter();        
        $data = array(
            'idArticulo' => $values["idArticulo"],
            'nombre' => $values["nombre"],            
            'estado' => 1,            
            );        
        $db->insert($this->_categoria->getName(),$data); 
        
        return true;
    }
    
    function deleteCategoria($id) {
        $db = $this->_categoria->getAdapter();
        $where = $db->quoteInto('idCat = ?', $id);
        $db->delete($this->_categoria->getName(), $where);
        
        return true;
    }
    
    function desactiveCategoria($id, $est) {
        $db = $this->_categoria->getAdapter();        
        if($est==0)
            $est =1;
        else 
            $est =0;
                    
        $where = $db->quoteInto('idCat = ?', $id);
        $data = array('estado' => $est
            );
        $db->update($this->_categoria->getName(), $data,$where);
        return true;
    }
    function listProductos() {
        $db = $this->_categoria
                ->getAdapter()->select()
                ->from(array($this->_categoria->getName()));
        
        $result = $db->query()->fetchAll();
        
        return $result;
    }
    
    function maxId() {
        $db = $this->_categoria
                ->getAdapter();        
        $select = "SELECT AUTO_INCREMENT FROM information_schema.TABLES 
            WHERE TABLE_SCHEMA = 'artyfrag_fragance' AND TABLE_NAME = 'category'";
        
        $result = $db->fetchOne($select);
        
        return $result;
        
        }
}
