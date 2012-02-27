<?php

class Default_ArtyFraganceController extends ZExtraLib_Controller_Action {

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
        
    }

    public function indexAction() {
        $this->view->classBody = 'lyt_news_precaution';
        $this->view->itemSelect = 'submenu1';
    }

    public function moduleContentAction() {
        //echo "estoy ejemplo";
    }
    
    public function ejemploAction() {
    echo "estoy ejemplo";
    }

}

