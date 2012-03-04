<?php

class Application_Model_ModRecomendarSite extends ZExtraLib_Model {

    protected $_idioma;
    protected $_modRecomendarSite;
    function __construct() {
        parent::__construct();
        $this->_idioma = new Application_Model_DbTable_Idioma();
        $this->_modRecomendarSite = new Application_Model_DbTable_ModRecomendarSite();
    }
    function listarModRecomendarSitePorIdioma($idioma) {
        if (!($result = $this->_cache->load('listarModRecomendarSitePorIdioma'.$idioma ))) {
            $result = $this->_modRecomendarSite
                    ->getAdapter()
                    ->select()
                    ->from(array('mo' => $this->_modRecomendarSite->getName()))
                    ->join(array('idi' => $this->_idioma->getName()), 'mo.idIdioma = idi.idIdioma','')
                    ->where('idi.prefIdioma = ? ', $idioma)->query()->fetch();
            $this->_cache->save($result, 'listarModRecomendarSitePorIdioma'.$idioma);
        }
        return $result;
    }
}
