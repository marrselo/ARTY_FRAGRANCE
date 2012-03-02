<?php

class Application_Model_Menu extends ZExtraLib_Model {

    protected $_idioma;
    protected $_obra;
    protected $_obraIdioma;
    protected $_fotoObra;
    function __construct() {
        parent::__construct();
        $this->_idioma = new Application_Model_DbTable_Idioma();
        $this->_obra = new Application_Model_DbTable_Obra();
        $this->_obraIdioma = new Application_Model_DbTable_ObraIdioma();
        $this->_fotoObra = new Application_Model_DbTable_FotoObra();
    }
    function listarMenuPorIdioma($idioma) {
        if (!($result = $this->_cache->load('listaObrasIdioma'.$idioma ))) {
            $result = $this->_obra
                    ->getAdapter()
                    ->select()
                    ->from(array('o' => $this->_obra->getName()), array('mb.idMenuBase', 'mb.slugMenuBase','mb.rutaMenuBase','mb.idTipoMenu'))
                    ->join(array('men' => $this->_menu->getName()), 'mb.idMenuBase = men.idMenuBase', array('men.nombreMenu', 'mb.idModulo'))
                    ->join(array('idi' => $this->_idioma->getName()), 'idi.idIdioma = men.idIdioma', '')
                    ->where('idi.prefIdioma = ? ', $idioma)
                    ->where('mb.idModulo = ? ', $modulo)
            ;
            $result = $this->_menu->getAdapter()->fetchAssoc($result);
            $this->_cache->save($result, 'listaObrasIdioma'.$idioma);
        }
        return $result;
    }
}
