<?php

class Default_MecenatVersaillesController extends ZExtraLib_Controller_Action
{
    public function init() {
        parent::init();
        $arrayMenu = $this->loadMenuIdioma($this->_params['lang'], 7);
        $this->view->menuIzquierda = $arrayMenu;
        $this->_menu = $arrayMenu;
        $this->view->classBody = 'lyt_mecenat_historique slide';
    }
    public function indexAction()
    {
        $this->view->headScript()->appendFile('/f/js/jquery.cycle.all.js');
        $arrayKey = array_keys($this->_menu);
        $this->view->itemSelect = $arrayKey[0];
        $modelHistoria=new Application_Model_Historia();
        $this->view->historia = $modelHistoria->listarHistoriaPorPrefIdioma($this->_params['lang']);
        $this->view->fotos = $modelHistoria->listarFotosHistoriaPref($this->_params['lang']);
    }
    public function historiqueAction(){
        
    }
    public function realisationsAnnuellesAction(){
        $this->view->classBody = 'lyt_mecenat';
    }
}

