<?php
class Application_Model_PuntoVenta extends ZExtraLib_Model {

    protected $_idioma;
    protected $_pais;
    protected $_ciudad;
    protected $_ciudadIdioma;
    protected $_puntoventaIdioma;
    protected $_puntoventa;
    
    function __construct() {
        parent::__construct();
        $this->_idioma = new Application_Model_DbTable_Idioma();
        $this->_pais = new Application_Model_DbTable_Pais();
        $this->_ciudadIdioma = new Application_Model_DbTable_CiudadIdioma();
        $this->_ciudad = new Application_Model_DbTable_Ciudad();
        $this->_puntoventa = new Application_Model_DbTable_PuntoVenta();
        $this->_puntoventaIdioma = new Application_Model_DbTable_PuntoVentaIdioma();
    
    }
    function listarPuntoVentaPorIdioma($idioma,$idPais) {
        if (!($result = $this->_cache->load('listarPuntoVentaPorIdioma' . $idioma.$pais))) {
            $result = $this->_puntoventa->getAdapter()
                    ->select()
                    ->from(array('pv' => $this->_puntoventa->getName()), array('pv.idPuntoVenta', 'pv.nombrePuntoViaje'))
                    ->join(array('pvi' => $this->_puntoventaIdioma->getName()), 'p.idPais = pv.idPais', '')
                    ->join(array('p' => $this->_pais->getName()), 'p.idPais = pv.idPais', '')
                    ->join(array('idi' => $this->_idioma->getName()), 'idi.idIdioma = pv.idIdioma', '')
                    ->where('idi.prefIdioma = ? ', $idioma);
            $result = $this->_pais->getAdapter()->fetchAssoc($result);
            $this->_cache->save($result, 'listarPuntoVentaPorIdioma' . $idioma.$pais);
        }
        return $result;
    }
}
