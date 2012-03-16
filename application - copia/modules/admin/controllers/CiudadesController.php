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
        $this->view->params = $this->params;
    }

    public function indexAction() {

        $this->view->data = $this->_pais->listaPais();
    }

    public function listaCiudadesAction(){
        $this->view->data = $this->_ciudad->getListaCiudad($this->params['id']);
        $this->view->pais = $this->params['id'];
    }
    
    public function newCiudadesAction(){
        $this->view->data = $this->_pais->getPais($this->params['id'],$this->sessionAdmin->idiomaDetaful['idIdioma']);
        if ($this->_request->isPost()) {
            $post = $this->getRequest()->getParams();
            $post['default'] = $this->params['idmDefault']['idIdioma'];
            $action = $this->_ciudad->saveCiudadPais($post, $this->sessionAdmin->idiomaDetaful);
            $this->_redirect('/admin/ciudades/lista-ciudades/id/' . $post['idPais']);
        }
    }
    
    public function editarCiudadesAction(){
       $this->view->data = $this->_ciudad->getCiudadIdioma($this->params['ciudad'],$this->sessionAdmin->idiomaDetaful);
        if ($this->_request->isPost()) {
            $post = $this->getRequest()->getParams();
            $post['default'] = $this->params['idmDefault']['idIdioma'];
            $action = $this->_ciudad->editCiudadPais($post, $this->sessionAdmin->idiomaDetaful['idIdioma']);
            $this->_redirect('/admin/ciudades/lista-ciudades/id/' . $post['idPais']);
        }
   }
    
    public function ajaxAction(){
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender();
        $case = $this->_getParam('case',0);
        $post = $this->getRequest()->getParams();
        switch ($case):
            case 'delete':
                $action = $this->_ciudad->deleteData($post);
                echo $action;
                break;
        endswitch;
    }

}
