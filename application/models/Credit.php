<?php

class Application_Model_Credit extends ZExtraLib_Model {

    protected $_credit;
    protected $_idioma;

    function __construct() {
        parent::__construct();
        $this->_credit = new Application_Model_DbTable_Credit();
        $this->_idioma = new Application_Model_DbTable_Idioma();
    }

    public function listarCreditPorIdioma($idioma){
        if (!($result = $this->_cache->load('listarCreditPorIdioma' . $idioma ))) {
            $result = $this->_credit
                    ->getAdapter()
                    ->select()
                    ->from(array('c' => $this->_credit->getName()), 
                            array('c.contenidoCredit')
                            )
                    ->join(array('idi' => $this->_idioma->getName()), 'idi.idIdioma = c.idIdioma', '')
                    ->where('idi.prefIdioma = ? ', $idioma)->query()->fetch();
            $this->_cache->save($result, 'listarCreditPorIdioma' . $idioma );
        }
        return $result;
    }
    public function getIdiomas() {
        if (!($result = $this->_cache->load('listaIdiomas'))) {
            $result = $this->_idioma
                    ->getAdapter()
                    ->fetchPairs($this->_idioma->select()
                            ->from($this->_idioma->getName(),
                                    array('PrefIdioma','NombreIdioma')));
            $this->_cache->save($result, 'listaIdiomas');
        }
        return $result;
    }

    public function getCredits($idioma) {
        $select = $this->_credit->select()
                ->from('credit')
                ->where('idIdioma = ? ', $idioma);
        
        $result = $select->query()->fetch();
                
        return $result;
    }
    
    public function buscaCredit($id) {
        $select = $this->_credit->select()
                ->from('credit')
                ->where('idCredit = ? ', $id);
        
        $result = $select->query()->fetch();
                
        return $result;
    }
    
    function updateCredit($values=array()) {
        $db = $this->_credit->getAdapter();
        $data = array(            
            'contenidoCredit' => $values["contenidoCredit"],
            'idIdioma' => $values["idIdioma"],
            );        
        $where = $db->quoteInto('idIdioma = ?', $values["idIdioma"]);
        $db->update($this->_credit->getName(),$data, $where);         
        return true;
    }
    
    public function insertCredit($values = array()) {
        $data = array(
            'contenidoCredit' => $values['contenidoCredit'],
            'idIdioma' => $values['idIdioma'],
        );
        $this->_credit->insert($data);
        return true;        
    }
    
}

