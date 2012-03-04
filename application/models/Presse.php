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
        if (!($result = $this->_cache->load('listarPressePorIdioma'.$idioma ))) {
            $result = $this->_presse
                    ->getAdapter()
                    ->select()
                    ->from(array('p' => $this->_presse->getName()), 
                            array('p.idpresse', 
                                'pi.tituloPresseIdioma',
                                'pi.subTituloPresseIdioma',
                                'pi.linkMostrarPresseIdioma',
                                'p.imgPresse',
                                'p.linkPresse'
                                ))
                    ->join(array('pi' => $this->_presseIdioma->getName()), 'pi.idPresse = p.idPresse','')
                    ->join(array('idi' => $this->_idioma->getName()), 'pi.idIdioma = idi.idIdioma', '')
                    ->where('idi.prefIdioma = ? ', $idioma)
            ;
            $result = $this->_presse->getAdapter()->fetchAll($result);
            $this->_cache->save($result, 'listarPressePorIdioma'.$idioma);
        }
        return $result;
    }
}
