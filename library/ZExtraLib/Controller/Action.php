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
        $this->loadMenuIdioma($this->_params['lang']);
        //echo APPLICATION_PATH.'/../library/ZExtraLib/Editor/license/phphtmledit.lic';
        $this->initView();
        if ($this->_moduleName == 'admin') {
            $this->setLayout('layoutadmin');
           // $this->view->headLink()->appendStylesheet("/css/style.css")
                   // ->appendStylesheet("/css/custom.css")
                   // ->appendStylesheet("/css/defaults.css")
             //       ->appendStylesheet("/css/print.css", array("media" => "print"));
            $this->view->headScript()
                    ->setIndent('      ')
                    ->prependFile("/css/fix-ie.css", 'text/css', 
                            array("media" => "screen", "conditional" => "lt IE 7"));
        }
    }

    protected function loadMenuIdioma($idioma){
       $modelMenu = new Application_Model_Menu();
       $response = $modelMenu->listarMenuPorIdioma($idioma);
       print_r($response);
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