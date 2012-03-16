<?php
class Default_ArtyFraganceController extends ZExtraLib_Controller_Action {
    public $_menu;
    public function init() {
        parent::init();
        $this->_idIdmDefault = $this->sessionAdmin->idiomaDetaful['idIdioma'];
        $arrayMenu = $this->loadMenuIdioma($this->_params['lang'], 4);
        $this->view->menuIzquierda = $arrayMenu;
        $this->_menu = $arrayMenu;
        $this->view->classBody = 'lyt_news_precaution';
        $menu = new Application_Model_Articulo();
        $this->view->menuIzquierdo = $menu->listarArticuloIdiomaDefault(2,$this->_idIdmDefault);
        
    }
    public function indexAction() {
        $arrayKey = array_keys($this->_menu);
        $this->view->itemSelect = $arrayKey[0];
        
      
    }
    public function moduleContentAction() {
        $array = explode('-',$this->_params['val']);
        $this->view->itemSelect = $array[(count($array)-1)];
    }
    public function ejemploAction() {
        echo "estoy ejemplo";
    }
    public function actualitesAction() {
        $this->view->itemSelect=18;
        $this->view->classBody = 'lyt_news';
        $modelActualites = new Application_Model_Actualites();
        $idioma = $this->sessionAdmin->idiomaDetaful['PrefIdioma'];
        $this->view->listaActualites = $modelActualites->listarActualitesPorIdioma($this->_params['lang']);
    }
}

