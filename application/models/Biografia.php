<?php

class Application_Model_Biografia extends ZExtraLib_Model {

    protected $_idioma;
    protected $_tbiografia;
    protected $_foto;
    
    function __construct() {
        parent::__construct();
        $this->_idioma = new Application_Model_DbTable_Idioma();
        $this->_tbiografia = new Application_Model_DbTable_Biografia();
        $this->_foto = new Application_Model_DbTable_FotoBiografia();
    }
    function listarBiografiaPorIdioma($idioma) {
        if (!($result = $this->_cache->load('listaBiografiaIdioma' . $idioma ))) {
            $result = $this->_tbiografia
                    ->getAdapter()
                    ->select()
                    ->from(array('b' => $this->_tbiografia->getName()), array('b.contenidoBio','b.tituloBio'))
                    ->join(array('idi' => $this->_idioma->getName()), 'idi.idIdioma = b.idIdioma', '')
                    ->where('idi.prefIdioma = ? ', $idioma)->query()->fetch();
            $this->_cache->save($result, 'listaBiografiaIdioma' . $idioma );
        }
        return $result;
    }
    function listarFotosBiografia() {
        if (!($result = $this->_cache->load('listarFotosBiografia'))) {
            $result = $this->_foto->select()
                    ->query()->fetchAll();
            $this->_cache->save($result, 'listarFotosBiografia');
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
