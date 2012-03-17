<?php

class Application_Model_Historia extends ZExtraLib_Model {

    protected $_idioma;
    protected $_tbiografia;
    protected $_foto;
    
    function __construct() {
        parent::__construct();
        $this->_idioma = new Application_Model_DbTable_Idioma();
        $this->_tbiografia = new Application_Model_DbTable_Historia();
        $this->_tbiografiaidioma = new Application_Model_DbTable_HistoriaIdioma();
        $this->_foto = new Application_Model_DbTable_HistoriaImagen();
    }
    function listarHistoriaPorIdioma($idioma) {
        if (!($result = $this->_cache->load('listaHistoriaIdioma' . $idioma ))) {
            $result = $this->_tbiografia
                    ->getAdapter()
                    ->select()
                    ->from(array('o' => $this->_tbiografia->getName()), 
                            array('o.idHistory', 
                                'nombreTipoSite'=>'oi.nombreIdiomaTipoSite'))
                    ->join(array('oi' => $this->_tbiografiaidioma->getName()), 'oi.idHistory = o.idHistory','')
                    ->join(array('idi' => $this->_idioma->getName()), 'idi.idIdioma = oi.idIdioma', '')
                    ->where('idi.prefIdioma = ? ', $idioma)->query()->fetch();
            $this->_cache->save($result, 'listaHistoriaIdioma' . $idioma );
        }
        return $result;
    }
    function listarFotosHistoria($historia) {
        if (!($result = $this->_cache->load('listarFotosHistoria'.$historia))) {
            $result = $this->_foto->select()
                    ->where('idHistory = ? ', $idioma)
                    ->query()->fetchAll();
            $this->_cache->save($result, 'listarFotosHistoria'.$historia);
        }
        return $result;
    }
    
    function ifExistBioIdioma($idLang){
        return $this->_tbiografia->select()->where('idIdioma = ?',$idLang)->query()->fetch();
    }
    
    function InsertInfoBio($data,$idLang,$prefIdioma) {
        if($this->ifExistBioIdioma($idLang)){
            $where = $this->_tbiografia->getAdapter()->quoteInto('idIdioma = ?', $idLang);
            $this->_tbiografia->update($data, $where);
        }else{
            $this->_tbiografia->insert($data);
        }    
        
        $this->_cache->remove('listaBiografiaIdioma'.$prefIdioma);
    }
    function InsertFotoBio($arrayFoto){
        $this->_foto->delete('1=1');
        foreach($arrayFoto as $index) {
            $data['nombreFotoBio']=$index;
            $this->_foto->insert($data);
        }
        $this->_cache->remove('listarFotosBiografia');
    }
}
