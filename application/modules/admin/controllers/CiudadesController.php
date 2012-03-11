<?php

class Admin_CiudadesController extends ZExtraLib_Controller_Action {

    public $_pais;
    private $_ciudad;
    private $_sesion;
    public $_default;
    public function init() {
        parent::init();
        
        
        $this->_pais = new Application_Model_Pais();
        $this->_pais = new Application_Model_Pais();
        $this->idioma = new Application_Model_Idioma();
        $this->_ciudad = new Application_Model_Ciudad;
        $this->params = $this->_getAllParams();
        $this->_default = $this->params['idmDefault']['idIdioma'];
        
        $this->_sesion = new Zend_Session_Namespace('web');
     
     
       
    }

    public function indexAction() {

        $this->view->data = $this->_pais->listaPais();
    }

    public function listaCiudadesAction(){
        $this->view->data = $this->_ciudad->getListaCiudad($this->params['id']);
    }
            
   public function editarCiudadesAction(){
       var_dump($_SESSION); exit;
       $this->view->data = $this->_ciudad->getCiudadIdioma($this->params['ciudad'],'1');
   }
    
    public function ajaxAction(){
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender();
        $case = $this->_getParam('case',0);
        
        switch ($case):
            case 'delete':
                $action = $this->_pais->deleteData($_POST);
                echo $action;
                break;
        endswitch;
    }

}
