<?php

class Application_Model_Actualites extends ZExtraLib_Model {

    protected $_idioma;
    protected $_actualites;
    protected $_actualitesIdioma;

    function __construct() {
        parent::__construct();
        $this->_idioma = new Application_Model_DbTable_Idioma();
        $this->_actualites = new Application_Model_DbTable_Actualites();
        $this->_actualitesIdioma = new Application_Model_DbTable_ActualitesIdioma();
    }
    function eliminaractualites($idPrese){
        $where = $this->_actualites->getAdapter()->quoteInto($text, $value);
        $this->_actualites->delete($where);
    }

    function listaractualitesPorIdioma($idioma) {
        if (!($result = $this->_cache->load('listaractualitesPorIdioma' . $idioma))) {
            $result = $this->_actualites
                    ->getAdapter()
                    ->select()
                    ->from(array('a' => $this->_actualites->getName()), 
                            array('a.idActualites',
                                'ai.titleActualitesIdioma',
                                'ai.contenidoActualitesIdioma',
                                'a.imagen',
                                'a.fechaRegistro'
                    ))
                    ->join(array('ai' => $this->_actualitesIdioma->getName()), 'ai.idActualites = a.idActualites', '')
                    ->join(array('idi' => $this->_idioma->getName()), 'ai.idIdioma = idi.idIdioma', '')
                    ->where('idi.prefIdioma = ? ', $idioma)
            ;
            $result = $this->_actualites->getAdapter()->fetchAll($result);
            $this->_cache->save($result, 'listaractualitesPorIdioma' . $idioma);
        }
        return $result;
    }
    function listaractualitesPorIdiomaDetalle($idIdioma, $idActualites) {
        $result = $this->_actualites
                ->getAdapter()
                ->select()
                ->from(array('a' => $this->_actualites->getName()), array('a.idActualites',
                                'ai.titleActualitesIdioma',
                                'ai.contenidoActualitesIdioma',
                                'ai.linkMostraractualitesIdioma',
                                'a.imagen',
                                'a.fechaRegistro'
                ))
                ->join(array('ai' => $this->_actualitesIdioma->getName()), 'ai.idActualites = a.idActualites', '')
                ->where('ai.idIdioma = ? ', $idIdioma)
                ->where('a.idActualites = ? ', $idActualites)
                ->query()
                ->fetch();
        return $result;
    }


    function ifExistactualitesIdioma($idActualites,$idIdioma){
        return $this->_actualitesIdioma
                ->select()
                ->where('idIdioma = ?', $idIdioma)
                ->where('idActualites = ?', $idActualites)
                ->query()->fetch();
    }

    function editactualites($data, $idActualites) {
        $where = $this->_actualites->getAdapter()->quoteInto('idActualites = ?', $idActualites);
        $this->_actualites->update($data, $where);
    }

    function editactualitesIdioma($data,$idActualites, $idIdioma) {
        if($this->ifExistactualitesIdioma($idActualites, $idIdioma)){
            $data['idIdioma'] = $idIdioma;        
            $data['idActualites'] = $idActualites;
            $where[]=$this->_actualitesIdioma->getAdapter()->quoteInto('idIdioma = ?', $idIdioma);
            $where[]=$this->_actualitesIdioma->getAdapter()->quoteInto('idActualites = ?', $idActualites);
            $this->_actualitesIdioma->update($data,$where);
        }else{
            $this->_actualitesIdioma->insert($data);
        }
    }
    function insertactualites($data){
        $this->_actualites->insert($data);
        return $this->_actualites->getAdapter()->lastInsertId();
    }
    function insertactualitesIdioma($data){
        $arrayIdioma = $this->_idioma->select()->query()->fetchAll();
        foreach($arrayIdioma as $index){
            $data['idIdioma'] = $index['idIdioma'];
            $this->_actualitesIdioma->insert($data);
        }
        
    }


}
