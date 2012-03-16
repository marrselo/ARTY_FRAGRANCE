<?php

class Application_Model_Legal extends ZExtraLib_Model {

    protected $_idioma;
    protected $_modRecomendarSite;
    function __construct() {
        parent::__construct();
        $this->_idioma = new Application_Model_DbTable_Idioma();
        $this->_modRecomendarSite = new Application_Model_DbTable_MencionesLegales();
    }
    function listarLegalPorIdioma($idioma) {
        if (!($result = $this->_cache->load('listarLegalPorIdioma'.$idioma ))) {
            $result = $this->_modRecomendarSite
                    ->getAdapter()
                    ->select()
                    ->from(array('mo' => $this->_modRecomendarSite->getName()))
                    ->join(array('idi' => $this->_idioma->getName()), 'mo.idIdioma = idi.idIdioma','')
                    ->where('idi.prefIdioma = ? ', $idioma)->query()->fetch();
            $this->_cache->save($result, 'listarLegalPorIdioma'.$idioma);
        }
        return $result;
    }
    function insertLegal($data){
        $this->_modRecomendarSite->insert($data);
        return $this->_modRecomendarSite->getAdapter()->lastInsertId();
    }
        function updateLegal($data,$idObra){
        $where = $this->_modRecomendarSite->getAdapter()->quoteInto('idIdioma = ?', $idObra);
        $this->_modRecomendarSite->update($data, $where);
    }
    
}
