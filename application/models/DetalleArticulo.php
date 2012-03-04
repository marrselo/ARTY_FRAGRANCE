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
    function updateProducto($values=array()) {
        $db = $this->_articulo->getAdapter();        
        $data = array(
            'titulo' => $values["titulo"],
            'tituloDetalle' => $values["tituloDetalle"],
            'parrafoDetalle' => $values["parrafoDetalle"],
            );
        $where = $db->quoteInto('idDetalleArticulo = ?', $values["idDetalleArticulo"]);
        $db->update($this->_articulo->getName(),$data, $where); 
        
        return true;
    }    
    
    function deleteProduct($id) {
        $db = $this->_articulo->getAdapter();
        $where = $db->quoteInto('idDetalleArticulo = ?', $id);                       
        $db->delete('detallearticulo', $where);
        
        return true;
    }
    
    function desactiveProduct($id, $est) {
        $db = $this->_articulo->getAdapter();        
        if($est==0)
            $est =1;
        else 
            $est =0;
                    
        $where = $db->quoteInto('idDetalleArticulo = ?', $id);
        $data = array('estado' => $est
            );
        $db->update('detallearticulo', $data,$where);
        return true;
    }
}
