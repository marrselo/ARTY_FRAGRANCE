<?php

class Application_Model_Contact extends ZExtraLib_Model {

    protected $_contact;
    protected $_idioma;

    function __construct() {
        parent::__construct();
        $this->_contact = new Application_Model_DbTable_Contact();
        $this->_idioma = new Application_Model_DbTable_Idioma();
    }

    public function listarContactPorIdioma($idioma){
        if (!($result = $this->_cache->load('listarContactPorIdioma' . $idioma ))) {
            $result = $this->_contact
                    ->getAdapter()
                    ->select()
                    ->from(array('c' => $this->_contact->getName()), 
                            array('c.contenidoContact')
                            )
                    ->join(array('idi' => $this->_idioma->getName()), 'idi.idIdioma = c.idIdioma', '')
                    ->where('idi.prefIdioma = ? ', $idioma)->query()->fetch();
            $this->_cache->save($result, 'listarContactPorIdioma' . $idioma );
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

    public function getContacts($idioma) {
        $select = $this->_contact->select()
                ->from('contact')
                ->where('idIdioma = ? ', $idioma);
        
        $result = $select->query()->fetch();
                
        return $result;
    }
    
    public function buscaContact($id) {
        $select = $this->_contact->select()
                ->from('contact')
                ->where('idContact = ? ', $id);
        
        $result = $select->query()->fetch();
                
        return $result;
    }
    
    function updateContact($values=array()) {
        $db = $this->_contact->getAdapter();
        $data = array(            
            'contenidoContact' => $values["contenidoContact"],
            'idIdioma' => $values["idIdioma"],
            );        
        $where = $db->quoteInto('idIdioma = ?', $values["idIdioma"]);
        $db->update($this->_contact->getName(),$data, $where);         
        return true;
    }
    
    public function insertContact($values = array()) {
        $data = array(
            'contenidoContact' => $values['contenidoContact'],
            'idIdioma' => $values['idIdioma'],
        );
        $this->_contact->insert($data);
        return true;        
    }
    
}

