<?php

class Application_Model_FotoDetalleArticulo extends ZExtraLib_Model {

    protected $_fotodetalle;
    
    function __construct() {
        parent::__construct();
        $this->_fotodetalle = new Application_Model_DbTable_FotoDetalleArticulo();
    }
    
    function imagesPorProducto($idProducto) {
        $db = $this->_fotodetalle
                ->getAdapter()
                ->select()
                ->from(array('det' => $this->_fotodetalle->getName()))
                ->join(array('f' => 'foto'), 'det.idFoto = f.idFoto', array('nombreFoto'))
                ->where('idDetalleArticulo = ? ', $idProducto);

                
        $result = $db->query()->fetchAll();
        
        return $result;
    }
    
    function buscaArticulo($id) {
        $db = $this->_fotodetalle
                ->getAdapter()->select()
                ->from(array($this->_fotodetalle->getName()))
                ->where('idDetalleArticulo = ? ', $id);
        
        $result = $db->query()->fetch();
        
        return $result;
    }
    function updateProducto($values=array()) {
        $db = $this->_fotodetalle->getAdapter();        
        $data = array(
            'titulo' => $values["titulo"],
            'tituloDetalle' => $values["tituloDetalle"],
            'parrafoDetalle' => $values["parrafoDetalle"],
            );
        $where = $db->quoteInto('idDetalleArticulo = ?', $values["idDetalleArticulo"]);
        $db->update($this->_fotodetalle->getName(),$data, $where); 
        
        return true;
    }    
    
    function deleteProduct($id) {
        $db = $this->_fotodetalle->getAdapter();
        $where = $db->quoteInto('idDetalleArticulo = ?', $id);                       
        $db->delete('detallearticulo', $where);
        
        return true;
    }
    
    function deleteFoto($idFoto, $idDetalleArticulo) {
        $db = $this->_fotodetalle->getAdapter();
        $where = $db->quoteInto('idDetalleArticulo = ?', $idDetalleArticulo);
        $db->delete('foto_detallearticulo', $where);
        $where = $db->quoteInto('idFoto = ?', $idFoto);
        $db->delete('foto', $where);
        
        return true;
    }
    
    
    function desactiveProduct($id, $est) {
        $db = $this->_fotodetalle->getAdapter();        
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
