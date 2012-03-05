<?php

class Default_RecomanderleSiteController extends ZExtraLib_Controller_Action
{
    public $_menu;
    public function init() {
        parent::init();
        $arrayMenu = $this->loadMenuIdioma($this->_params['lang'], 10);
        $this->view->menuIzquierda = $arrayMenu;
        $this->_menu = $arrayMenu;

    }
    public function indexAction()
    {
        $arrayKey = array_keys($this->_menu);
        $this->view->itemSelect = $arrayKey[0];
        $modeRecomendate = new Application_Model_ModRecomendarSite();
        $this->view->modeRecomendate = $modeRecomendate->listarModRecomendarSitePorIdioma($this->_params['lang']);
    }
}

