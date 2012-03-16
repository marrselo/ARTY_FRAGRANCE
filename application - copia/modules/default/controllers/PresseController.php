<?php

class Default_PresseController extends ZExtraLib_Controller_Action
{
    public function init() {
        parent::init();
        $arrayMenu = $this->loadMenuIdioma($this->_params['lang'], 9);
        $this->view->menuIzquierda = $arrayMenu;
        $this->_menu = $arrayMenu;

    }
    public function indexAction()
    {
        
        $this->view->classBody = 'lyt_presse';
        $arrayKey = array_keys($this->_menu);
        $this->view->itemSelect = $arrayKey[0];
        $modelPresse = new Application_Model_Presse();
        $this->view->dataPresse = $modelPresse->listarPressePorIdioma($this->_params['lang']);
    }
}

