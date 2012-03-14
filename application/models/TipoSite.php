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
        $this->_tipoSite->getAdapter()
             ->select()
             ->from(array('TS'=>$this->_site->getName()),array(''))
             ->join(array('ITS'=>$this->_idiomaTipoSite->getName()),'TS.idTipoSite = ITS.idTipoSite',
                    array('nombreTipoSite'=>'nombreIdiomaTipoSite','idIdiomaSite','idTipoSite'))
             ->where('ITS.idIdioma = ?',$idIdioma)
             ->query()
             ->fetchAll();               
    }
    function listarTipoSitePorIdioma($idioma) {
        //if (!($result = $this->_cache->load('listaTipoSiteIdioma'.$idioma ))) {
            $result = $this->_tipoSite
                    ->getAdapter()
                    ->select()
                    ->from(array('o' => $this->_tipoSite->getName()), 
                            array('o.idTipoSite', 
                                'o.nombreTipoSite'))
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
function listarDatosTipoSite($idObra) {
        
            $result = $this->_tipoSite
                    ->getAdapter()
                    ->select()
                    ->from(array('o' => $this->_tipoSite->getName()))
                    ->where('o.idTipoSite = ? ', $idObra)->query()->fetch();
            ;
            
        return $result;
    }
function updateTipoSite($data,$idObra){
        $where = $this->_tipoSite->getAdapter()->quoteInto('idTipoSite = ?', $idObra);
        $this->_tipoSite->update($data, $where);
    }  
        function deleteTipoSite($data){
        $where = $this->_tipoSite->getAdapter()->quoteInto('idTipoSite = ?', $data['id']);
        $this->_tipoSite->delete($where);
    }
}

?>
