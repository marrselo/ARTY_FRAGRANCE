<?php

class Admin_IndexController
        extends ZExtraLib_Controller_Action
{
    public function init() {
        parent::init();
        $this->_articulo = new Application_Model_Articulo();
        $this->modulo = new Application_Model_Modulo();
        $this->view->colModuloMenu = $this->modulo->listarModuloMenu();
        $this->idioma = new Application_Model_Idioma();
        foreach($this->idioma->getAllIdiomas() as $ind => $val){
            $colIdioma[$val['idIdioma']] = $val;
        };
        $this->view->colIdioma =$colIdioma; // $this->idioma->getAllIdiomas();
        $this->params = $this->_getAllParams();       
        $this->view->params = $this->params;
        
        $this->view->idiomaDefault = isset($this->params['idlang'])? 
                                    $colIdioma[$this->params['idlang']] : 
                                     $this->params['idmDefault'];
    }
    public function indexAction()
    {
        
    }
    function accueilAction()
    { 
        
    }
    public function collectionsAction()
    {
        $idiomas = new Application_Model_Idioma();
        $articulo = new Application_Model_Articulo();
        $menu = new Application_Model_Menu();       
        
        $idIdioma = $this->_getParam('lang_code', 1);
        $idMenu = $menu->buscaMenu(3, $idIdioma);
        
        $this->view->idioma = $idiomas->getAllIdiomas();
        $this->view->articulo = $articulo->listarArticulo($idMenu['idMenu']);
        
    }
    
    public function listproductosAction()
    {
        $idArticulo = $this->_getParam('id', NULL);
        if($idArticulo){
        $articulo = new Application_Model_DetalleArticulo();
        $this->view->articulo = $articulo->listarArticulo($idArticulo);
        }
        else 
            $this->_redirect('/');
        
    }
    public function editcollectionAction()
    {
        $idArticulo = $this->_getParam('id', NULL);
        $form = new Application_Form_FormArt();
        
        if($idArticulo){
        $art = new Application_Model_Articulo();
        $articulo = $art->buscaArticulo($idArticulo);        
        $form->populate($articulo);
        
        if ($this->_request->isPost()) {  
            $params = $this->_getAllParams();
                //if ($form->isValid($this->_request->getPost())) {
                if ($form->isValid($params)) {
                        $values = $form->getValues();                        
                        if($art->updateArticulo($values))
                            $this->_redirect ('/admin/index/collections');
                        else
                            $this->view->msg = "ERROR EN ACTUALIZACIÓN";
                    
                } else {
                    $this->view->msg = "verifique los datos ingresados";
                }
            }
        
        }
        else 
            $this->_redirect('/');
        
        $this->view->form = $form;
        
    }
    public function deletecollectionAction()
    {
        $this->_articulo;
    }
    public function activecollectionAction()
    {
        
    }

}
