<?php

class Application_Model_Obra extends ZExtraLib_Model {

    protected $_idioma;
    protected $_obra;
    protected $_obraIdioma;
    function __construct() {
        parent::__construct();
        $this->_idioma = new Application_Model_DbTable_Idioma();
        $this->_obra = new Application_Model_DbTable_Obra();
        $this->_obraIdioma = new Application_Model_DbTable_ObraIdioma();
    }
    function listarObraPorIdioma($idioma) {
        if (!($result = $this->_cache->load('listaObrasIdioma'.$idioma ))) {
            $result = $this->_obra
                    ->getAdapter()
                    ->select()
                    ->from(array('o' => $this->_obra->getName()), 
                            array('o.idObra', 
                                'oi.tituloObraIdioma',
                                'o.anioObra',
                                'o.estadoObra',
                                'oi.parrafoObraIdioma',
                                'o.link',
                                'o.imgObra'))
                    ->join(array('oi' => $this->_obraIdioma->getName()), 'oi.idObra = o.idObra','')
                    ->join(array('idi' => $this->_idioma->getName()), 'oi.idIdioma = oi.idIdioma', '')
                    ->where('idi.prefIdioma = ? ', $idioma)
                    ->order('o.anioObra DESC');
            ;
            $result = $this->_obra->getAdapter()->fetchAssoc($result);
            $this->_cache->save($result, 'listaObrasIdioma'.$idioma);
        }
        return $result;
    }
    function listarDatosObra($idioma,$idObra) {
        
            $result = $this->_obra
                    ->getAdapter()
                    ->select()
                    ->from(array('o' => $this->_obra->getName()), 
                            array('o.idObra', 
                                'oi.tituloObraIdioma',
                                'o.anioObra',
                                'o.estadoObra',
                                'oi.parrafoObraIdioma',
                                'o.link',
                                'o.imgObra'))
                    ->join(array('oi' => $this->_obraIdioma->getName()), 'oi.idObra = o.idObra','')
                    ->join(array('idi' => $this->_idioma->getName()), 'oi.idIdioma = oi.idIdioma', '')
                    ->where('idi.idIdioma = ? ', $idioma)
                    ->where('o.idObra = ? ', $idObra)->query()->fetch();
            ;
            
        return $result;
    }
    function ifExistObraIdioma($idObra,$idIdioma){
        return $this->_obraIdioma
                ->select()
                ->where('idIdioma = ?', $idIdioma)
                ->where('idObra = ?', $idObra)
                ->query()->fetch();
    }
    function updateObraIdioma($data,$idIdioma,$idObra){
        if($this->ifExistObraIdioma($idObra, $idIdioma)){
        $data['idIdioma'] = $idIdioma;        
        $data['idObra'] = $idObra;
        $where[]=$this->_obraIdioma->getAdapter()->quoteInto('idIdioma = ?', $idIdioma);
        $where[]=$this->_obraIdioma->getAdapter()->quoteInto('idObra = ?', $idObra);
        $this->_obraIdioma->update($data,$where);
        }else{
        $this->_obraIdioma->insert($data);
        }
    }
    function insertIdioma($data){
        $this->_obra->insert($data);
        return $this->_obra->getAdapter()->lastInsertId();
    }
    
    function insertObraIdioma($data){
        $arrayIdioma = $this->_idioma->select()->query()->fetchAll();
        foreach($arrayIdioma as $index){
            $data['idIdioma'] = $index['idIdioma'];
            $this->_obraIdioma->insert($data);
        }
        
    }
    
}
