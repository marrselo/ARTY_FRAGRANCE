<?php

class Default_IndexController extends ZExtraLib_Controller_Action
{
    public function init() {
        parent::init();
    }
    public function indexAction()
    {
        
        if ($this->_request->isPost()) {
            $this->_redirect('/'.$this->_params['lang'].'/accueil');
        }
    }
}

