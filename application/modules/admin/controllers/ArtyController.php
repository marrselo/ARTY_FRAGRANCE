<?php

class Admin_ArtyController extends ZExtraLib_Controller_Action {

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
        $idiomas = new Application_Model_Idioma();
        $articulo = new Application_Model_Articulo();
        $menu = new Application_Model_Menu();
        $idIdioma = $this->_getParam('lang_code', 1);
        $idMenu = $menu->buscaMenu(2, $idIdioma);
        $this->view->idioma = $idiomas->getAllIdiomas();
        $this->view->articulo = $articulo->listarArticulo(2);
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

    public function editcollectionAction() {
        $idArticulo = $this->_getParam('id', NULL);
        $form = new Application_Form_FormArt();
        $this->view->form = $form;
        if ($idArticulo) {
            $articulo = $this->_articulo->buscaArticulo($idArticulo);
            $form->populate($articulo);

            if ($this->_request->isPost()) {
                $extn = pathinfo($form->fotoPrincipal->getFileName(), PATHINFO_EXTENSION);
                $form->fotoPrincipal->addFilter(new Zend_Filter_File_Rename(
                                array('target' => 'collection-' . $idArticulo . '.' . $extn))
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
                    if ($this->_articulo->updateArticulo($values))
                        $this->_redirect('/admin/index/collections');
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
        $form = new Application_Form_FormArt();
        $form->setDecorators(array(array('ViewScript', array('viewScript' => 'form/form-articulo.phtml'))));
        return $form;
    }
    public function newartyAction() {
        $form = $this->armarFormulario();
        $this->view->form = $form;
        $menu = new Application_Model_Menu();

        $idIdioma = $this->_getParam('info', 1);
        $idMenu = $menu->buscaMenu(2, $idIdioma);
        if ($this->_request->isPost()) {           
            $idArticulo = $this->_articulo->maxId();            
            $params = $this->_getAllParams();
            //if ($form->isValid($this->_request->getPost())) {
            if ($form->isValid($params)) {               
                $values = $form->getValues();              
                $values["idMenu"] = $idMenu["idMenu"];
               
                if ($this->_articulo->insertArticulo($values))
                    $this->_redirect('/admin/arty/index');
                else
                    $this->view->msg = "ERROR EN ACTUALIZACIÓN";
                
            } else {
                $this->view->msg = "verifique los datos ingresados";
                $er = $form->getMessages();
               
            }
        }
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