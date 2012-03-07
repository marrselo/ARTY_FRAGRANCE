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
                //->where('idEstadoArticulo = ? ', 1);
                ;
        
        $result = $db->query()->fetchAll();
        
        return $result;
    }
    
    function buscaArticulo($id) {
        $db = $this->_articulo
                ->getAdapter()->select()
                ->from(array($this->_articulo->getName()))
                ->where('idArticulo = ? ', $id)
                //->where('idEstadoArticulo = ? ', 1)
                ;        
        $result = $db->query()->fetch();        
        return $result;
    }
    
    function updateArticulo($values=array()) {
        $db = $this->_articulo->getAdapter();        
        $data = array(
            'titulo' => $values["titulo"],
            'parrafo' => $values["parrafo"],
            'fotoPrincipal' => $values["fotoPrincipal"],
            );
        
        $where = $db->quoteInto('idArticulo = ?', $values["idArticulo"]);            
        $db->update($this->_articulo->getName(),$data, $where); 
        
        return true;
    }    
    
    function insertArticulo($values=array()) {
        $db = $this->_articulo->getAdapter();        
        $data = array(
            'titulo' => $values["titulo"],
            'parrafo' => $values["parrafo"],
            'fotoPrincipal' => $values["fotoPrincipal"],
            'idMenu' => $values["idMenu"],
            'idEstadoarticulo' => 1,
            'flagPublicar' => 1,
            'slugArticulo' => 1,            
            );
        $db->insert($this->_articulo->getName(),$data); 
        
        return true;
    }
    
    function deleteArticulo($id) {
        $db = $this->_articulo->getAdapter();
        $where = $db->quoteInto('idArticulo = ?', $id);        
        $db->delete('articulo', $where);        
        $db->delete('detallearticulo', $where);
        
        return true;
    }
    
    function desactiveArticulo($id, $est) {
        $db = $this->_articulo->getAdapter();        
        if($est==0)
            $est =1;
        else 
            $est =0;
                    
        $where = $db->quoteInto('idArticulo = ?', $id);
        $data = array('idEstadoArticulo' => $est
            );
        $db->update('articulo', $data,$where);
        return true;
    }
    
    function maxId() {
        $db = $this->_articulo
                ->getAdapter();        
        $select = "SELECT AUTO_INCREMENT FROM information_schema.TABLES 
            WHERE TABLE_SCHEMA = 'artyfrag_fragance' AND TABLE_NAME = 'articulo'";
        
        $result = $db->fetchOne($select);
        
        return $result;
        
        }
    
}
