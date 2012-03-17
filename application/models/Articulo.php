<?php

class Application_Model_Articulo extends ZExtraLib_Model {

    protected $_articulo;
    protected $_idioma;
    function __construct() {
        parent::__construct();
        $this->_articulo = new Application_Model_DbTable_Articulo();
        $this->_idioma = new Application_Model_DbTable_Idioma();
    }
    

    function listarArticulo($idmenu, $est = NULL) {
        if($est)

        $db = $this->_articulo
                ->getAdapter()
                ->select()
                ->from(array($this->_articulo->getName()))
                ->where('idMenu = ? ', $idmenu)
                ->where('idEstadoArticulo = ? ', 1)
                ;
        else
            $db = $this->_articulo
                ->getAdapter()
                ->select()
                ->from(array($this->_articulo->getName()))
                ->where('idMenu = ? ', $idmenu)
                //->where('idEstadoArticulo = ? ', 1)
                ;
       $result = $db->query()->fetchAll();
        
        return $result;
    }
    function listarArticuloIdiomaDefault($idMenu,$idIdioma)
    {
        $db = $this->_articulo
                ->getAdapter()
                ->select()
                ->from(array($this->_articulo->getName()))
                ->where('idMenu = ? ', $idMenu)
                ->where('idIdioma = ?', $idIdioma)
                ->order('idArticulo ASC');
        $result = $db->query()->fetchAll();        
        return $result;
    }
    
    function buscaArticulo($id) {
        $db = $this->_articulo
                ->getAdapter()->select()
                ->from(array($this->_articulo->getName()))
                ->where('idArticulo = ? ', $id);
        $result = $db->query()->fetch();        
        return $result;
    }
    function buscarArticuloIdioma($idid,$idIdioma)
    {
        $arr = $this->buscaArticulo($idid);
        $ididArticulo = $arr['ididArticulo'];
        $db = $this->_articulo
                ->getAdapter()->select()
                ->from(array($this->_articulo->getName()))
                ->where('ididArticulo = ? ', $ididArticulo)
                ->where('idIdioma = ?', $idIdioma);
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
        $menu = new Application_Model_Menu();
        $m = $menu->searchMenu(3);
        foreach ($m as $men):
        $data = array(
            'titulo' => $values["titulo"],
            'parrafo' => $values["parrafo"],
            'fotoPrincipal' => $values["fotoPrincipal"],
            'idMenu' => $men["idMenu"],
            'idEstadoarticulo' => 1,
            'flagPublicar' => 1,
            'slugArticulo' => 1,            
            );
        $db->insert($this->_articulo->getName(),$data); 
        endforeach;
        return true;
    }
    
    function insertarArticulo($data)
    {
        $arrayIdioma = $this->_idioma->select()->query()->fetchAll();

        foreach($arrayIdioma as $key => $index ){
            $data['idIdioma'] = $index['idIdioma'];
            $this->_articulo->insert($data);
            if($key==0){
                $id = $this->_articulo->getAdapter()->lastInsertId();
                $data['ididArticulo'] = $id ; 
                $where = $this->_articulo->getAdapter()->quoteInto('idArticulo = ?', $id);
                $data2 = array('ididArticulo'=>$id);
                $this->_articulo->update($data2, $where);                
            }
        }
        
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
    
    function maxIdPuntoventa() {
        $db = $this->_articulo
                ->getAdapter();        
        $select = "SELECT AUTO_INCREMENT FROM information_schema.TABLES 
            WHERE TABLE_SCHEMA = 'artyfrag_fragance' AND TABLE_NAME = 'puntoventa'";
        
        $result = $db->fetchOne($select);
        
        return $result;
        
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
