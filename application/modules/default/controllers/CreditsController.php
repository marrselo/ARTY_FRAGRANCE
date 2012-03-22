<?php

class Default_CreditsController extends ZExtraLib_Controller_Action
{
    public $_menu;
    public function init() {
        parent::init();
        $arrayMenu = $this->loadMenuIdioma($this->_params['lang'], 11);
        $this->view->menuIzquierda = $arrayMenu;
        $this->_menu = $arrayMenu;

    }
    public function indexAction()
    {
        $arrayKey = array_keys($this->_menu);
        $this->view->itemSelect = $arrayKey[0];
        $credit = new Application_Model_Credit();
        $this->view->contenCredit = $credit->listarCreditPorIdioma($this->_params['lang']);    
    }
        public function moduleContentAction() {
        $array = explode('-',$this->_params['val']);
        $this->view->itemSelect = $array[(count($array)-1)];
        $modelCms = new Application_Model_Cms();
        $this->view->contenido = $modelCms->listarCmsItemFront($this->view->itemSelect, 
                $this->_params['lang']);
    }

}

