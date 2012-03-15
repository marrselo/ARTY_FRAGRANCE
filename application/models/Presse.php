<?php

class Application_Model_Presse extends ZExtraLib_Model {

    protected $_idioma;
    protected $_presse;
    protected $_presseIdioma;

    function __construct() {
        parent::__construct();
        $this->_idioma = new Application_Model_DbTable_Idioma();
        $this->_presse = new Application_Model_DbTable_Presse();
        $this->_presseIdioma = new Application_Model_DbTable_PresseIdioma();
    }

    function listarPressePorIdioma($idioma) {
        if (!($result = $this->_cache->load('listarPressePorIdioma' . $idioma))) {
            $result = $this->_presse
                    ->getAdapter()
                    ->select()
                    ->from(array('p' => $this->_presse->getName()), array('p.idpresse',
                        'pi.tituloPresseIdioma',
                        'pi.subTituloPresseIdioma',
                        'pi.linkMostrarPresseIdioma',
                        'p.imgPresse',
                        'p.linkPresse',
                        'p.estadoPresse'
                    ))
                    ->join(array('pi' => $this->_presseIdioma->getName()), 'pi.idPresse = p.idPresse', '')
                    ->join(array('idi' => $this->_idioma->getName()), 'pi.idIdioma = idi.idIdioma', '')
                    ->where('idi.prefIdioma = ? ', $idioma)
            ;
            $result = $this->_presse->getAdapter()->fetchAll($result);
            $this->_cache->save($result, 'listarPressePorIdioma' . $idioma);
        }
        return $result;
    }

    function listarPressePorIdiomaDetalle($idIdioma, $idPresse) {
        $result = $this->_presse
                ->getAdapter()
                ->select()
                ->from(array('p' => $this->_presse->getName()), array('p.idpresse',
                    'pi.tituloPresseIdioma',
                    'pi.subTituloPresseIdioma',
                    'pi.linkMostrarPresseIdioma',
                    'p.imgPresse',
                    'p.linkPresse',
                    'p.estadoPresse'
                ))
                ->join(array('pi' => $this->_presseIdioma->getName()), 'pi.idPresse = p.idPresse', '')
                ->where('pi.idIdioma = ? ', $idIdioma)
                ->where('p.idpresse = ? ', $idPresse)
                ->query()
                ->fetch();
        return $result;
    }


    function ifExistPresseIdioma($idPress,$idIdioma){
        return $this->_presseIdioma
                ->select()
                ->where('idIdioma = ?', $idIdioma)
                ->where('idPresse = ?', $idPress)
                ->query()->fetch();
    }

    function editPresse($data, $idPress) {
        $where = $this->_presse->getAdapter()->quoteInto('idPresse = ?', $idPress);
        $this->_presse->update($data, $where);
    }

    function editPresseIdioma($data,$idPress, $idIdioma) {
        if($this->ifExistPresseIdioma($idPress, $idIdioma)){
            $data['idIdioma'] = $idIdioma;        
            $data['idPresse'] = $idPress;
            $where[]=$this->_presseIdioma->getAdapter()->quoteInto('idIdioma = ?', $idIdioma);
            $where[]=$this->_presseIdioma->getAdapter()->quoteInto('idPresse = ?', $idPress);
            $this->_presseIdioma->update($data,$where);
        }else{
            $this->_presseIdioma->insert($data);
        }
    }
    function insertPresse($data){
        $this->_presse->insert($data);
        return $this->_presse->getAdapter()->lastInsertId();
    }
    
    function insertPresseIdioma($data){
        $arrayIdioma = $this->_idioma->select()->query()->fetchAll();
        foreach($arrayIdioma as $index){
            $data['idIdioma'] = $index['idIdioma'];
            $this->_presseIdioma->insert($data);
        }
        
    }


}
