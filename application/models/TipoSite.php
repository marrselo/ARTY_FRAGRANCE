<?php

class Application_Model_TipoSite extends ZExtraLib_Model {
    protected $_site;
    protected $_tipoSite;
    protected $_idiomaTipoSite;
    protected $_idioma;

    function __construct() {
        parent::__construct();
        $this->_idioma = new Application_Model_DbTable_Idioma();
        $this->_tipoSite = new Application_Model_DbTable_TipoSite();
        $this->_idiomaTipoSite = new Application_Model_DbTable_IdiomaTipoSite();
        
    }
    function listarTipoSite($idIdioma)
    {
        $result = $this->_tipoSite->getAdapter()
             ->select()
             ->from(array('TS'=>$this->_tipoSite->getName()))
             ->join(array('ITS'=>$this->_idiomaTipoSite->getName()),'TS.idTipoSite = ITS.idTipoSite',
                    array('nombreTipoSite'=>'nombreIdiomaTipoSite','idIdiomaSite','idTipoSite'))
             ->where('ITS.idIdioma = ?',$idIdioma)
             ->query()
             ->fetchAll();               
        
        return $result;
    }
    function listarTipoSitePorIdioma($idioma) {
        //if (!($result = $this->_cache->load('listaTipoSiteIdioma'.$idioma ))) {
            $result = $this->_tipoSite
                    ->getAdapter()
                    ->select()
                    ->from(array('o' => $this->_tipoSite->getName()), 
                            array('o.idTipoSite', 
                                'nombreTipoSite'=>'oi.nombreIdiomaTipoSite'))
                    ->join(array('oi' => $this->_idiomaTipoSite->getName()), 'oi.idTipoSite = o.idTipoSite','')
                    ->join(array('idi' => $this->_idioma->getName()), 'oi.idIdioma = idi.idIdioma', '')
                    ->where('idi.prefIdioma = ? ', $idioma)
                    ->order('o.nombreTipoSite');
            ;
            $result = $this->_tipoSite->getAdapter()->fetchAssoc($result);
          //  $this->_cache->save($result, 'listaTipoSiteIdioma'.$idioma);
        //}
        return $result;
    }
       function insertTipoSiteIdioma($data){
        $arrayIdioma = $this->_idioma->select()->query()->fetchAll();
        foreach($arrayIdioma as $index){
            $data['idIdioma'] = $index['idIdioma'];
            $this->_idiomaTipoSite->insert($data);
        }
        
    }
    function insertTipoSite($data){
        $this->_tipoSite->insert($data);
        return $this->_tipoSite->getAdapter()->lastInsertId();
    }
function listarDatosTipoSite($idObra,$idIdioma) {
        
            $result = $this->_idiomaTipoSite
                    ->getAdapter()
                    ->select()
                    ->from(array('o' => $this->_idiomaTipoSite->getName()))
                    ->where('o.idTipoSite = ? ', $idObra)
                    ->where('o.idIdioma = ? ', $idIdioma)
                    ->query()->fetch();
            ;
            
        return $result;
    }
function updateTipoSite($data,$idTipoSite,$idIdioma){
        $where[] = $this->_idiomaTipoSite
                ->getAdapter()
                ->quoteInto('idTipoSite = ?', $idTipoSite);
        $where[] = $this->_idiomaTipoSite
                ->getAdapter()
                ->quoteInto('idIdioma = ?', $idIdioma);
        $this->_idiomaTipoSite->update($data, $where);
    }  
        function deleteTipoSite($data){
        $where = $this->_tipoSite->getAdapter()->quoteInto('idTipoSite = ?', $data['id']);
        $this->_tipoSite->delete($where);
    }
}

?>
