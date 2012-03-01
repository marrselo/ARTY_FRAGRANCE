<?php

class Application_Model_Idioma extends ZExtraLib_Model {

    protected $_idioma;

    function __construct() {
        parent::__construct();
        $this->_idioma = new Application_Model_DbTable_Idioma();
    }

    public function getIdiomas() {
        if (!($result = $this->_cache->load('listaIdiomas'))) {
            $result = $this->_idioma
                    ->getAdapter()
                    ->fetchPairs($this->_idioma->select()
                            ->from($this->_idioma->getName(),
                                    array('PrefIdioma','NombreIdioma')));
            $this->_cache->save($result, 'listaIdiomas');
        }
        return $result;
    }

    public function getAllIdiomas() {
        $result = $this->_idioma->select()->query()->fetchAll();
        return $result;
    }
    
    

    public function getIdiomaDefault() {
        if (!($result = $this->_cache->load('listaIdiomaDefault'))) {
            $flag = 1;
            $result = $this->_idioma->select()->where('FlagDefaultIdioma = ? ', 
                    $flag)->query()->fetch();
            $this->_cache->save($result, 'listaIdiomaDefault');
        }
        return $result;
    }

    public function insertIdioma($data) {
        $this->_idioma->insert($data);
        $this->clearCache('listaIdiomaDefault');
        $this->clearCache('listaIdiomas');
        return $this->_idioma->getAdapter()->lastInsertId();
    }

}

