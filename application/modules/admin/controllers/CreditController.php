<?php

class Admin_CreditController extends ZExtraLib_Controller_Action
{
    protected $_params;
    protected $_sites;
    public function init() {
        parent::init();
        $this->_params = $this->_getAllParams();
        $this->view->params = $this->_params;
    }
    
    
    public function adminPageAction(){
        $this->view->modulo = 11;
        $modelMenu = new Application_Model_Menu();
        $this->view->listaMenu = $modelMenu->listarMenuCms(11, $this->sessionAdmin->idiomaDetaful['idIdioma']);
    }
    public function indexAction(){
        $credit = new Application_Model_Credit();
        
        $formulario = new Application_Form_FormCredit();
        $modelObra = new Application_Model_Legal();
        $idioma = $this->sessionAdmin->idiomaDetaful['idIdioma'];
    //$datosObra = $modelObra->listarLegalPorIdioma($idioma);
    $datosObra = $credit->getCredits($idioma);    
    if(is_array($datosObra))
        $formulario->populate($datosObra); 
    $formulario->insertId('idIdioma', $this->sessionAdmin->idiomaDetaful['idIdioma']);
    if ($this->_request->isPost()) {
    if($formulario->isValid($this->_params)){
        $this->cleanCache();
        $dataObraIdioma=$formulario->getValues();                
        if(is_array($datosObra)){
            $credit->updateCredit($dataObraIdioma, $this->sessionAdmin->idiomaDetaful['idIdioma']);
            $this->view->msg = "Se modifico correctamente";
        }
        else{
            $credit->insertCredit($dataObraIdioma);
            $this->view->msg = "Se ingreso correctamente";
        }
        $this->_flashMessenger->addMessage('Se Registro Correctamente');
    }    
    }
    $this->view->form = $formulario;
    }
}
