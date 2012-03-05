<?php

class Application_Model_Site extends ZExtraLib_Model {
    protected $_site;
    protected $_tipoSite;
    protected $_idiomaTipoSite;
    protected $_idioma;

    function __construct() {
        parent::__construct();
        $this->_idioma = new Application_Model_DbTable_Idioma();
        $this->_site = new Application_Model_DbTable_Site();
        $this->_tipoSite = new Application_Model_DbTable_TipoSite();
        $this->_idiomaTipoSite = new Application_Model_DbTable_IdiomaTipoSite();
        
    }
    function ListarSite($idioma){
        if (!($result = $this->_cache->load('listaSite'.$idioma))) {
        $sql = $this->_site->getAdapter()
                ->select()
                ->from(array('si'=>$this->_site->getName()),array('idtsi.nombreIdiomaTipoSite','si.nombreSite','si.urlSite','si.urlMostrar'))
                ->join(array('tsi'=>$this->_tipoSite->getName()), 'tsi.idTipoSite=si.idTipoSite','')
                ->join(array('idtsi'=>$this->_idiomaTipoSite->getName()), 'idtsi.idTipoSite=tsi.idTipoSite','')
                ->join(array('idi' => $this->_idioma->getName()), 'idi.idIdioma = idtsi.idIdioma', '')
                ->where('si.estado = ?','1')
                ->where('idi.prefIdioma = ? ', $idioma)
                ->order('si.idTipoSite');
        $result = $this->_site->getAdapter()->fetchAll($sql);
        $result = $this->arrayAsoccForFirstItem($result);
        $this->_cache->save($result, 'listaSite'.$idioma);
        }
        return $result;
    }
    function listarSite2($idIdioma) {
        if (!($result = $this->_cache->load('listarSite2'))) {
            
            $result =  $this->_tipoSite->getAdapter()
                    -> select()
                    -> from(array('TS'=>$this->_tipoSite->getName()),array('idTipoSite'=>'TS.idTipoSIte'))
                    -> join(array('ITS'=> $this->_idiomaTipoSite->getName()),'ITS.idTipoSite = TS.idTipoSite',array('nombreTipoSite' => 'ITS.nombreIdiomaTipoSite','idIdiomaSite'))
                    -> where('ITS.idIdioma = ?',$idIdioma)
                    -> query()
                    -> fetchAll();
        }
        return  $result;
    }
}

?>
