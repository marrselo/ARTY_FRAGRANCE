<?php

class Application_Model_PuntoVenta extends ZExtraLib_Model {

    protected $_idioma;
    protected $_pais;
    protected $_ciudad;
    protected $_ciudadIdioma;
    protected $_puntoventaIdioma;
    protected $_puntoventa;
    protected $_fotosPuntoVenta;

    function __construct() {
        parent::__construct();
        $this->_idioma = new Application_Model_DbTable_Idioma();
        $this->_pais = new Application_Model_DbTable_Pais();
        $this->_ciudadIdioma = new Application_Model_DbTable_CiudadIdioma();
        $this->_ciudad = new Application_Model_DbTable_Ciudad();
        $this->_puntoventa = new Application_Model_DbTable_PuntoVenta();
        $this->_puntoventaIdioma = new Application_Model_DbTable_PuntoVentaIdioma();
        $this->_fotosPuntoVenta = new Application_Model_DbTable_FotoPuntoVenta();
    }

    function listarPuntoVentaPorIdioma($idioma, $idPais) {
         if (!($result = $this->_cache->load('listarPuntoVentaPorIdioma' . $idioma.$pais))) {
        $result = $this->_puntoventa->getAdapter()
                ->select()->distinct()
                ->from(array('pv' => $this->_puntoventa->getName()), array(
                    'ci.nombreCiudadIdioma',
                    'pv.idPuntoVenta',
                    'fotos' => new Zend_Db_Expr('GROUP_CONCAT(f.nombreFotoPuntoVenta)'),
                    'pvi.nombrePuntoVenta',
                    'pv.direccionPuntoVenta',
                    'pv.telefonoPuntoVenta',
                    'pv.direccionWebPuntoVenta'))
                ->join(array('pvi' => $this->_puntoventaIdioma->getName()), 'pvi.idPuntoVenta = pv.idPuntoVenta', '')
                ->join(array('c' => $this->_ciudad->getName()), 'pv.idCiudad = c.idCiudad', '')
                ->joinLeft(array('f' => $this->_fotosPuntoVenta->getName()), 'f.idPuntoVenta = pv.idPuntoVenta', '')
                ->join(array('ci' => $this->_ciudadIdioma->getName()), 'ci.idCiudad = c.idCiudad', '')
                ->join(array('idi' => $this->_idioma->getName()), 'idi.idIdioma = pvi.idIdioma', '')
                ->where('idi.prefIdioma = ? ', $idioma)
                ->where('pv.idPais = ? ', $idPais)
                ->group('pv.idPuntoVenta');
        $result = $this->_pais->getAdapter()->fetchAll($result);
        $result = $this->arrayAsoccForFirstItem($result);
           $this->_cache->save($result, 'listarPuntoVentaPorIdioma' . $idioma.$pais);
        }
        return $result;
    }
    
    function listarPuntoVenta() {
       if (!($result = $this->_cache->load('listarPuntoVenta' ))) {
         $result = $this->_puntoventa->getAdapter()
                ->select()
                ->from(array('pv' => $this->_puntoventa->getName()), array(
                    'c.nombreCiudad',
                    'pv.idPuntoVenta',                    
                    'pv.nombrePuntoVenta',                    
                    'pv.telefonoPuntoVenta',
                    'pv.direccionPuntoVenta',
                    'pv.direccionWebPuntoVenta'))               
                ->join(array('c' => $this->_ciudad->getName()), 'pv.idCiudad = c.idCiudad', '')               
                ->query()
                ->fetchAll();
        }
        return $result;
    }
    
    function detallePuntoVentaIdioma($idPtoVentaIdioma,$idIdioma){
        $result = $this->_puntoventaIdioma->getAdapter()
                ->select()
                ->from(array('pvi' => $this->_puntoventaIdioma->getName()), array(
                    'pvi.idPuntoVenta',
                    'pvi.idPuntoVentaIdioma',
                    'pvi.nombrePuntoVenta',                    
                    'pv.telefonoPuntoVenta',
                    'pv.direccionPuntoVenta',
                    'pv.idPais',
                    'pvi.direccionWebPuntoVenta',
                    'p.nombrePais'))
                ->join(array('pv' => $this->_puntoventa->getName()), 'pv.idPuntoVenta = pv.idPuntoVenta', '')
                ->join(array('p' => $this->_pais->getName()), 'p.idPais = pv.idPais', '')
                ->where('pvi.idIdioma = ? ',$idIdioma)
                ->where('idPuntoVentaIdioma =?',$idPtoVentaIdioma)
                ->query()
                ->fetch();
        return $result;
    }

}
