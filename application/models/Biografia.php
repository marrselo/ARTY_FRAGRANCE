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
                    ->from(array('b' => $this->_tbiografia->getName()), array('b.contenidoBio'))
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
}
