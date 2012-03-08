<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Admin_JsonController extends ZExtraLib_Controller_Action {
    
    protected $_menu;
    protected $_default;
    private $_sesion;
    
    function init(){
        $this->_menu = new Application_Model_DbTable_Menu();
        
        $this->params = $this->_getAllParams();
        
        $this->_sesion = new Zend_Session_Namespace('web');
        
        $idioma = isset($this->params['idlang']) ?
            $colIdioma[$this->params['idlang']] :
            $this->params['idmDefault'];
        
        $this->_default = $idioma['idIdioma'];  
    }
    
    public function jsonAction(){
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender();
        
        $select = $this->_menu->getAdapter()->select();    			
        $case = $this->_getParam('case',0);
        $cod = $this->_getParam('cod',0);
        switch ($case):
            case 'getEditMenu':

                $select->from(array('t1' => 'menu'),array('idMenu','idMenuBase','nombreMenu'))
                        ->where('idIdioma = ?',$this->_sesion->lg)
                        ->where('idMenu = ?',$cod);
                //echo $select; exit;
                $dta = $select->query()->fetchAll();
                echo json_encode($dta);
                break;
        endswitch;
     }
}