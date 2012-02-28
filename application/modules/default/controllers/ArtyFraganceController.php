<?php

class Default_ArtyFraganceController extends ZExtraLib_Controller_Action {

    public $_menu;
    
    public function init() {
        parent::init();
        $arrayMenu = array(
            'submenu1' => array('nombre' => 'presentacion', 'ruta' => ''),
            'submenu2' => array('nombre' => 'submenu1', 'ruta' => 'submenu1'),
            'submenu3' => array('nombre' => 'submenu1', 'ruta' => 'submenu1'),
            'submenu4' => array('nombre' => 'submenu1', 'ruta' => 'submenu1')
        );
        
        $arrayMenu = $this->loadMenuIdioma($this->_params['lang'], 4);
        $this->view->menuIzquierda = $arrayMenu;
        $this->_menu = $arrayMenu;
    }

    public function indexAction() {
        $this->view->classBody = 'lyt_news_precaution';
        $arrayKey = array_keys($this->_menu);
        $this->view->itemSelect = $arrayKey[0];
        //print_r($this->_menu);
    }

    public function moduleContentAction() {
        $array = explode('-',$this->_params['val']);
        $this->view->itemSelect = $array[(count($array)-1)];
        //echo "estoy ejemplo";
    }
    
    public function ejemploAction() {
    echo "estoy ejemplo";
    }

}

