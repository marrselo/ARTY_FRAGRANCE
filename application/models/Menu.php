<?php

class Application_Model_Menu extends ZExtraLib_Model {

    protected $_idioma;
    protected $_menuBase;
    protected $_modulo;
    protected $_menu;
    function __construct() {
        parent::__construct();
        $this->_idioma = new Application_Model_DbTable_Idioma();
        $this->_menuBase = new Application_Model_DbTable_MenuBase();
        $this->_modulo = new Application_Model_DbTable_Modulo();
        $this->_menu = new Application_Model_DbTable_Menu();
    }
    function listarMenuPorIdioma($idioma, $modulo) {
        if (!($result = $this->_cache->load('listaMenuIdioma' . $idioma . $modulo))) {
            $result = $this->_menu
                    ->getAdapter()
                    ->select()
                    ->from(array('mb' => $this->_menuBase->getName()), array('mb.idMenuBase', 'mb.slugMenuBase','mb.rutaMenuBase'))
                    ->join(array('men' => $this->_menu->getName()), 'mb.idMenuBase = men.idMenuBase', array('men.nombreMenu', 'mb.idModulo'))
                    ->join(array('idi' => $this->_idioma->getName()), 'idi.idIdioma = men.idIdioma', '')
                    ->where('idi.prefIdioma = ? ', $idioma)
                    ->where('mb.idModulo = ? ', $modulo)
            ;
            $result = $this->_menu->getAdapter()->fetchAssoc($result);
            $this->_cache->save($result, 'listaMenuIdioma' . $idioma . $modulo);
        }
        return $result;
    }
}
