<?php
class Default_CollectionsController extends ZExtraLib_Controller_Action
{
    public function init() {
        parent::init();
        $this->_foto = new Application_Model_FotoDetalleArticulo();

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
        
        $idArt = $this->_getParam('info1');
        $idProd = $this->_getParam('info2');        
        if($idArt){
            $this->view->detart = $articulo->buscaArticulo($idArt);
            $this->view->idArt = $idArt;
        }
        if($idProd){            
            $this->view->detaprod = $producto->buscaArticulo($idProd);
            $this->view->foto = $this->_foto->imagesPorProducto($idProd);
            $this->view->idProd = $idProd;
            
        }
        
    }
    public function itemAction()
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

