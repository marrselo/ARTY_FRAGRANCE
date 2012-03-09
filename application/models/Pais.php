<?php
class Application_Model_Pais extends ZExtraLib_Model {

    protected $_idioma;
    protected $_pais;
    protected $_paisIdioma;
    
    function __construct() {
        parent::__construct();
        $this->_idioma = new Application_Model_DbTable_Idioma();
        $this->_pais = new Application_Model_DbTable_Pais();
        $this->_paisIdioma = new Application_Model_DbTable_PaisIdioma();
    
    }
    function listarPaisPorIdioma($idioma) {
        if (!($result = $this->_cache->load('listaPais' . $idioma))) {
            $result = $this->_pais->getAdapter()
                    ->select()
                    ->from(array('p' => $this->_pais->getName()), array('p.idPais', 'p.nombrePais','p.slugPais'))
                    ->join(array('pi' => $this->_paisIdioma->getName()), 'pi.idPais = p.idPais', '')
                    ->join(array('idi' => $this->_idioma->getName()), 'idi.idIdioma = pi.idIdioma', '')
                    ->where('idi.prefIdioma = ? ', $idioma);
            
            $result = $this->_pais->getAdapter()->fetchAssoc($result);
            $this->_cache->save($result, 'listaPais' . $idioma);
        }
        return $result;
    }
}
