<?php

class Admin_CmsAdminPageController extends ZExtraLib_Controller_Action {

    public function init() {
        parent::init();
    }

    public function indexAction() {
        
    }
    
    public function crearMenuAction() {
        $this->view->itemModulo = $this->_params['modulo'];
        $formulario = new Application_Form_FormCms();
        $formulario->insertElment('modulo', $this->_params['modulo']);
        if ($this->_request->isPost()) {
            if ($formulario->isValid($this->_params)) {
                $this->crearMenuCms($this->_params['nombreMenu'], $this->_params['contenido'], $this->_params['modulo']);
                $this->cleanCache();
              $this->_redirect($this->_listarArrayMenuAdmin[$this->_params['modulo']]['ruta']);
            }
        }
        $this->view->form = $formulario;
    }
    public function editMenuAction() {
        $this->view->itemModulo = $this->_params['modulo'];
        $formulario = new Application_Form_FormCms();
        $formulario->insertElment('modulo', $this->_params['modulo']);
        $cms = new Application_Model_Cms();
        $datosCms = $cms->listarCmsItem($this->_params['idMenuBase'],
                $this->sessionAdmin->idiomaDetaful['idIdioma']);
        $modelMenu = new Application_Model_Menu();
        $detalleMenu = $modelMenu->detalleMenuCms($this->_params['idMenuBase'], 
                $this->sessionAdmin->idiomaDetaful['idIdioma']);
        $formulario->insertElment('contenido', $datosCms['contenidoCms']);
        $formulario->insertElment('nombreMenu', $detalleMenu['nombreMenu']);
        if ($this->_request->isPost()) {
            if ($formulario->isValid($this->_params)) {
                $this->EditarContenidoCms($this->_params['idMenuBase'], 
                        $this->_params['contenido'], 
                        $this->_params['nombreMenu'], 
                        $this->sessionAdmin->idiomaDetaful['idIdioma'],
                        $this->_params['idMenu']);
                $this->cleanCache();
              $this->_redirect($this->_listarArrayMenuAdmin[$this->_params['modulo']]['ruta']);
            }
        }
        $this->view->form = $formulario;
    }

    public function crearMenuCms($nombreMenu, $contenido, $modulo) {
        $modelModulo = new Application_Model_Modulo();
        $dataModulo = $modelModulo->listarModulo();
        $modelMenu = new Application_Model_Menu();
        $cms = new Application_Model_Cms();
        $filter = new ZExtraLib_SeoUrl();
        $slug = $filter->filter(trim($nombreMenu), '-', 0);
        $dataMenuBase['rutaMenuBase'] = $slug;
        $dataMenuBase['slugMenuBase'] = $slug;
        $dataMenuBase['nombreMenuBase'] = $nombreMenu;
        $dataMenuBase['idModulo'] = $modulo;
        $dataMenuBase['idTipoMenu'] = '1';
        $dataMenu['nombreMenu'] = $nombreMenu;
        $idMenu = $modelMenu->crearMenuCms($dataMenu, $dataMenuBase);
        $data['idMenuBase'] = $idMenu;
        $data['contenidoCms'] = $contenido;
        $data['idIdioma'] = $this->sessionAdmin->idiomaDetaful['idIdioma'];
        $data['contenidoCms'] = $contenido;
        $cms->crearCms($data);
        
    }
    public function deleteAction(){
        $this->eliminarMenuCms($this->_params['idMenuBase']);
        $this->_redirect($_SERVER['HTTP_REFERER']);
    }
    public function eliminarMenuCms($idMenuBase) {
        $modelMenuBase = new Application_Model_MenuBase();
        $modelMenuBase->eliminarMenuBase($idMenuBase);
        $modelCms = new Application_Model_Cms();
        $modelCms->eliminarCms($idMenuBase);
        
    }
    public function desactiveAction(){
        $this->desactivarMenuCms($this->_params['idMenuBase'], $this->_params['estado']);
        $this->cleanCache();
        $this->_redirect($_SERVER['HTTP_REFERER']);
    }
    public function desactivarMenuCms($idMenuBase,$estado) {
        $modelMenuBase = new Application_Model_MenuBase();
        $estado = $estado=='1'?'0':'1';
        $modelMenuBase->editEstadoMenuBase($idMenuBase,$estado);
    }
    
    
    
    public function EditarContenidoCms($idMenuBase, $contenido, $nombreMenu, $idIdioma, $idMenu) {
        $cms = new Application_Model_Cms();
        $data['contenidoCms'] = $contenido;
        $cms->editarCms($idMenuBase, $idIdioma, $data);
        $modelMenu = new Application_Model_MenuBase();
        $datosMenu=array('nombreMenu'=>$nombreMenu);
        $filter = new ZExtraLib_SeoUrl();
        $slugMenu = $filter->filter(trim($nombreMenu), '-', 0);
        $datosMenuBase = array(
            'rutaMenuBase'=>$slugMenu.'-'.$idMenuBase,
            'slugMenuBase'=>$slugMenu,
            );
        $modelMenu->editarMenu(
                $datosMenu,
                $datosMenuBase,
                $idMenuBase,
                $this->sessionAdmin->idiomaDetaful['idIdioma'],
                $idMenu);
    }
    

}

