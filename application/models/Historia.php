<?php

class Application_Model_Historia extends ZExtraLib_Model {

    protected $_idioma;
    protected $_thistoria;
    protected $_foto;
    
    function __construct() {
        parent::__construct();
        $this->_idioma = new Application_Model_DbTable_Idioma();
        $this->_thistoria = new Application_Model_DbTable_Historia();
        $this->_foto = new Application_Model_DbTable_HistoriaImagen();
    }
    function listarHistoriaPorIdioma($idioma) {
        if (!($result = $this->_cache->load('listaHistoriaIdioma' . $idioma ))) {
            $result = $this->_thistoria
                    ->getAdapter()
                    ->select()
                    ->from(array('o' => $this->_thistoria->getName()), 
                            array('o.contenidoHistory','o.linkHistory'))
                    ->join(array('idi' => $this->_idioma->getName()), 'idi.idIdioma = o.idIdioma', '')
                    ->where('idi.prefIdioma = ? ', $idioma)->query()->fetch();
            $this->_cache->save($result, 'listaHistoriaIdioma' . $idioma );
        }
        return $result;
    }
    function listarHistoriaPorPrefIdioma($idioma) {
        if (!($result = $this->_cache->load('listaHistoriaPrefIdioma' . $idioma ))) {
            $result = $this->_thistoria
                    ->getAdapter()
                    ->select()
                    ->from(array('o' => $this->_thistoria->getName()), 
                            array('o.contenidoHistory','o.linkHistory','o.idHistory'))
                    ->join(array('idi' => $this->_idioma->getName()), 'idi.idIdioma = o.idIdioma', '')
                    ->where('idi.PrefIdioma = ? ', $idioma)->query()->fetch();
            $this->_cache->save($result, 'listaHistoriaPrefIdioma' . $idioma );
        }
        return $result;
    }
    function listarFotosHistoria() {
        if (!($result = $this->_cache->load('listarFotosHistoria'))) {
            $result = $this->_foto->select()
                    ->query()->fetchAll();
            $this->_cache->save($result, 'listarFotosHistoria');
        }
        return $result;
    }
    function listarFotosHistoriaPref($idioma) {
        if (!($result = $this->_cache->load('listarFotosHistoriaPref'.$idioma))) {
            $result = $this->_foto
                    ->getAdapter()
                    ->select()
                    ->from(array('o' => $this->_foto->getName()), 
                            array('o.nombreImgHistory','o.idImgHistory'))
                    ->join(array('idi' => $this->_thistoria->getName()), 'idi.idHistory = o.idHistory', '')
                    ->join(array('ido' => $this->_idioma->getName()), 'idi.idIdioma = ido.idIdioma', '')
                    ->where('ido.PrefIdioma = ? ', $idioma)
                    ->query()->fetchAll();
            $this->_cache->save($result, 'listarFotosHistoriaPref'.$idioma);
        }
        return $result;
    }
     function ifExistHisIdioma($idLang){
        return $this->_thistoria->select()->where('idIdioma = ?',$idLang)->query()->fetch();
    }
      
    function InsertInfoHistoria($data,$idLang,$prefIdioma) {
        if($this->ifExistHisIdioma($idLang)){
            $where = $this->_thistoria->getAdapter()->quoteInto('idIdioma = ?', $idLang);
            $this->_thistoria->update($data, $where);
        }else{
            $this->_thistoria->insert($data);
        }    
        
        $this->_cache->remove('listaHistoriaIdioma'.$prefIdioma);
    }
    function InsertFotoHistoria($arrayFoto){
        $this->_foto->delete('1=1');
        foreach($arrayFoto as $index) {
            $data['nombreImgHistory']=$index;
            $this->_foto->insert($data);
        }
        $this->_cache->remove('listarFotosHistoria');
    }
    function ifExistHistoriaIdioma($idLang){
        return $this->_thistoria->select()->where('idIdioma = ?',$idLang)->query()->fetch();
    }
    function listarFotoHistoria($idfoto) {
        if (!($result = $this->_cache->load('listarFotoHistoria'.$idfoto))) {
            $result = $this->_foto->select()->where('idImgHistory = ?',$idfoto)
                    ->query()->fetch();
            $this->_cache->save($result, 'listarFotoHistoria'.$idfoto);
        }
        return $result;
    }
    function DeleteFotoHistoria($idfoto,$idioma){
        $where = $this->_foto->getAdapter()->quoteInto('idImgHistory = ?', $idfoto);
        $this->_foto->delete($where);
        $this->_cache->remove('listarFotosHistoria'.$idioma);
    }
}
