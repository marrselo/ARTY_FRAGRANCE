<?php

class Admin_SiteController extends ZExtraLib_Controller_Action {

    protected $_params;
    protected $_sites;

    public function init() {
        parent::init();
        $this->_params = $this->_getAllParams();
        $this->view->params = $this->_params;
    }

    public function indexAction() {
        $modelSite = new Application_Model_Usuario();
        $this->view->dataSite = $modelSite->listaUsuariosAdm();
    }

    public function newAction() {
        $modelObra = new Application_Model_Usuario();
        $formulario = new Application_Form_FormUsuario();
        if ($this->_request->isPost()) {
            if ($formulario->isValid($this->_params)) {
                $this->cleanCache();
                $dataIdioma = $formulario->getValues();
                $idObra = $modelObra->crearUsuarioAdm($dataIdioma);
                $this->_flashMessenger->addMessage('Se Registro Correctamente');
                $this->_redirect('/admin/site');
            } else {
                
            }
        }
        $this->view->form = $formulario;
    }

    public function editAction() {
        $modelObra = new Application_Model_Usuario();
        $formulario = new Application_Form_FormUsuario();
        $datosObra = $modelObra->listarUnUsuario($this->_params['id']);
        $formulario->insertId('idusuario', $datosObra['idusuario']);
        if ($this->_request->isPost()) {
            if ($formulario->isValid($this->_params)) {
                $this->cleanCache();
                $dataObraIdioma = $formulario->getValues();
                $modelObra->actualizarUsuario($this->_params['id'],$dataObraIdioma);
                $this->_flashMessenger->addMessage('Se Registro Correctamente');
                $this->_redirect('/admin/site');
            }
        } else {
            $formulario->populate($datosObra);
        }
        $this->view->form = $formulario;
    }

    public function ajaxAction() {
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender();
        $modelObra = new Application_Model_Usuario();
        $case = $this->_getParam('case', 0);
        $post = $this->getRequest()->getParams();
        switch ($case):
            case 'delete':
                $action = $modelObra->eliminarUsuario($post['id']);
                echo $action;
                break;
        endswitch;
    }


}
