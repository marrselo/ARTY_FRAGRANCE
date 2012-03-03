<?php

class Application_Model_Menu extends ZExtraLib_Model {

    protected $_idioma;
    protected $_obra;
    protected $_obraIdioma;
    function __construct() {
        parent::__construct();
        $this->_idioma = new Application_Model_DbTable_Idioma();
        $this->_obra = new Application_Model_DbTable_Obra();
        $this->_obraIdioma = new Application_Model_DbTable_ObraIdioma();
    }
    function listarObraPorIdioma($idioma) {
        if (!($result = $this->_cache->load('listaObrasIdioma'.$idioma ))) {
            $result = $this->_obra
                    ->getAdapter()
                    ->select()
                    ->from(array('o' => $this->_obra->getName()), array('o.idObra', 'oi.tituloObraIdioma','oi.parrafoObraIdioma','o.link','o.imgObra'))
                    ->join(array('oi' => $this->_obraIdioma->getName()), 'oi.idObra = o.idObra','')
                    ->join(array('idi' => $this->_idioma->getName()), 'oi.idIdioma = oi.idIdioma', '')
                    ->where('idi.prefIdioma = ? ', $idioma)
            ;
            $result = $this->_menu->getAdapter()->fetchAssoc($result);
            $this->_cache->save($result, 'listaObrasIdioma'.$idioma);
        }
        return $result;
    }
}
