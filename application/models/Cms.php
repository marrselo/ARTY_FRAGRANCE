<?php

class Application_Model_Cms extends ZExtraLib_Model {

    protected $_cms;
    protected $_idioma;

    function __construct() {
        parent::__construct();
        $this->_cms = new Application_Model_DbTable_Cms();
        $this->_idioma = new Application_Model_DbTable_Idioma();
    }

    function crearCms($data) {
        $arrayIdioma = $this->_idioma->select()->query()->fetchAll();
        foreach ($arrayIdioma as $index) {
            $data['idIdioma'] = $index['idIdioma'];
            $this->_cms->insert($data);
        }
    }
    function listarCmsItem($idMenuBase,$idIdioma){
        return $this->_cms->select()
                ->where('idMenuBase =?',$idMenuBase)
                ->where('idIdioma =?',$idIdioma)
                ->query()->fetch();
    }
    function listarCmsItemFront($idMenuBase,$idioma){
        $result = $this->_cms
                ->getAdapter()
                ->select()
                ->from(array('cm'=>$this->_cms->getName()),array('cm.contenidoCms'))
                ->join(array('idi'=>$this->_idioma->getName()), 'cm.idIdioma=idi.idIdioma')
                ->where('cm.idMenuBase =?',$idMenuBase)
                ->where('idi.PrefIdioma =?',$idioma);
        return $this->_cms->getAdapter()->fetchOne($result);
    }
    function editarCms($idMenuBase,$idIdioma,$data){
        $where[] = $this->_cms->getAdapter()->quoteInto('idMenuBase =?', $idMenuBase);
        $where[] = $this->_cms->getAdapter()->quoteInto('idIdioma =?', $idIdioma);
        $this->_cms->update($data, $where);
    }
    function eliminarCms($idMenuBase){
        $where = $this->_cms->getAdapter()->quoteInto('idMenuBase =?', $idMenuBase);
        $this->_cms->delete($where);
    }

}