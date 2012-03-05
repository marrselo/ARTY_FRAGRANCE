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
        
}

?>
