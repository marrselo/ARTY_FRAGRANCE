<?php

class Application_Model_Modulo extends ZExtraLib_Model {
    protected $_modulo;
    function __construct() {
        parent::__construct();
        $this->_modulo = new Application_Model_DbTable_Modulo();
    }
    function listarModulo(){
        if (!($result = $this->_cache->load('listaModulo'))) {
        $result = $this->_modulo->getAdapter()->fetchAssoc($this->_modulo->select());
        $this->_cache->save($result, 'listaModulo');
        }
        return $result;
    }
    function listarModuloMenu(){
        if (!($colMenuModulo = $this->_cache->load('listaModuloMenu'))) {
            $colModulos = $this->listarModulo();                      
            $result = $this->_modulo->getAdapter()->select()
                           ->from($this->_modulo->getName())
                           ->join('menubase', 'menubase.idModulo = modulo.idModulo')
                           ->query()
                           ->fetchAll();
            foreach($colModulos as $value){
                for($i = 0;$i<count($result); $i++ ){
                    if($value['idModulo']== $result[$i]['idModulo']){                    
                        $colMenuModulo[$value['nombreModulo']][] = $result[$i];
                    }
                }
            }            
            $this->_cache->save($colMenuModulo, 'listaModuloMenu');
        }
        return $colMenuModulo;
    }
    
}

?>
