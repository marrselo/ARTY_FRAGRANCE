<?php

class Admin_LegalController extends ZExtraLib_Controller_Action {

    protected $_params;
    protected $_sites;

    public function init() {
        parent::init();
        $this->_params = $this->_getAllParams();
        $this->view->params = $this->_params;


        //print_r($this->view->idiomaDefault);exit;
    }

    public function indexAction() {
        $formulario = new Application_Form_FormLegal();
        $modelObra = new Application_Model_Legal();
        $idioma = $this->sessionAdmin->idiomaDetaful['PrefIdioma'];
        $datosObra = $modelObra->listarLegalPorIdioma($idioma);
        if (is_array($datosObra))
            $formulario->populate($datosObra);
        $formulario->insertId('idIdioma', $this->sessionAdmin->idiomaDetaful['idIdioma']);
        if ($this->_request->isPost()) {
            if ($formulario->isValid($this->_params)) {
                $this->cleanCache();
                $dataObraIdioma = $formulario->getValues();
                if (is_array($datosObra))
                    $modelObra->updateLegal($dataObraIdioma, $this->sessionAdmin->idiomaDetaful['idIdioma']);
                else
                    $modelObra->insertLegal($dataObraIdioma);
                $this->_flashMessenger->addMessage('Se Registro Correctamente');
            }
        }
        $this->view->form = $formulario;
    }

    public function adminPageAction() {
        $this->view->modulo = 12;
        $modelMenu = new Application_Model_Menu();
        $this->view->listaMenu = $modelMenu->listarMenuCms(12, $this->sessionAdmin->idiomaDetaful['idIdioma']);
    }

}
