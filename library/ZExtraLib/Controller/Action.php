<?php

class ZExtraLib_Controller_Action extends Zend_Controller_Action {

    protected $_layout;
    protected $_config;
    protected $_hostFileStatic;
    protected $_arrayAclAnunciante;
    protected $_identity;
    protected $_moduleName;
    protected $_controllerName;
    protected $_params;

    public function init() {
        parent::init();
        
        $this->headMeta();
        $this->setAtributes();
        
        if ($this->getRequest()->getModuleName() == 'default') {
            if ($this->getRequest()->getControllerName() != 'index') {
                $this->view->menuSup = $this->loadMenuIdioma($this->_params['lang'], 1);
                $this->view->menuFooter1 = $this->loadMenuIdioma($this->_params['lang'], 2);
                $this->view->menuFooter2 = $this->loadMenuIdioma($this->_params['lang'], 3);
            } else {
                $this->setLayout('layout-index');
            }
            $this->view->idms = $this->_params['idms'];   
            $this->view->idmDefault = $this->_params['idmDefault'];   
        }
        $this->initView();
        if ($this->_moduleName == 'admin') {
            $this->setLayout('layoutadmin');
        }
        
        
    }

    protected function loadMenuIdioma($idioma, $modulo) {
        $modelMenu = new Application_Model_Menu();
        $response = $modelMenu->listarMenuPorIdioma($idioma, $modulo);
        return $response;
    }

    private function setAtributes() {
        $this->_params = $this->_getAllParams();
        $this->session = (!isset($this->session)) ? new Zend_Session_Namespace('dojo') : null;
        $this->_identity = Zend_Auth::getInstance()->getIdentity();
        $this->view->identity = $this->_identity;
        $this->_layout = Zend_Layout::getMvcInstance();
        $this->_flashMessenger = $this->_helper->getHelper('FlashMessenger');
        $this->view->getMessages = $this->_flashMessenger->getMessages();
        $this->_moduleName = $this->getRequest()->getModuleName();
        $this->_controllerName = $this->getRequest()->getControllerName();
    }

    protected function setLayout($layout) {
        Zend_Layout::getMvcInstance()->setLayout($layout);
    }

    private function headMeta() {
        $this->view->doctype(Zend_View_Helper_Doctype::XHTML1_RDFA);
        $this->view->headMeta()->setProperty('og:title', 'Delivery Premium');
        $this->view->headMeta()->setProperty('og:type', 'author');
        $this->view->headMeta()->setProperty('og:description', 'Bienvenido a Delivery Premium, Entrar');
        $this->view->headMeta()->setProperty('og:url', $this->view->baseUrl() . $_SERVER['REQUEST_URI']);
        $this->view->headMeta()->setProperty('og:image', 'http://deliverypremiumsac.com/f/img/logo.png');
        $this->view->headMeta()->setProperty('og:site_name', 'Delivery Premium');
        $this->view->headMeta()->setProperty('og:admins', '698823485');
    }

}