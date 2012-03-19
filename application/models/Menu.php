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

    function listarMenuPorIdiomaAdmin($idioma, $modulo) {

        $result = $this->_menu
                ->getAdapter()
                ->select()
                ->from(array('mb' => $this->_menuBase->getName()), array('mb.idMenuBase', 'mb.slugMenuBase', 'mb.rutaMenuBase', 'mb.idTipoMenu'))
                ->join(array('men' => $this->_menu->getName()), 'mb.idMenuBase = men.idMenuBase', array('men.nombreMenu', 'mb.idModulo'))
                ->join(array('idi' => $this->_idioma->getName()), 'idi.idIdioma = men.idIdioma', '')
                ->where('idi.idIdioma = ? ', $idioma)
                ->where('mb.idModulo = ? ', $modulo);

        $result = $this->_menu->getAdapter()->fetchAssoc($result);


        return $result;
    }

    function crearMenuCms($dataMenu, $dataMenuBase) {
        $arrayIdioma = $this->_idioma->select()->query()->fetchAll();
        $this->_menuBase->insert($dataMenuBase);
        $dataMenu['idMenuBase'] = $this->_menuBase->getAdapter()->lastInsertId();
        foreach ($arrayIdioma as $index) {
            $dataMenu['idIdioma'] = $index['idIdioma'];
            $this->_menu->insert($dataMenu);
        }
        $where = $this->_menu->getAdapter()->quoteInto('idMenuBase =?', $dataMenu['idMenuBase']);
        $data['rutaMenuBase'] = $dataMenuBase['rutaMenuBase'] . '-' . $dataMenu['idMenuBase'];
        $this->_menuBase->update($data, $where);
        return $dataMenu['idMenuBase'];
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

    function searchMenu($idMenuBase) {
        $db = $this->_menu->getAdapter()
                ->select()
                ->from($this->_menu->getName(), array('idMenu'))
                ->where('idMenuBase = ? ', $idMenuBase);
        $result = $db->query()->fetchAll();

        return $result;
    }

    public function getMenu($idIdioma, $modulo = 1) {
        $select = $this->_menu->getAdapter()->select();
//        $sesion = new Zend_Session_Namespace('web');
        $select->from(array('t1' => 'menu'), array('idMenu', 'nombreMenu', 'idMenuBase'))
                ->join(array('t2' => 'menubase'), 't1.idMenuBase = t2.idMenuBase', array('estadoMenuBase'))
                ->where('t2.idModulo = ? ', $modulo)
                //  ->where('t2.estadoMenuBase = ? ', 1)
                ->where('idIdioma = ? ', $idIdioma);
        //echo $select; exit;
        $result = $select->query()->fetchAll();

        return $result;
    }

    public function saveMenuSuperior($data, $default) {

        $sesion = new Zend_Session_Namespace('web');
        //$where = $this->_menu->getAdapter()->quoteInto('idMenu = ?', $id);
        $this->_menu->update(array('nombreMenu' => $data['nombreMenu']), "idMenu = '{$data['idMenu']}' and idIdioma = '{$sesion->lg}'");
        if ($sesion->lg == $default):
            $this->_menuBase->update(array('nombreMenuBase' => $data['nombreMenu']), "idMenuBase = '{$data['idMenuBase']}'");
        endif;
        $action = $this->resultTransaccion('1', '', 'Registro actualizado Correctamente', '');
        $this->_cache->clean();
        return $action;
    }

    public function deleteMenu($data) {
        //Viendo el estado Actual
        $select = $this->_menuBase->getAdapter()->select();
        $select->from($this->_menuBase->getName(), array('estadoMenuBase'))
                ->where('idMenuBase = ? ', $data['id']);
        //echo $select; exit;
        $dtaMenu = $select->query()->fetch();
        //cambiando el edtado
        $estado = ($dtaMenu['estadoMenuBase'] == '1') ? '0' : '1';
        //Actualizando el nuevo estado
        //var_dump("idMenuBase = '{$data['id']}'"); exit;
        $this->_menuBase->update(array('estadoMenuBase' => $estado), "idMenuBase = '{$data['id']}'");

        $action = $this->resultTransaccion('1', '', 'Registro Desactivado Correctamente', '');
        return $action;
    }

    public function listarMenuCms($modulo, $idIdioma) {
        $result = $this->_menu
                ->getAdapter()
                ->select()
                ->from(array('mb' => $this->_menuBase->getName()), 
                        array('mb.idMenuBase', 
                            'mb.slugMenuBase', 
                            'mb.estadoMenuBase', 
                            'mb.rutaMenuBase', 
                            'men.idMenu', 
                            'mb.idTipoMenu'))
                ->join(array('men' => $this->_menu->getName()), 'mb.idMenuBase = men.idMenuBase', array('men.nombreMenu', 'mb.idModulo'))
                ->join(array('idi' => $this->_idioma->getName()), 'idi.idIdioma = men.idIdioma', '')
                ->where('idi.idIdioma = ? ', $idIdioma)
                ->where('mb.idTipoMenu = ? ','1')
                ->where('mb.idModulo = ? ', $modulo)
                ;
        $result = $this->_menu->getAdapter()->fetchAssoc($result);
        return $result;
    }
    public function detalleMenuCms($idMenuBase,$idIdioma){
        return $this->_menu
                ->getAdapter()
                ->select()
                ->from(array('mb' => $this->_menuBase->getName()), 
                        array('mb.idMenuBase', 
                            'mb.slugMenuBase', 
                            'men.nombreMenu', 
                            'mb.estadoMenuBase', 
                            'mb.rutaMenuBase', 
                            'mb.idTipoMenu'))
                ->join(array('men' => $this->_menu->getName()), 'mb.idMenuBase = men.idMenuBase', array('men.nombreMenu', 'mb.idModulo'))
                ->join(array('idi' => $this->_idioma->getName()), 'idi.idIdioma = men.idIdioma', '')
                ->where('idi.idIdioma = ? ', $idIdioma)
                ->where('mb.idMenuBase = ? ', $idMenuBase)
                ->query()
                ->fetch();
        
    }
}
