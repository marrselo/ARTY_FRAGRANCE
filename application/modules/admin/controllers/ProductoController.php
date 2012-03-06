<?php

class Admin_ProductoController
        extends ZExtraLib_Controller_Action
{
    public function init() {
        parent::init();
        $this->_articulo = new Application_Model_DetalleArticulo();
        $this->_foto = new Application_Model_FotoDetalleArticulo();
        $this->modulo = new Application_Model_Modulo();
        $this->view->colModuloMenu = $this->modulo->listarModuloMenu();
        $this->idioma = new Application_Model_Idioma();
        foreach($this->idioma->getAllIdiomas() as $ind => $val){
            $colIdioma[$val['idIdioma']] = $val;
        };
        $this->view->colIdioma =$colIdioma; // $this->idioma->getAllIdiomas();
        
    }
    public function indexAction()
    {
        
    }    

    public function listfotosAction()
    {
        $idArticulo = $this->_getParam('id', NULL);
        if($idArticulo){
        $articulo = new Application_Model_DetalleArticulo();
        $this->view->articulo = $articulo->listarArticulo($idArticulo);
        }
        else 
            $this->_redirect('/');
        
    }
    public function editproductAction()
    {        
        $form = new Application_Form_FormProduct();
        $idArticulo = $this->_getParam('id', NULL);
        
        if($idArticulo){
        $articulo = $this->_articulo->buscaArticulo($idArticulo);
        $this->view->foto = $this->_foto->imagesPorProducto($idArticulo);
        $form->populate($articulo);
      
        if ($this->_request->isPost()) {  
            $params = $this->_getAllParams();
                //if ($form->isValid($this->_request->getPost())) {
                if ($form->isValid($params)) {
                        $values = $form->getValues();                        
                        if($this->_articulo->updateProducto($values))
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
    public function deleteproductAction()
    {
        $idArticulo = $this->_getParam('id', NULL);
        if($idArticulo) {
            $this->_articulo->deleteProduct($idArticulo);  
            $this->_redirect('/admin/index/collections');
        }
        
    }
    public function activeproductAction()
    {        
        $idArticulo = $this->_getParam('id', NULL);
        if($idArticulo) {
            $est = $this->_getParam('est', 1);            
            $this->_articulo->desactiveProduct($idArticulo, $est);
            $this->_redirect('/admin/index/collections');
        }
        
    }
    public function deletefotoAction()
    {
        $idFoto = $this->_getParam('info1', NULL);
        $idDetalleArticulo = $this->_getParam('info2', NULL);
        if($idFoto and $idDetalleArticulo) {
            $this->_foto->deleteFoto($idFoto, $idDetalleArticulo); 
            $this->_redirect('/admin/producto/editproduct/id/'.$idDetalleArticulo);
        }
        
    }

}
