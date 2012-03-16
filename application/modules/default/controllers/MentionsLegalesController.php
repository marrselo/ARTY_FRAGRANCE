<?php
class Default_MentionsLegalesController extends ZExtraLib_Controller_Action
{
    public $_menu;
    public function init() {
        parent::init();
        $arrayMenu = $this->loadMenuIdioma($this->_params['lang'], 12);
        $this->view->menuIzquierda = $arrayMenu;
        $this->_menu = $arrayMenu;

    }
    public function indexAction()
    {
        $arrayKey = array_keys($this->_menu);
        $this->view->itemSelect = $arrayKey[0];
        $modelObra = new Application_Model_Legal();
        $idioma = $this->_params['lang'];
        $this->view->legal = $modelObra->listarLegalPorIdioma($idioma);
    }
}

