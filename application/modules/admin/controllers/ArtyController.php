<?php

class Admin_ArtyController extends ZExtraLib_Controller_Action {

     private $_sesion;
    public function init() {
        parent::init();
        $this->_articulo = new Application_Model_Articulo();        
        $this->_idIdmDefault = $this->sessionAdmin->idiomaDetaful['idIdioma'];
    }

    public function indexAction() {
        $idiomas = new Application_Model_Idioma();
        $articulo = new Application_Model_Articulo();
        $menu = new Application_Model_Menu();
        $idIdioma = $this->_getParam('lang_code', 1);
        $idMenu = $menu->buscaMenu(2, $idIdioma);
        $this->view->idioma = $idiomas->getAllIdiomas();         
        $this->view->articulo =$articulo->listarArticuloIdiomaDefault(2,$this->_idIdmDefault);
    }


    public function collectionsAction() {
        $idiomas = new Application_Model_Idioma();
        $articulo = new Application_Model_Articulo();
        $menu = new Application_Model_Menu();
        $idIdioma = $this->_getParam('lang_code', 1);
        $idMenu = $menu->buscaMenu(3, $idIdioma);
        $this->view->idioma = $idiomas->getAllIdiomas();
        $this->view->articulo = $articulo->listarArticulo($idMenu['idMenu']);
    }

    public function listproductosAction() {
        $idArticulo = $this->_getParam('id', NULL);
        if ($idArticulo) {
            $articulo = new Application_Model_DetalleArticulo();
            $this->view->articulo = $articulo->listarArticulo($idArticulo);
            $this->view->id = $idArticulo;
        }
        else
            $this->_redirect('/');
    }
    
    
    public function insertarartyAction()
    {
            $form = $this->armarFormulario();
            $this->view->form = $form;
            if ($this->_request->isPost()) {               
                $params = $this->_getAllParams();
                //if ($form->isValid($this->_request->getPost())) {
                if ($form->isValid($params)) {                                        
                    $data = $form->getValues(); 
                    $this->_articulo->insertarArticulo($data);
                    $this->_redirect('/admin/arty/');
                } else {
                    $this->view->msg = "verifique los datos ingresados";
                }
            }
    }
    
    
    public function editartyAction() {
        $idArticulo = $this->_getParam('id', NULL);
        $form       = $this->armarFormulario();
        $params     = $this->_getAllParams();
        $idIdioma   = $this->sessionAdmin->idiomaDetaful['idIdioma'];
        $this->view->form = $form;
        if ($idArticulo) {
            $articulo = $this->_articulo->buscarArticuloIdioma($idArticulo,$idIdioma);
            $form->populate($articulo);

            if ($this->_request->isPost()) {               
                $params = $this->_getAllParams();
                //if ($form->isValid($this->_request->getPost())) {
                if ($form->isValid($params)) {
                    $values = $form->getValues();
                    
                    if ($this->_articulo->updateArticulo($values))
                        $this->_redirect('/admin/arty');
                    else
                        $this->view->msg = "ERROR EN ACTUALIZACIÓN";
                } else {
                    $this->view->msg = "verifique los datos ingresados";
                }
            }
        }
        else
            $this->_redirect('/');
    }

    public function deletecollectionAction() {
        $idArticulo = $this->_getParam('id', NULL);
        if ($idArticulo) {
            $this->_articulo->deletearticulo($idArticulo);
            $this->_redirect('/admin/index/collections');
        }
    }

    public function activecollectionAction() {
        $idArticulo = $this->_getParam('id', NULL);
        if ($idArticulo) {
            $est = $this->_getParam('est', 1);
            $this->_articulo->desactiveArticulo($idArticulo, $est);
            $this->_redirect('/admin/index/collections');
        }
    }
    public function armarFormulario()
    {
        $form = new Application_Form_FormArty();
        $form->setDecorators(array(array('ViewScript', array('viewScript' => 'form/form-articulo.phtml'))));
        return $form;
    }
    public function newartyAction() {
        $form = $this->armarFormulario();
        $this->view->form = $form;
        $menu = new Application_Model_Menu();
        
        $idIdioma = $this->_getParam('info', 1);
        $idMenu = $menu->buscaMenu(2, $idIdioma);
       
    }

    public function menusuperiorAction() {
        $this->_articulo = new Application_Model_Articulo();
        $this->_menuObj = new Application_Model_Menu();
        $idIdioma = $this->_getParam('idlang', 1);
        $data = $this->_menuObj->getMenu($idIdioma);
        
        $this->view->data = $data;
    }
    
    public function menueditarAction(){
        $cod = $this->_getParam('id',0);
        $this->view->cod = $cod;
        $this->view->idiomaName = $this->_sesion->name;
    }
    
    public function menufooterAction() {
        $this->_articulo = new Application_Model_Articulo();
        $this->_menuObj = new Application_Model_Menu();
        $idIdioma = $this->_getParam('idlang', 1);
        $menu = $this->_getParam('idMenu', 1);
        $data = $this->_menuObj->getMenu($idIdioma, $menu);
        $this->view->menu = $menu;
        $this->view->data = $data;
    }
    
    
    public function ajaxAction(){
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender();
        $this->_menuObj = new Application_Model_Menu();
        $case = $this->_getParam('case',0);
        
        switch ($case):
            case 'saveMenuEdita':
                $action = $this->_menuObj->saveMenuSuperior($_POST,$this->params['idmDefault']['idIdioma']);
                echo $action;
                break;
            case 'deleteMenu':
                $action = $this->_menuObj->deleteMenu($_POST);
                echo $action;
                break;
        endswitch;
    }

}
