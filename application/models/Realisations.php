<?php

class Application_Model_Realisations extends ZExtraLib_Model {

    protected $_idioma;
    protected $_realisations;
    protected $_realisationsIdioma;

    function __construct() {
        parent::__construct();
        $this->_idioma = new Application_Model_DbTable_Idioma();
        $this->_realisations = new Application_Model_DbTable_Realisations();
        $this->_realisationsIdioma = new Application_Model_DbTable_RealisationsIdioma();
    }

    function listarRealisationsPorIdioma($idioma) {
        if (!($result = $this->_cache->load('listarRealisationsPorIdioma' . $idioma))) {
            $result = $this->_realisations
                    ->getAdapter()
                    ->select()
                    ->from(array('r' => $this->_realisations->getName()), 
                            array('r.idRealisations',
                                'ri.titleRealisationsIdioma',
                                'ri.contenidoRealisationsIdioma',
                                'r.imagen',
                                'r.link',
                                'r.fechaRegistro'
                    ))
                    ->join(array('ri' => $this->_realisationsIdioma->getName()), 'ri.idRealisations = r.idRealisations', '')
                    ->join(array('idi' => $this->_idioma->getName()), 'ri.idIdioma = idi.idIdioma', '')
                    ->where('idi.prefIdioma = ? ', $idioma)
                    ->order('r.fechaRegistro DESC');
            ;
            $result = $this->_realisations->getAdapter()->fetchAll($result);
            $this->_cache->save($result, 'listarRealisationsPorIdioma' . $idioma);
        }
        return $result;
    }
    function listarRealisationsPorIdiomaDetalle($idIdioma, $idRealisations) {
        $result = $this->_realisations
                ->getAdapter()
                ->select()
                ->from(array('a' => $this->_realisations->getName()), array('a.idRealisations',
                                'ai.titleRealisationsIdioma',
                                'ai.contenidoRealisationsIdioma',
                                'a.imagen',
                                'a.link',
                                'a.fechaRegistro'
                ))
                ->join(array('ai' => $this->_realisationsIdioma->getName()), 'ai.idRealisations = a.idRealisations', '')
                ->where('ai.idIdioma = ? ', $idIdioma)
                ->where('a.idRealisations = ? ', $idRealisations)
                ->query()
                ->fetch();
        return $result;
    }


    function ifExistRealisationsIdioma($idRealisations,$idIdioma){
        return $this->_realisationsIdioma
                ->select()
                ->where('idIdioma = ?', $idIdioma)
                ->where('idRealisations = ?', $idRealisations)
                ->query()->fetch();
    }

    function editRealisations($data, $idRealisations) {
        $where = $this->_realisations->getAdapter()->quoteInto('idRealisations = ?', $idRealisations);
        $this->_realisations->update($data, $where);
    }

    function editRealisationsIdioma($data,$idRealisations, $idIdioma) {
        if($this->ifExistRealisationsIdioma($idRealisations, $idIdioma)){
            $data['idIdioma'] = $idIdioma;        
            $data['idRealisations'] = $idRealisations;
            $where[]=$this->_realisationsIdioma->getAdapter()->quoteInto('idIdioma = ?', $idIdioma);
            $where[]=$this->_realisationsIdioma->getAdapter()->quoteInto('idRealisations = ?', $idRealisations);
            $this->_realisationsIdioma->update($data,$where);
        }else{
            $this->_realisationsIdioma->insert($data);
        }
    }
    function insertRealisations($data){
        $this->_realisations->insert($data);
        return $this->_realisations->getAdapter()->lastInsertId();
    }
    function insertRealisationsIdioma($data){
        $arrayIdioma = $this->_idioma->select()->query()->fetchAll();
        foreach($arrayIdioma as $index){
            $data['idIdioma'] = $index['idIdioma'];
            $this->_realisationsIdioma->insert($data);
        }
        
    }
    function eliminarActualite($idRealisations){
        $where = $this->_realisationsIdioma->getAdapter()->quoteInto('idRealisations =?', $idRealisations);
        $this->_realisationsIdioma->delete($where);
        $this->_realisations->delete($where);
    }


}
