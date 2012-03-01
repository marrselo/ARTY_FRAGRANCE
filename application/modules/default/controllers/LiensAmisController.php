<?php

class Default_LiensAmisController extends ZExtraLib_Controller_Action
{
    public $_menu;
    public function init() {
        parent::init();
        $arrayMenu = $this->loadMenuIdioma($this->_params['lang'], 5);
        $this->view->menuIzquierda = $arrayMenu;
        $this->_menu = $arrayMenu;
        $this->view->classBody = 'lyt_lienamis';
    }
    public function indexAction()
    {
        $this->view->itemSelect=19;
        $modelSite = new Application_Model_Site();
        $this->view->dataSite = $modelSite->ListarSite($this->_params['lang']);
    }
}

