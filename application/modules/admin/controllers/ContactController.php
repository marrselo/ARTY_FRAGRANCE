<?php

class Admin_ContactController extends ZExtraLib_Controller_Action
{
    protected $_params;
    protected $_sites;
    public function init() {
        parent::init();
        $this->_params = $this->_getAllParams();
        $this->view->params = $this->_params;
        
               
       //print_r($this->view->idiomaDefault);exit;
        
    }
        public function adminPageAction(){
        $this->view->modulo = 8;
        $modelMenu = new Application_Model_Menu();
        $this->view->listaMenu = $modelMenu->listarMenuCms(8, $this->sessionAdmin->idiomaDetaful['idIdioma']);
    }

    
    
    public function indexAction(){
        $contact = new Application_Model_Contact();
        
        $formulario = new Application_Form_FormContact();
        $modelObra = new Application_Model_Legal();
        $idioma = $this->sessionAdmin->idiomaDetaful['idIdioma'];
    //$datosObra = $modelObra->listarLegalPorIdioma($idioma);
    $datosObra = $contact->getContacts($idioma);    
    if(is_array($datosObra))
        $formulario->populate($datosObra); 
    $formulario->insertId('idIdioma', $this->sessionAdmin->idiomaDetaful['idIdioma']);
    if ($this->_request->isPost()) {
    if($formulario->isValid($this->_params)){
        $this->cleanCache();
        $dataObraIdioma=$formulario->getValues();                
        if(is_array($datosObra)){
            $contact->updateContact($dataObraIdioma, $this->sessionAdmin->idiomaDetaful['idIdioma']);
            $this->view->msg = "Se modifico correctamente";
        }
        else{
            $contact->insertContact($dataObraIdioma);
            $this->view->msg = "Se ingreso correctamente";
        }
        $this->_flashMessenger->addMessage('Se Registro Correctamente');
    }    
    }
    $this->view->form = $formulario;
    }
}
