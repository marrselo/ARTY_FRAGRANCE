<?php

class Application_Model_MenuBase extends ZExtraLib_Model {

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
    function listarMenuBase($idioma, $modulo) {
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
    function editarMenu($datosMenu,$datosMenuBase,$idMenBase,$idIdioma,$idMenu){
        $whereMenuBase = $this->_menuBase->getAdapter()->quoteInto('idMenuBase = ?', $idMenBase);
        $whereMenu[] = $whereMenuBase;
        $whereMenu[] = $this->_menuBase->getAdapter()->quoteInto('idIdioma = ?', $idIdioma); 
        $this->_menu->update($datosMenu, $whereMenu);
        $this->_menuBase->update($datosMenuBase, $whereMenuBase);
    }
    function eliminarMenuBase($idMenuBase){
        $where = $this->_menuBase->getAdapter()->quoteInto('idMenuBase = ?', $idMenuBase);
        $this->_menu->delete($where);
        $this->_menuBase->delete($where);
    }
    function editEstadoMenuBase($idMenuBase,$estado){
        $where = $this->_menuBase->getAdapter()->quoteInto('idMenuBase = ?', $idMenuBase);
        $data = array('estadoMenuBase'=>$estado);
        $this->_menuBase->update($data, $where);    
    }
}
