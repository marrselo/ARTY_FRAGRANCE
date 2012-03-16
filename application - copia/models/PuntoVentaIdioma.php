<?php

class Application_Model_PuntoVentaIdioma extends ZExtraLib_Model {

    protected $_puntoventaIdioma;
    
    function __construct() {
        parent::__construct();
        $this->_puntoventaIdioma = new Application_Model_DbTable_PuntoVentaIdioma();        
    }
    

    function modificarPtoVentaIdioma($data,$idPtoVentaIdioma) {
         
        $where = $this->_puntoventaIdioma
                ->getAdapter()
                ->quoteInto('idPuntoVentaIdioma = ?', $idPtoVentaIdioma);
        $this->_puntoventaIdioma->update($data, $where);
        //$this->clearCache();
    }


}
