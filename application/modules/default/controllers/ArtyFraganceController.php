<?php

class Default_ArtyFraganceController extends ZExtraLib_Controller_Action {

    public function init() {
        parent::init();
    }

    public function indexAction() {
        $this->view->classBody = 'lyt_news_precaution';
        $this->view->itemSelect = 'submenu1';
        
        $arrayMenu = array(
            'submenu1' => array('nombre' => 'presentacion', 'ruta' => 'presentacion'),
            'submenu2' => array('nombre' => 'submenu1', 'ruta' => 'submenu1'),
            'submenu3' => array('nombre' => 'submenu1', 'ruta' => 'submenu1'),
            'submenu4' => array('nombre' => 'submenu1', 'ruta' => 'submenu1')
                );
        $this->view->menuIzquierda = $arrayMenu;
    }

}

