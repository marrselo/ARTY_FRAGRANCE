<?php

class Default_IndexController extends ZExtraLib_Controller_Action
{
    public function init() {
        parent::init();
    }
    public function indexAction()
    {
     $this->view->idms = $this->_params['idms'];   
     $this->view->idmDefault = $this->_params['idmDefault']['PrefIdioma'];   
    }
}

