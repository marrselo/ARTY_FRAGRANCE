<?php
class Admin_ElisabethDeFeydeauController extends ZExtraLib_Controller_Action
{
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
    
    public function indexAction()
    {
        $form = new Application_Form_FormBiografieElizabet();
        $this->view->form = $form;
        $menu = new Application_Model_Menu();

        $idIdioma = $this->_getParam('info', 1);
        $idMenu = $menu->buscaMenu(3, $idIdioma);
        $this->_menuObj = new Application_Model_Menu();
        $idIdioma = $this->_getParam('idlang', 1);
        $data = $this->_menuObj->getMenu($idIdioma);
        $this->view->data = $data;

        if ($this->_request->isPost()) {
            $extn = pathinfo($form->fotoPrincipal->getFileName(), PATHINFO_EXTENSION);
            $idArticulo = $this->_articulo->maxId();
            $form->fotoPrincipal->addFilter(new Zend_Filter_File_Rename(
                            array('target' => 'collection-' . $idArticulo . '.' . $extn))
            );
            $params = $this->_getAllParams();
            //if ($form->isValid($this->_request->getPost())) {
            if ($form->isValid($params)) {
                $values = $form->getValues();
                $extn = pathinfo($form->fotoPrincipal->getFileName(), PATHINFO_EXTENSION);
                $values["fotoPrincipal"] = 'collection-' . $idArticulo . '.' . $extn;
                $values["idMenu"] = $idMenu["idMenu"];

                $form->fotoPrincipal->receive();
                if ($this->_articulo->insertArticulo($values))
                    $this->_redirect('/admin/index/collections');
                else
                    $this->view->msg = "ERROR EN ACTUALIZACIÓN";
            } else {
                $this->view->msg = "verifique los datos ingresados";
            }
        }

    }
    public function ouvragesAction()
    {
        
    }
    public function realisationsAction()
    {
        
    }
    public function blogEtPhotosAction()
    {
        
        
    }
    
}

