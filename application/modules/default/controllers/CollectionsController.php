<?php
class Default_CollectionsController extends ZExtraLib_Controller_Action
{
    public function init() {
        parent::init();

    }
    public function indexAction()
    {           
        $this->params = $this->_getAllParams();        
        $idIdioma =$this->params["idiomaAllSelect"]["idIdioma"];
        
        $articulo = new Application_Model_Articulo();
        $producto = new Application_Model_DetalleArticulo();
        
        $menu = new Application_Model_Menu();
        $idMenu = $menu->buscaMenu(3, $idIdioma);
        $this->view->articulo = $articulo->listarArticulo($idMenu['idMenu'], 1);
        $this->view->producto = $producto->listProductos();
        
    }
}

