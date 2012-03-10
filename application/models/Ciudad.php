<?php

class Application_Model_Ciudad extends ZExtraLib_Model {
    protected $_ciudad;
    protected $_ciudadIdioma;

    function __construct() {
        parent::__construct();
        $this->_idioma = new Application_Model_DbTable_Idioma();
        $this->_pais = new Application_Model_DbTable_Pais();
        $this->_ciudadIdioma = new Application_Model_DbTable_CiudadIdioma();
        $this->_ciudad = new Application_Model_DbTable_Ciudad();
    
    }
    
    public function getListaCiudad($id){
        $select = $this->_pais->getAdapter()->select();
        $select->from(array('t1' => 'ciudad'), array('idCiudad','nombreCiudad'))
                ->join(array('t2' => 'pais'),'t1.idPais = t2.idPais', array('nombrePais'))
                ->where('t1.idPais = ?', $id);
        //echo $select; exit;
        return $select->query()->fetch();
    }
    
}