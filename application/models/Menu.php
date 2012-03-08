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
                    ->from(array('mb' => $this->_menuBase->getName()), array('mb.idMenuBase', 'mb.slugMenuBase', 'mb.rutaMenuBase', 'mb.idTipoMenu'))
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

    function buscaMenu($idMenuBase, $idIdioma) {
        $db = $this->_menu->getAdapter()
                ->select()
                ->from($this->_menu->getName(), array('idMenu', 'nombreMenu'))
                ->where('idMenuBase = ? ', $idMenuBase)
                ->where('idIdioma = ? ', $idIdioma);

        $result = $db->query()->fetch();

        return $result;
    }

    public function getMenu($idIdioma,$modulo = 1) {
        $select = $this->_menu->getAdapter()->select();

        $select->from(array('t1' => 'menu'), array('idMenu', 'nombreMenu'))
                ->join(array('t2' => 'menubase'), 't1.idMenuBase = t2.idMenuBase', array(''))
                ->where('t2.idModulo = ? ', $modulo)
               ->where('idIdioma = ? ', $idIdioma);

        $result = $select->query()->fetchAll();

        return $result;
    }
    
    public function saveMenuSuperior($data){
        $id = $data['idMenu'];
        unset($data['idMenu']);
        var_dump('listo pa guardar'); exit;
        $where = $this->getAdapter()->quoteInto('idMenu = ?', $id);
        $this->update($data, $where);
        
        if($data['idIdioma'] == '1'):
            $db = $this->_menuBase->getAdapter();
            $where = $db->getAdapter()->quoteInto('idMenu = ?', $id);
        endif;
    }
    
    public function deleteMenu($data){
        var_dump($data); exit;
    }

}
