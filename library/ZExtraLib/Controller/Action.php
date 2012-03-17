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
    protected $_actionName;

    public function init() {
        parent::init();
        
        
        define('CAlertMenuON', 'Est-vous sûr de voiloir cacher ce lien?');
        define('CAlertMenuOFF', 'Est-vous sûr de voiloir montrer ce lien?');
        
        define('CTitleMenuOFF', 'Montrer ce lien');
        define('CTitleMenuON', 'Cacher ce lien');
        
        $this->headMeta();
        $this->setAtributes();
        $this->_identity = Zend_Auth::getInstance()->getIdentity();
        $this->view->identity = $this->_identity;
        $this->_flashMessenger = $this->_helper->getHelper('FlashMessenger');
        
        $this->view->idms = $this->_params['idms'];   
        $this->view->idmDefault = $this->_params['idmDefault'];
        $this->view->lang = $this->_params['lang'];   
        
        if ($this->getRequest()->getModuleName() == 'default') {
            if ($this->getRequest()->getControllerName() != 'index') {
                $this->view->menuSup = $this->loadMenuIdioma($this->_params['lang'], 1);
                $this->view->menuFooter1 = $this->loadMenuIdioma($this->_params['lang'], 2);
                $this->view->menuFooter2 = $this->loadMenuIdioma($this->_params['lang'], 3);
            } else {
                $this->setLayout('layout-index');
            }

        }else { 
            if ($this->getRequest()->getModuleName() == 'admin' && $this->getRequest()->getControllerName() != 'login') {
                if (!isset($this->_identity)){
                    $this->_redirect('/admin/login');
                    $this->_layout->setLayout('layoutlogin');
                }else{
                    $this->setIdiomaAdmin();
                    $this->_layout->setLayout('layoutadmin');
                    $this->view->lang = $this->sessionAdmin->idiomaDetaful['PrefIdioma'];
                    $this->eliminarSessiones();
                }
            }elseif($this->getRequest()->getControllerName() == 'login'){
                $this->_layout->setLayout('layoutlogin');
            }       
        }
        $this->initView();
       
        $this->view->headTitle('Arty Fragance');
       

        
    }

    protected function loadMenuIdioma($idioma, $modulo) {
        $modelMenu = new Application_Model_Menu();
        $response = $modelMenu->listarMenuPorIdioma($idioma, $modulo);
        return $response;
    }

    private function setAtributes() {
        $this->_params = $this->_getAllParams();
        //$this->session = (!isset($this->session)) ? new Zend_Session_Namespace('webArty') : null;
        $this->sessionAdmin = (!isset($this->session)) ? new Zend_Session_Namespace('admin') : null;
        $this->_identity = Zend_Auth::getInstance()->getIdentity();
        $this->view->identity = $this->_identity;
        $this->_layout = Zend_Layout::getMvcInstance();
        $this->_flashMessenger = $this->_helper->getHelper('FlashMessenger');
        $this->view->getMessages = $this->_flashMessenger->getMessages();
        $this->_moduleName = $this->getRequest()->getModuleName();
        $this->_controllerName = $this->getRequest()->getControllerName();
        $this->_actionName = $this->getRequest()->getActionName();
        $this->view->controllerName = $this->_controllerName;
        $this->view->actionName = $this->_actionName;
    }

    protected function setLayout($layout) {
        Zend_Layout::getMvcInstance()->setLayout($layout);
    }

    private function headMeta() {
        $this->view->doctype(Zend_View_Helper_Doctype::XHTML1_RDFA);
        //$this->view->headMeta()->setProperty('og:title', 'Delivery Premium');
        $this->view->headMeta()->setProperty('og:type', 'author');
        //$this->view->headMeta()->setProperty('og:description', 'Bienvenido a Arty_Fragance, Entrar');
        $this->view->headMeta()->setProperty('og:url', $this->view->baseUrl() . $_SERVER['REQUEST_URI']);
        //$this->view->headMeta()->setProperty('og:image', 'http://deliverypremiumsac.com/f/img/logo.png');
        //$this->view->headMeta()->setProperty('og:site_name', 'Delivery Premium');
        //$this->view->headMeta()->setProperty('og:admins', '698823485');
    }
    protected function setIdiomaAdmin(){
        if(!isset($this->sessionAdmin->idiomaDetaful)){
            $this->sessionAdmin->idiomaDetaful = $this->_params['idiomaAllSelect'];
        }
    }
    protected function cleanCache(){
        $this->_cache = Zend_Registry::get('cache');
        $this->_cache->clean();
    }
    protected function redimencionarImagen($file,$w,$h,$mode) {
        $resizeObj = new ZExtraLib_ResizeImage($file);
        $resizeObj->resizeImage($w,$h,$mode);
        $resizeObj->saveImage($file);
    }
    protected function eliminarSessiones(){
        if($this->_controllerName!=='elisabeth-de-feydeau')
        {   unset($this->sessionAdmin->imagenBiografia);
            unset($this->sessionAdmin->imagenBlog);
        }else{
           if($this->_actionName!=='index' && 
                   $this->_actionName!=='listar-imagenes-biografia' && 
                   $this->_actionName!=='eliminar-foto-biografia'&&
                   $this->_actionName!=='subir-imagenes-biografia')
                   unset($this->sessionAdmin->imagenBiografia);
           
           if($this->_actionName!=='blog-et-photos' && 
                   $this->_actionName!=='listar-imagenes-blog' && 
                   $this->_actionName!=='eliminar-foto-blog'&& 
                   $this->_actionName!=='subir-imagenes-biografia'
                   )
                   unset($this->sessionAdmin->imagenBlog);
        }
        
        if($this->_controllerName!=='mecenat-versailles')
        {   
            unset($this->sessionAdmin->imagenHistoria);
        }else{
           if($this->_actionName!='index' && 
                   $this->_actionName!='listar-imagenes-historia' && 
                   $this->_actionName!='eliminar-foto-historia'&&
                   $this->_actionName!='subir-imagenes-historia'){
                   unset($this->sessionAdmin->imagenHistoria);
                   
                   }
        }
        
        
    }


}