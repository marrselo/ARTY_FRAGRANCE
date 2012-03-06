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
        $this->view->form = $form;
        if($idArticulo){        
        $articulo = $this->_articulo->buscaArticulo($idArticulo); 
        $form->populate($articulo);
        
        if ($this->_request->isPost()) {
            $extn = pathinfo($form->fotoPrincipal->getFileName(), PATHINFO_EXTENSION);
            $form->fotoPrincipal->addFilter(new Zend_Filter_File_Rename(
                      array('target' => 'collection-'.$idArticulo.'.'.$extn))
                   );
            $params = $this->_getAllParams();
                //if ($form->isValid($this->_request->getPost())) {
                if ($form->isValid($params)) {
                    $values = $form->getValues();                    
                    $extn = pathinfo($form->fotoPrincipal->getFileName(), PATHINFO_EXTENSION);
                    $values["fotoPrincipal"] = 'collection-' . $idArticulo . '.' . $extn;
//                    $form->fotoPrincipal->addFilter(new Zend_Filter_File_Rename(
//                      array('target' => $values["fotoPrincipal"]))
//                   );
                    
                    $form->fotoPrincipal->receive();
                    if($this->_articulo->updateArticulo($values))
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
        
        
    }
    public function deletecollectionAction()
    {
        $idArticulo = $this->_getParam('id', NULL);
        if($idArticulo) {
            $this->_articulo->deletearticulo($idArticulo);  
            $this->_redirect('/admin/index/collections');
        }
        
    }
    public function activecollectionAction()
    {        
        $idArticulo = $this->_getParam('id', NULL);
        if($idArticulo) {
            $est = $this->_getParam('est', 1);            
            $this->_articulo->desactiveArticulo($idArticulo, $est);
            $this->_redirect('/admin/index/collections');
        }
        
    }
    
    public function newcollectionAction()
    {
        $form = new Application_Form_FormArt();
        $this->view->form = $form;
        $menu = new Application_Model_Menu();
        
        $idIdioma = $this->_getParam('info', 1);        
        $idMenu = $menu->buscaMenu(3, $idIdioma);
        
        if ($this->_request->isPost()) {
            $extn = pathinfo($form->fotoPrincipal->getFileName(), PATHINFO_EXTENSION);
            $idArticulo = $this->_articulo->maxId();
            $form->fotoPrincipal->addFilter(new Zend_Filter_File_Rename(
                      array('target' => 'collection-'.$idArticulo.'.'.$extn))
                   );
            $params = $this->_getAllParams();
                //if ($form->isValid($this->_request->getPost())) {
                if ($form->isValid($params)) {
                    $values = $form->getValues();                    
                    $extn = pathinfo($form->fotoPrincipal->getFileName(), PATHINFO_EXTENSION);
                    $values["fotoPrincipal"] = 'collection-' . $idArticulo . '.' . $extn;
                    $values["idMenu"] = $idMenu["idMenu"];

                    $form->fotoPrincipal->receive();                    
                    if($this->_articulo->insertArticulo($values))
                        $this->_redirect ('/admin/index/collections');                    
                    else
                        $this->view->msg = "ERROR EN ACTUALIZACIÓN";
                    
                    
                    
                } else {
                    $this->view->msg = "verifique los datos ingresados";
                }
            }
    }

}
