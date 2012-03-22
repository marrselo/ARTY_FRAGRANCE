<?php

class Admin_CategoriaController extends ZExtraLib_Controller_Action {

    private $_sesion;
    public function init() {
        parent::init();
        $this->idioma = new Application_Model_Idioma();
        $this->params = $this->_getAllParams();
        
        
        $this->_sesion = new Zend_Session_Namespace('web');
     
        if(isset($this->params['idlang'])):
            $default = $this->params['idmDefault']['idIdioma'];
            $idioma = $this->_getParam('idlang', $default);
            $this->_sesion->lg = $idioma;
            $dta = $this->idioma->getIdiomaSelect($this->_sesion->lg);
            $this->_sesion->name = $dta['NombreIdioma'];
            $this->_sesion->abr = $dta['PrefIdioma'];

        else:
            if(empty($this->_sesion->lg)){
                
                $this->_sesion->lg = $this->params['idmDefault']['idIdioma'];
                $this->_sesion->name = $this->params['idmDefault']['NombreIdioma'];
                $this->_sesion->abr = $this->params['idmDefault']['PrefIdioma'];

            }
        endif;
        
       
        $this->_articulo = new Application_Model_Articulo();
        $this->_cat = new Application_Model_Categoria();
        $this->modulo = new Application_Model_Modulo();
        $this->view->colModuloMenu = $this->modulo->listarModuloMenu();
      
        
        
        /*$this->params = $this->_getAllParams();
        
        $this->view->cboidioma = $this->idioma->getComboIdioma($this->params);*/
        
        foreach ($this->idioma->getAllIdiomas() as $ind => $val) {
            $colIdioma[$val['idIdioma']] = $val;
        };
        
        $this->view->colIdioma = $colIdioma; // $this->idioma->getAllIdiomas();
        
        $this->view->params = $this->params;

        $this->view->idiomaDefault = isset($this->params['idlang']) ?
                $colIdioma[$this->params['idlang']] :
                $this->params['idmDefault'];
        
        $this->view->idioma = $this->_sesion;
    }

    public function indexAction() {
        
    }

    public function categoriaAction() {
        $idiomas = new Application_Model_Idioma();
        $articulo = new Application_Model_Articulo();
        $cat = new Application_Model_Categoria();
        $menu = new Application_Model_Menu();
        
//$idIdioma = $this->_getParam('lang_code', 1);
        $this->view->idIdioma = $this->sessionAdmin->idiomaDetaful['idIdioma'];        
        $idMenu = $menu->buscaMenu(3, $this->view->idIdioma);

        $this->view->idioma = $idiomas->getAllIdiomas();
        $this->view->articulo = $articulo->listarArticulo($idMenu['idMenu']);
    }

    public function listcategoriaAction() {
        $idArticulo = $this->_getParam('id', NULL);
        if ($idArticulo) {
            $categoria = new Application_Model_Categoria();
            $this->view->articulo = $categoria->listarCategoria($idArticulo);
            $this->view->id = $idArticulo;
        }
        else
            $this->_redirect('/admin');
    }

    public function editcategoriaAction() {
        $idArticulo = $this->_getParam('id', NULL);
        $form = new Application_Form_FormCat();
        $this->view->form = $form;
        if ($idArticulo) {
            $articulo = $this->_cat->buscaCategoria($idArticulo);
            $form->populate($articulo);

            if ($this->_request->isPost()) {
                $params = $this->_getAllParams();
                if ($form->isValid($params)) {
                    $values = $form->getValues();                    
                    if ($this->_cat->updateCategoria($values))
                        $this->_redirect('/admin/categoria/listcategoria/id/'.$articulo['idArticulo']);
                    else
                        $this->view->msg = "ERROR EN ACTUALIZACIÓN";
                } else {
                    $this->view->msg = "verifique los datos ingresados";
                }
            }
        }
        else
            $this->_redirect('/admin');
    }

    public function deletecategoriaAction() {
        $idArticulo = $this->_getParam('id', NULL);
        $articulo = $this->_cat->buscaCategoria($idArticulo);
        if ($idArticulo) {
            $this->_cat->deleteCategoria($idArticulo);
            $this->_redirect('/admin/categoria/listcategoria/id/'.$articulo['idArticulo']);
        }
    }

    public function activecategoriaAction() {
        $idArticulo = $this->_getParam('id', NULL);
        $articulo = $this->_cat->buscaCategoria($idArticulo);
        if ($idArticulo) {
            $est = $this->_getParam('est', 1);
            $this->_cat->desactiveCategoria($idArticulo, $est);
            $this->_redirect('/admin/categoria/listcategoria/id/'.$articulo['idArticulo']);
        }
    }

    public function newcategoriaAction() {
        $form = new Application_Form_FormCat();
        $this->view->form = $form;
        $menu = new Application_Model_Menu();
        
        $idIdioma = $this->sessionAdmin->idiomaDetaful['idIdioma'];        
        $idMenu = $menu->buscaMenu(3, $idIdioma);

        if ($this->_request->isPost()) {                        
            $params = $this->_getAllParams();            
            if ($form->isValid($params)) {
                $values = $form->getValues();
                $id = $this->_getParam('info1');
                $values['idArticulo'] = $id;                
                if ($this->_cat->insertCategoria($values)){
                    $ruta = '/admin/categoria/listcategoria/id/'.$id;                    
                    $this->_redirect($ruta);                    
                    }
                else
                    $this->view->msg = "ERROR EN ACTUALIZACIÓN";
            } else {
                $this->view->msg = "verifique los datos ingresados";
            }
        }
    }
    

}
