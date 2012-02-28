<?php
class Default_ArtyFraganceController extends ZExtraLib_Controller_Action {
    public $_menu;
    public function init() {
        parent::init();
        $arrayMenu = $this->loadMenuIdioma($this->_params['lang'], 4);
        $this->view->menuIzquierda = $arrayMenu;
        $this->_menu = $arrayMenu;
    }
    public function indexAction() {
        $this->view->classBody = 'lyt_news_precaution';
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
}

