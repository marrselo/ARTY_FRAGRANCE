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
            );
        if($values["fotoPrincipal"] != '') {
            $ext = pathinfo($_FILES['fotoPrincipal']['name'], PATHINFO_EXTENSION);            
            $vallogo = array(
                'fotoPrincipal' => $values['idArticulo'] . '.' . $ext
                );
        }
        else 
            $vallogo = array();
        $where = $db->quoteInto('idArticulo = ?', $values["idArticulo"]);            
        $db->update($this->_articulo->getName(),$data + $vallogo, $where); 
        
        if($values["fotoPrincipal"] != '') {            
            $ruta1 = 'tmp/ARTY' . $values['idArticulo'];
            $ruta = APPLICATION_PATH . '/../public/' . $ruta1;
            $ftp = new ZExtraLib_Utils_Ftp(
                        "perusoftware.net", 
                        "artyfrag", 
                        "arty2012");
            $ftp->openFtp();       
            $ftp->upImage($values['idArticulo'] . 's.' . $ext, $ruta . '/' . $values['fotoPrincipal']);
            $ftp->closeFtp();
             /*$configNormal = array(
                  'applySizeLimit' => true,
                  'maxWidth' => '2000',
                  'maxHeight' => '2000'
                  );
                  $thumblib = new ZExtraLib_Utils_Thumbnail();
                  $rutaImg=APPLICATION_PATH. '/../public/imagen-articulo';
                  $imgNormal = $rutaImg . '/' . $values['fotoPrincipal'];                  
                  $imgOriginal = $rutaImg . '/or/' . $values['fotoPrincipal'];                  
                  $thumblib->setSourceFile($imgOriginal);
                  $originalFilename = pathinfo($values['fotoPrincipal']);                  
                  $ext=strtolower($originalFilename['extension']);
                  if($ext=='gif')
                  $thumblib->saveToFile($imgNormal, ZExtraLib_Utils_Thumbnail::FORMAT_GIF, $configNormal);                  
                  else
                  $thumblib->saveToFile($imgNormal, ZExtraLib_Utils_Thumbnail::FORMAT_JPG, $configNormal); */
        }
        
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
    
}
